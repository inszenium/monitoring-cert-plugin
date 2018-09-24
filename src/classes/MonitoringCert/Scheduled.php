<?php

/* PHP version 5
 * @copyright  inszenium 2018
 * @author     Kirsten Roschanski
 * @package    MonitoringCert
 * @license    LGPL
 * @filesource 
 */
 
 

/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace inszenium\MonitoringCert;

use Spatie\SslCertificate\SslCertificate;
use Carbon\Carbon;

/* Class Scheduled
 *
 * Implementation of Scheduled.
 * @copyright  inszenium 2018
 * @author     Kirsten Roschanski
 * @package    MonitoringCert
 */
class Scheduled extends \Backend {
		
	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct();
		$this->loadLanguageFile("tl_monitoring");
	}
	
	/**
	 * Check all certifikates entries triggered by cron
	 */
	public function checkCert() {
		$this->logDebugMsg("Checking one monitoring entry for ID " . \Input::get('id') . " ended with status: " . $status, __METHOD__);

		
		$objResult = \Database::getInstance()->prepare("SELECT id, url FROM tl_monitoring WHERE id=?")->execute(\Input::get('id'));
		
		$certificate = SslCertificate::createForHostName($objResult->url);

		$arrUpdate = array(
			'cert_exhibitors_cn' => $certificate->getIssuer(), // returns "Let's Encrypt Authority X3"
			'cert_date_of_expiry' => $certificate->expirationDate()->toRfc2822String(),
			'cert_dates_of_expiry' => $certificate->expirationDate()->diffInDays(),
			'cert_fingerprint_SHA_256' => $certificate->getFingerprint(), // returns a string	
		);
		\Database::getInstance()->prepare("UPDATE tl_monitoring %s WHERE id=?")
							->set($arrUpdate)
							->execute(\Input::get('id'));
                                        
		$urlParam = \Input::get('do');
		if (\Input::get('table') == "tl_monitoring_test" && \Input::get('id'))
		{
		  $urlParam .= "&table=tl_monitoring_test&id=" . \Input::get('id');
		}	
			
		$this->returnToList($urlParam);
	}
	
    /**
	 * Check all certifikates entries triggered by cron
	 */
	public function checkCerts() {
		$objResult = \Database::getInstance()->query("SELECT id, url FROM tl_monitoring WHERE cert_active = 1");	
		while($objResult->next()) {
			$certificate = SslCertificate::createForHostName($objResult->url);

			$arrUpdate = array(
				'cert_exhibitors_cn' => $certificate->getIssuer(), // returns "Let's Encrypt Authority X3"
				'cert_date_of_expiry' => $certificate->expirationDate()->toRfc2822String(),
				'cert_dates_of_expiry' => $certificate->expirationDate()->diffInDays(),
				'cert_fingerprint_SHA_256' => $certificate->getFingerprint(), // returns a string	
			);
			\Database::getInstance()->prepare("UPDATE tl_monitoring %s WHERE id=?")
                                ->set($arrUpdate)
                                ->execute($objResult->id);
                                
            // only needed when there where errors detected
			if ($certificate->isValidUntil(Carbon::now()->addDays(7))) {
			  $errorMsg = sprintf($GLOBALS['TL_LANG']['tl_monitoring']['mailmessage']['EMAIL_MESSAGE_TEXT'], $objResult->url, $certificate->getFingerprint(), $certificate->expirationDate()->diffInDays());
			  $this->log($errorMsg, __METHOD__, TL_ERROR);
			  
			  if (\Config::get('monitoringMailingActive') && \Config::get('monitoringAdminEmail') != '') {
				$objEmail = new \Email();
				$objEmail->subject = $GLOBALS['TL_LANG']['tl_monitoring']['mailmessage']['EMAIL_SUBJECT_ERROR'];
				$objEmail->text = $errorMsg . sprintf($GLOBALS['TL_LANG']['tl_monitoring']['mailmessage']['EMAIL_MESSAGE_END'], \Environment::get('base') . "contao");
				$objEmail->sendTo(\Config::get('monitoringAdminEmail'));
				$this->logDebugMsg("Scheduled monitoring check ended. Some checks ended erroneous. The monitoring admin was informed via email (" . \Config::get('monitoringAdminEmail') . ").", __METHOD__);
			  } else {
				$this->logDebugMsg('No "error" email send ... check monitoring settings.', __METHOD__);
			  }
			}                    
			
		}
				
		$this->returnToList(\Input::get('do'));
	}

	/**
	* Logs the given message if the debug mode is anabled.
	*/
	private function logDebugMsg($msg, $origin) {
		if (\Config::get('monitoringDebugMode') === TRUE) {
		  $this->log($msg, $origin, TL_GENERAL);
		}
	}
	
	/**
	 * Redirect to the list.
	 */
	private function returnToList($act) {
	  $path = \Environment::get('base') . 'contao/main.php?do=' . $act;
	  $this->redirect($path, 301);
	}
}

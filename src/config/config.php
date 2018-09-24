<?php

/* PHP version 5
 * @copyright  inszenium 2018
 * @author     Kirsten Roschanski
 * @package    MonitoringCert
 * @license    LGPL
 * @filesource 
 */
 
/**
 * Backend modules
 */
$GLOBALS['BE_MOD']['ContaoMonitoring']['monitoring']['checkCerts'] = array('inszenium\MonitoringCert\Scheduled', 'checkCerts');  
$GLOBALS['BE_MOD']['ContaoMonitoring']['monitoring']['checkCert']  = array('inszenium\MonitoringCert\Scheduled', 'checkCert');  

/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['monitoringFormatList'][] = array('inszenium\MonitoringCert\Hooks', 'monitoringFormatList');

/**
 * Cron
 */
$GLOBALS['TL_CRON']['daily']['MonitoringCert'] = array('inszenium\MonitoringCert\Scheduled', 'checkCerts');

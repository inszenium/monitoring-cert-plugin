<?php

/* PHP version 5
 * @copyright  inszenium 2018
 * @author     Kirsten Roschanski
 * @package    MonitoringCert
 * @license    LGPL
 * @filesource 
 */

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_monitoring']['cert_legend']   = 'Zertifikatsinformationen';

/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_monitoring']['cert_date_of_expiry'][0] = 'Gültig bis';
$GLOBALS['TL_LANG']['tl_monitoring']['cert_date_of_expiry'][1] = 'Das Datum der Gültigkeit des Zertifikates nach RFC 2822.';
$GLOBALS['TL_LANG']['tl_monitoring']['cert_dates_of_expiry'][0] = 'Gültigkeit in Tagen';
$GLOBALS['TL_LANG']['tl_monitoring']['cert_dates_of_expiry'][1] = 'Gültigkeit des Zertifikates in Tagen';
$GLOBALS['TL_LANG']['tl_monitoring']['cert_exhibitors_cn'][0] = 'Antragssteller';
$GLOBALS['TL_LANG']['tl_monitoring']['cert_exhibitors_cn'][1] = 'Allgemeiner Name des Antragsstellers (CN)'; 
$GLOBALS['TL_LANG']['tl_monitoring']['cert_fingerprint_SHA_256'][0] = 'SHA-256-Fingerabdruck';
$GLOBALS['TL_LANG']['tl_monitoring']['cert_fingerprint_SHA_256'][1] = 'Fingerabdruck des Zertifikates'; 
$GLOBALS['TL_LANG']['tl_monitoring']['cert_active'][0] = 'Zertifikatsprüfung';
$GLOBALS['TL_LANG']['tl_monitoring']['cert_active'][1] = 'Legen Sie fest, ob die Zertifikatsdaten des überwachten Systems überprüft werden sollen.';

/**
 * Info
 */
$GLOBALS['TL_LANG']['tl_monitoring']['infomessage']['cert_expiry'] = 'Das Zertifikat läuft in %s Tagen aus.';

/**
 * Mail
 */
$GLOBALS['TL_LANG']['tl_monitoring']['mailmessage']['EMAIL_SUBJECT_ERROR'] = 'Monitoring errors detected';
$GLOBALS['TL_LANG']['tl_monitoring']['mailmessage']['EMAIL_MESSAGE_TEXT']  = 'Scheduled monitoring check ended.\n\nThe following checks ended erroneous:\n\n';
$GLOBALS['TL_LANG']['tl_monitoring']['mailmessage']['EMAIL_MESSAGE_TEXT'] .= '- Das Zertifikat [%s] (%s) läuft in %s Tagen aus.\n';
$GLOBALS['TL_LANG']['tl_monitoring']['mailmessage']['EMAIL_MESSAGE_END']   = '\nPlease check your system for further information: %s\n\nThis is an automatically generated email by Contao extension [Monitoring].';

/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_monitoring']['checkCerts'][0] = 'Alle Zertifikate prüfen';
$GLOBALS['TL_LANG']['tl_monitoring']['checkCerts'][1] = 'Prüft die Zertifikate aller <u>aktiven</u> Domains mit Zertifikat.';
$GLOBALS['TL_LANG']['tl_monitoring']['checkCert'][0] =  'Zertifikat prüfen';
$GLOBALS['TL_LANG']['tl_monitoring']['checkCert'][1] = 'Prüft das Zertifikat mit der ID %s.';

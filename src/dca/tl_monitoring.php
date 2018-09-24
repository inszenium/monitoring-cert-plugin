<?php

/* PHP version 5
 * @copyright  inszenium 2018
 * @author     Kirsten Roschanski
 * @package    MonitoringCert
 * @license    LGPL
 * @filesource 
 */

// Palettes 
$GLOBALS['TL_DCA']['tl_monitoring']['palettes']['__selector__'][] = "cert_active";
$GLOBALS['TL_DCA']['tl_monitoring']['palettes']['default'] .= ";{cert_legend:hide},cert_active";
$GLOBALS['TL_DCA']['tl_monitoring']['subpalettes']['cert_active'] .= "cert_exhibitors_cn,cert_date_of_expiry,cert_dates_of_expiry,cert_fingerprint_SHA_256";


// Global operations
$GLOBALS['TL_DCA']['tl_monitoring']['list']['global_operations']['check_certs'] = array(
        'label'                 => &$GLOBALS['TL_LANG']['tl_monitoring']['checkCerts'],
        'href'                  => 'key=checkCerts',
        'class'                 => 'header_icon tl_monitoring_check_cert',
		'icon'                  => 'sync.svg',

);
// operations
$GLOBALS['TL_DCA']['tl_monitoring']['list']['operations']['check_cert'] = array(
        'label'                 => &$GLOBALS['TL_LANG']['tl_monitoring']['checkCert'],
        'href'                  => 'key=checkCert',
        'class'                 => 'header_icon tl_monitoring_check_cert',
		'icon'                  => 'sync.svg',
);

// Fields 
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['cert_active'] = array
(
	    'label'                 => &$GLOBALS['TL_LANG']['tl_monitoring']['cert_active'],
	    'exclude'               => true,
  	    'filter'                => true,
	    'inputType'             => 'checkbox',
	    'eval'                  => array('tl_class'=>'clr', 'submitOnChange' => true, 'doNotCopy'=>true),
	    'sql'                   => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_monitoring']['fields']['cert_exhibitors_cn'] = array
(
		'label'                 => &$GLOBALS['TL_LANG']['tl_monitoring']['cert_exhibitors_cn'],
		'exclude'               => true,
		'inputType'             => 'text',
		'eval'                  => array('maxlength'=>128, 'readonly'=>true, 'tl_class'=>'w50'),
		'sql'                   => "varchar(128) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_monitoring']['fields']['cert_date_of_expiry'] = array
(
		'label'                 => &$GLOBALS['TL_LANG']['tl_monitoring']['cert_date_of_expiry'],
		'exclude'               => true,
		'inputType'             => 'text',
		'eval'                  => array('maxlength'=>128, 'readonly'=>true, 'tl_class'=>'w50'),
		'sql'                   => "varchar(128) NOT NULL default ''",
);
$GLOBALS['TL_DCA']['tl_monitoring']['fields']['cert_dates_of_expiry'] = array
(
		'label'                 => &$GLOBALS['TL_LANG']['tl_monitoring']['cert_dates_of_expiry'],
		'exclude'               => true,
		'inputType'             => 'text',
		'eval'                  => array('maxlength'=>128, 'readonly'=>true, 'tl_class'=>'w50'),
		'sql'                   => "varchar(128) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_monitoring']['fields']['cert_fingerprint_SHA_256'] = array
(
		'label'                 => &$GLOBALS['TL_LANG']['tl_monitoring']['cert_fingerprint_SHA_256'],
		'exclude'               => true,
		'inputType'             => 'text',
		'eval'                  => array('maxlength'=>128, 'readonly'=>true, 'tl_class'=>'w50'),
		'sql'                   => "varchar(128) NOT NULL default ''",
);



/*
 * Show managerURL id
 */
$GLOBALS['TL_DCA']['tl_monitoring']['list']['label']['fields'][] = 'cert_date_of_expiry';

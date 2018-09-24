<?php

/* PHP version 5
 * @copyright  inszenium 2018
 * @author     Kirsten Roschanski
 * @package    MonitoringContaoManager
 * @license    LGPL
 * @filesource 
 */

/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'inszenium\MonitoringCert',
));

/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'inszenium\MonitoringCert\Hooks' => 'system/modules/MonitoringCert/classes/MonitoringCert/Hooks.php',
	'inszenium\MonitoringCert\Scheduled' => 'system/modules/MonitoringCert/classes/MonitoringCert/Scheduled.php',
));

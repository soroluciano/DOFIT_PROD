<?php

/**
 * Production configuration
 * Usage:
 * - Online website
 * - Production DB
 * - Standard production error pages (404, 500, etc.)
 */

return array(
	
	// Set yiiPath (relative to Environment.php)
	//'yiiPath' => dirname(__FILE__) . '/../../yii-1.1.10/framework/yii.php',
	//'yiicPath' => dirname(__FILE__) . '/../../yii-1.1.10/framework/yiic.php',
	//'yiitPath' => dirname(__FILE__) . '/../../yii-1.1.10/framework/yiit.php',

	// Set YII_DEBUG and YII_TRACE_LEVEL flags
	'yiiDebug' => true,
	'yiiTraceLevel' => 3,
	
	// Static function Yii::setPathOfAlias()
	'yiiSetPathOfAlias' => array(
		// uncomment the following to define a path alias
		//'local' => 'path/to/local-folder'
	),

	// This is the specific Web application configuration for this mode.
	// Supplied config elements will be merged into the main config array.
	'configWeb' => array(

		// Application components
		'components' => array(

			// Database
			'db' => array(
				'pdoClass' => 'NestedPDO',
				'connectionString' => 'mysql:server36.000webhost.com=localhost;dbname=a4995944_dofit',
				'username' => 'a4995944_dofit',
				'password' => 'pass123',
				//'schemaCachingDuration' => 3600,
			),

			// Application Log
			
			'log' => array(
				'class' => 'CLogRouter',
				'routes' => array(
					// Save log messages on file
					array(
						'class' => 'CFileLogRoute',
						'levels' => 'error, warning',
					),
					// Send errors via email to the system admin
					array(
						'class' => 'CEmailLogRoute',
						'levels' => 'error, warning',
						'emails' => 'webadmin@example.com',
					),
				),
			),
			
		),

	),
	
	// This is the Console application configuration. Any writable
	// CConsoleApplication properties can be configured here.
    // Leave array empty if not used.
    // Use value 'inherit' to copy from generated configWeb.
	'configConsole' => array(
	
		// Application components
		'components' => array(
			
			// Application Log
			'log' => 'inherit',

		),

	),

);

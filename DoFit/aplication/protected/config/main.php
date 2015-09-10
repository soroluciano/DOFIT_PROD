<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Do Fit',

    'defaultController' => 'Site/login',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
    'aliases' => array(

        'xupload' => 'ext.xupload',
    ),
    'theme'=>"classic",

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',

			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		// uncomment the following to enable URLs in path-format


	      'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName'=>false,
         /*  'urlSuffix'=>'.php',*/
			'rules'=>array(

				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

        /*'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '/' => '/view',
                '//' => '/',
                '/' => '/',

            ),

        ),*/

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
        'clientScript' => array(
            'class' => 'ext.components.NLSClientScript',
            //'excludePattern' => '/\.tpl/i', //js regexp, files with matching paths won't be filtered is set to other than 'null'
            //'includePattern' => '/\.php/', //js regexp, only files with matching paths will be filtered if set to other than 'null'
            'mergeJs' => false, //def:true
            'compressMergedJs' => false, //def:false
            'mergeCss' => false, //def:true
            'compressMergedCss' => false, //def:false
            'serverBaseUrl' => 'http://localhost', //can be optionally set here
            'mergeAbove' => 1, //def:1, only "more than this value" files will be merged,
            'curlTimeOut' => 5, //def:5, see curl_setopt() doc
            'curlConnectionTimeOut' => 10, //def:10, see curl_setopt() doc
            'appVersion' => 1.0 //if set, it will be appended to the urls of the merged scripts/css
         ),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),


);

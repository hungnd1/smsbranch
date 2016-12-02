<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

//PATH EXTENTION DATA PICKER
Yii::setPathOfAlias('rezvan', dirname(__FILE__).'/../extensions/rezvan');
//Yii::setPathOfAlias('yiiexcel', dirname(__FILE__).'/../extensions/PHPExcel-1.8.1');
//assume you unzipped extension under protected/extensions/x-editable
Yii::setPathOfAlias('editable', dirname(__FILE__).'/../extensions/x-editable');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
require_once(dirname(__FILE__).'/db.php');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
        'timeZone' => 'Asia/Ho_Chi_Minh',
	'name'=>'TanAnhSMS',
        'theme'=>'bootstrap', // requires you to copy the theme under your themes directory
        'language'=>'vi',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.modules.Members.models.*',
                'editable.*', //easy include of editable classes
                'application.modules.prSystems.models.*',
	),

	'modules'=>array(
                'prSystems',
                'Members',
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'thebluesms',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
                        'generatorPaths'=>array(
                            'bootstrap.gii',
                        ),
		),
		
	),

	// application components
	'components'=>array(
                'bootstrap'=>array(
                    'class'=>'bootstrap.components.Bootstrap',
                ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
                        'showScriptName'=>false,
			'rules'=>array(
//				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
//				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                                'searchs'=>'HistoryContact/admin',
                                'historys'=>'History/admin',
                                'contacts'=>'ContactCategorie/admin',
                                'templates'=>'TemplateSms/admin',
								'comments'=>'ContactCategorie/comments',
                                'templates/<action:\w+>'=>'TemplateSms/<action>',
                                'send/type/<type:\w+>'=>'History/Create/type/<type>',
                                'report-day'=>'HistoryContact/report',
                                'report-month'=>'HistoryContact/ReportMonth',
                                'upload-report'=>'History/UploadReport'
			),
		),
		
//		'db'=>array(
//			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
//		),
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => $dbConfig['connectionString'],
			'emulatePrepare' => true,
			'username' => $dbConfig['username'],
			'password' => $dbConfig['password'],
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'session' => array(
			'class' => 'CDbHttpSession',
			'timeout' => 60*60*24*254, // never timeout
			'connectionID' => 'db',
		),
                //X-editable config
                'editable' => array(
                    'class'     => 'editable.EditableConfig',
                    'form'      => 'bootstrap',        //form style: 'bootstrap', 'jqueryui', 'plain' 
                    'mode'      => 'popup',            //mode: 'popup' or 'inline'  
                    'defaults'  => array(              //default settings for all editable elements
                       'emptytext' => 'Cập nhật'
                    ),
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
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
                'domain'=>'tananh'
	),
);
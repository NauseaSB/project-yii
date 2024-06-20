<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => 'Project Yii',

	// preloading 'log' component
	'preload' => array('log'),

	// autoloading model and component classes
	'import' => array(
		'application.models.*',
		'application.components.*',
	),

	'modules' => array(
		// uncomment the following to enable the Gii tool
		'gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => 'password',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters' => array('127.0.0.1', '::1'),
		),
		'srbac' => array(
			'class' => 'application.modules.srbac.SrbacModule',
		),
		// 'srbac' => array(
		// 	'userclass' => 'User', // Nama model User Anda
		// 	'userid' => 'id', // Primary key dari tabel User
		// 	'username' => 'username', // Kolom username di tabel User
		// 	'debug' => true, // Debug mode, ganti ke false di produksi
		// 	'pageSize' => 10, // Jumlah item per halaman
		// 	'superUser' => 'Authority', // Role untuk super user
		// 	'css' => 'srbac.css', // File CSS untuk srbac
		// 	'layout' => 'application.views.layouts.main', // Layout file
		// 	'notAuthorizedView' => 'srbac.views.authitem.unauthorized', // View untuk unauthorized users
		// 	'alwaysAllowed' => array( // Aksi yang selalu diizinkan
		// 		'SiteLogin', 'SiteLogout', 'SiteIndex', 'SiteError', 'SiteContact'
		// 	),
		// 	'userActions' => array('Show', 'View', 'List'), // Aksi pengguna
		// 	'listBoxNumberOfLines' => 15, // Jumlah baris dalam listbox
		// 	'imagesPath' => 'srbac.images', // Path untuk gambar srbac
		// 	'imagesPack' => 'noia', // Paket gambar
		// 	'iconText' => true, // Tampilkan teks di sebelah ikon
		// 	'header' => 'srbac.views.authitem.header', // View header
		// 	'footer' => 'srbac.views.authitem.footer', // View footer
		// 	'showHeader' => true, // Tampilkan header
		// 	'showFooter' => true, // Tampilkan footer
		// 	'alwaysAllowedPath' => 'srbac.components', // Path untuk always allowed actions
		// ),

	),

	// application components
	'components' => array(

		'user' => array(
			// enable cookie-based authentication
			'allowAutoLogin' => true,
		),

		'authManager' => array(
			'class' => 'CDbAuthManager',
			'connectionID' => 'db',
			'itemTable' => 'AuthItem', // default table name
			'itemChildTable' => 'AuthItemChild', // default table name
			'assignmentTable' => 'AuthAssignment', // default table name
		),

		// Database connection settings
		'db' => array(
			'connectionString' => 'mysql:host=localhost;dbname=yii',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),

		// uncomment the following to enable URLs in path-format
		'urlManager' => array(
			'urlFormat' => 'path',
			'rules' => array(
				'<controller:\w+>/<id:\d+>' => '<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
				'home' => 'site/index',

				'users' => 'user/index',
				'pegawais' => 'pegawai/index',
				'tindakans' => 'tindakan/index',
				'wilayahs' => 'wilayah/index',
				'obats' => 'obat/index',
			),
		),

		// database settings are configured in database.php
		'db' => require(dirname(__FILE__) . '/database.php'),

		'errorHandler' => array(
			// use 'site/error' action to display errors
			'errorAction' => YII_DEBUG ? null : 'site/error',
		),

		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning',
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

	// 'controllerMap' => array(
	// 	'site' => array(
	// 		'class' => 'application.controllers.SiteController',
	// 		'filter' => array(
	// 			'srbac.auth.SrbacFilter',
	// 			// Other filters if any
	// 		),
	// 	),
	// 	// Other controllers if any
	// ),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => array(
		// this is used in contact page
		'adminEmail' => 'webmaster@example.com',
	),
);

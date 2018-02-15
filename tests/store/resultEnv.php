<?php

return [
	'app' => [
		'commands' => [
			[
				'class' => 'yii2lab\\app\\domain\\commands\\RunBootstrap',
				'app' => 'vendor/yii2lab/yii2-app/tests/_application_test\\common',
			],
			[
				'class' => 'yii2lab\\app\\domain\\commands\\RunBootstrap',
				'app' => 'vendor/yii2lab/yii2-app/tests/_application_test\\console',
			],
			[
				'class' => 'yii2lab\\app\\domain\\commands\\ApiVersion',
				'isEnabled' => false,
			],
		],
	],
	'config' => [
		'filters' => [
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/_application_test\\common',
				'name' => 'main',
				'withLocal' => true,
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/_application_test\\console',
				'name' => 'main',
				'withLocal' => true,
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadModuleConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/_application_test\\common',
				'name' => 'modules',
				'withLocal' => true,
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadModuleConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/_application_test\\console',
				'name' => 'modules',
				'withLocal' => true,
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/_application_test\\common',
				'name' => 'routes',
				'withLocal' => true,
				'assignTo' => 'components.urlManager.rules',
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/_application_test\\console',
				'name' => 'routes',
				'withLocal' => true,
				'assignTo' => 'components.urlManager.rules',
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/_application_test\\common',
				'name' => 'params',
				'withLocal' => true,
				'assignTo' => 'params',
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/_application_test\\console',
				'name' => 'params',
				'withLocal' => true,
				'assignTo' => 'params',
			],
			[
				'class' => 'yii2lab\\domain\\filters\\LoadDomainConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/_application_test\\common',
				'name' => 'domains',
				'withLocal' => true,
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/_application_test\\common',
				'name' => 'install',
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/_application_test\\console',
				'name' => 'install',
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/_application_test\\common',
				'name' => 'test',
				'withLocal' => true,
				'isEnabled' => true,
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/_application_test\\console',
				'name' => 'test',
				'withLocal' => true,
				'isEnabled' => true,
			],
			'yii2lab\\app\\domain\\filters\\config\\SetControllerNamespace',
			'yii2lab\\app\\domain\\filters\\config\\FixValidationKeyInTest',
			'yii2lab\\app\\domain\\filters\\config\\SetAppId',
			'yii2lab\\app\\domain\\filters\\config\\SetPath',
			'yii2module\\offline\\domain\\filters\\IsOffline',
			'yii2lab\\domain\\filters\\SetDomainTranslationConfig',
		],
	],
	'url' => [
		'frontend' => 'http://example.com/',
		'backend' => 'http://admin.example.com/',
		'api' => 'http://api.example.com/',
	],
	'cookieValidationKey' => [
		'frontend' => 'bBXEWnH5ERCG7SF3wxtbotYxq3W-Op7B',
		'backend' => 'zbfqVR5PhdO3E8Xi7DB4aoxmxSstJ6aI',
	],
	'servers' => [
		'db' => [
			'main' => [
				'driver' => 'mysql',
				'host' => 'localhost',
				'username' => 'root',
				'password' => '',
				'dbname' => 'example',
				'defaultSchema' => 'qrpay',
			],
			'test' => [
				'driver' => 'mysql',
				'host' => 'localhost',
				'username' => 'root',
				'password' => '',
				'dbname' => 'example_test',
			],
		],
		'mail' => [
			'host' => 'mail',
			'username' => 'info@qrp.kz',
			'password' => 'SEqwBmUlnykbj2p5',
			'port' => '25',
		],
		'static' => [
			'publicPath' => '@frontend/web/',
			'domain' => 'http://qr.yii/',
		],
		'wsdl' => [
			'domain' => 'http://www.test.wooppay.com/api/wsdl',
			'payment_hash' => 'Q8nFbQeU236zYQmHDq5vHVqeQBgjNmu9sTCVtEP7hL7p6kKC2vJc66pUGbrAhD3G',
			'user' => [
				[
					'login' => 'QRPayMerchant',
					'password' => 'A12345678a',
				],
				[
					'login' => 'QRPaySub',
					'password' => 'A12345678a',
				],
			],
		],
	],
	'mode' => [
		'env' => 'test',
		'debug' => true,
	],
	'domain' => [
		'driver' => [
			'primary' => 'disc',
			'slave' => 'ar',
		],
	],
	'project' => 'test',
	'db' => [
		'main' => [
			'driver' => 'mysql',
			'host' => 'localhost',
			'username' => 'root',
			'password' => '',
			'dbname' => 'example',
			'tablePrefix' => '',
			'dsn' => 'mysql:host=localhost;dbname=example',
		],
		'test' => [
			'driver' => 'mysql',
			'host' => 'localhost',
			'username' => 'root',
			'password' => '',
			'dbname' => 'example_test',
			'tablePrefix' => '',
			'dsn' => 'mysql:host=localhost;dbname=example_test',
		],
	],
];
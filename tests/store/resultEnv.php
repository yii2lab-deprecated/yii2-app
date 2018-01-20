<?php 

return [
	'config' => [
		'filters' => [
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/store/app/common',
				'name' => 'main',
				'withLocal' => true,
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/store/app/console',
				'name' => 'main',
				'withLocal' => true,
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadModuleConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/store/app/common',
				'name' => 'modules',
				'withLocal' => true,
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadModuleConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/store/app/console',
				'name' => 'modules',
				'withLocal' => true,
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/store/app/common',
				'name' => 'routes',
				'withLocal' => true,
				'assignTo' => 'components.urlManager.rules',
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/store/app/console',
				'name' => 'routes',
				'withLocal' => true,
				'assignTo' => 'components.urlManager.rules',
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/store/app/common',
				'name' => 'params',
				'withLocal' => true,
				'assignTo' => 'params',
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/store/app/console',
				'name' => 'params',
				'withLocal' => true,
				'assignTo' => 'params',
			],
			[
				'class' => 'yii2lab\\domain\\filters\\LoadDomainConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/store/app/common',
				'name' => 'domains',
				'withLocal' => true,
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/store/app/common',
				'name' => 'install',
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/store/app/console',
				'name' => 'install',
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/store/app/common',
				'name' => 'test',
				'withLocal' => true,
				'isEnabled' => true,
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-app/tests/store/app/console',
				'name' => 'test',
				'withLocal' => true,
				'isEnabled' => true,
			],
			'yii2lab\\app\\domain\\filters\\config\\SetControllerNamespace',
			'yii2lab\\app\\domain\\filters\\config\\FixValidationKeyInTest',
			'yii2lab\\app\\domain\\filters\\config\\SetAppId',
			'yii2lab\\app\\domain\\filters\\config\\SetPath',
			'yii2module\\offline\\domain\\filters\\IsOffline',
		],
	],
	'project' => 'qrpay',
	'mode' => [
		'debug' => true,
		'env' => 'test',
	],
	'url' => [
		'frontend' => 'http://qr.yii/',
		'backend' => 'http://admin.qr.yii/',
		'api' => 'http://api.qr.yii/',
	],
	'cookieValidationKey' => [
		'frontend' => 'bBXEWnH5ERCG7SF3wxtbotYxq3W-Op7B',
		'backend' => 'zbfqVR5PhdO3E8Xi7DB4aoxmxSstJ6aI',
	],
	'domain' => [
		'driver' => [
			'primary' => 'ar',
			'slave' => 'ar',
		],
	],
	'servers' => [
		'db' => [
			'main' => [
				'driver' => 'pgsql',
				'host' => 'dbweb',
				'username' => 'logging',
				'password' => 'moneylogger',
				'dbname' => 'qrpay',
				'defaultSchema' => 'qrpay',
			],
			'test' => [
				'driver' => 'mysql',
				'host' => 'localhost',
				'username' => 'root',
				'password' => '',
				'dbname' => 'qrpay_test',
			],
		],
		'static' => [
			'domain' => 'http://qr.yii/',
			'publicPath' => '@frontend/web/',
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
		'mail' => [
			'host' => 'mail',
			'username' => 'info@qrp.kz',
			'password' => 'SEqwBmUlnykbj2p5',
			'port' => '25',
		],
	],
	'db' => [
		'main' => [
			'driver' => 'pgsql',
			'host' => 'dbweb',
			'username' => 'logging',
			'password' => 'moneylogger',
			'dbname' => 'qrpay',
			'defaultSchema' => 'qrpay',
			'tablePrefix' => '',
			'dsn' => 'pgsql:host=dbweb;dbname=qrpay',
		],
		'test' => [
			'driver' => 'mysql',
			'host' => 'localhost',
			'username' => 'root',
			'password' => '',
			'dbname' => 'qrpay_test',
			'tablePrefix' => '',
			'dsn' => 'mysql:host=localhost;dbname=qrpay_test',
		],
	],
];
<?php

return [
	'project' => 'qrpay',
	'mode' => [
		'debug' => true,
		'env' => 'dev',
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
			/*'connection' => [
				'address' => '192.168.8.10',
				'port' => '22',
				'username' => 'static',
				'password' => '',
				'publicKey' => dirname(__FILE__) . '/../../../keys/static.pub',
				'privateKey' => dirname(__FILE__) . '/../../../keys/static.ppk',
			],*/
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
];

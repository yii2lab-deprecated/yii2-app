<?php 

return [
	'url' => [
		'frontend' => 'http://example.com/',
		'backend' => 'http://admin.example.com/',
		'api' => 'http://api.example.com/',
	],
	'servers' => [
		'db' => [
			'main' => [
				'driver' => 'pgsql',
				'host' => 'dbweb',
				'username' => 'logging',
				'password' => 'moneylogger',
				'dbname' => 'example',
				'defaultSchema' => 'example',
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
			'password' => 'qwerty123',
			'port' => '25',
		],
		'static' => [
			'publicPath' => '@frontend/web/',
			'domain' => 'http://example.com/',
		],
	],
	'mode' => [
		'env' => 'prod',
		'debug' => false,
	],
	'cookieValidationKey' => [
		'frontend' => 'fdDymVkKhCNkVGq8l5pFIU00isrvtz6L',
		'backend' => 'F4vmQmhD8QENUls5JHyhBYRTCpS1Xgjm',
	],
	'domain' => [
		'driver' => [
			'primary' => 'ar',
			'slave' => 'ar',
		],
	],
];
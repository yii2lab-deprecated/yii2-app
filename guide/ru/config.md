Конфигурация
===

## Окружение

```php
return [
	'YII_DEBUG' => true,
	'YII_ENV' => 'dev',
	'project' => 'qrpay',
	'url' => [
		'frontend' => 'http://qr.yii/',
		'backend' => 'http://admin.qr.yii/',
		'api' => 'http://api.qr.yii/',
	],
	'cookieValidationKey' => [
		'frontend' => 'reBQhxV_4_8RZCWLCSxwsTx3qzW87b0j',
		'backend' => '7X4DFREquxxsIvxnOjArUB4Qmswu-O8-',
	],
	'connection' => [
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
	'servers' => [
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
			'host' => 'mail.ru',
			'username' => 'info@example.com',
			'password' => 'user_password',
			'port' => '25',
		],
	],
	'config' => [
		'map' => [
			[
				'name' => 'services',
				'merge' => true,
				'withLocal' => true,
				'onlyApps' => [
					'common',
				],
			],
		],
	],
];
```


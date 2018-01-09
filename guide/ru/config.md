Конфигурация
===

## Окружение

Это начальный конфиг окружения.

Что можно настроить:

* Пути
* Домены
* Конфиг базы данных
* Допустимые IP для дебагера и генератора кода
* Режим отладки
* Окружение (prod, dev)
* Сервера
* Удаленный драйвер
* Карта конфигов

Конфиг находится в файле:

```
common/config/env.php
```

Пример конфига:

```php
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
		'frontend' => '8TeBn54VTvHGpl3pRE9CJbQD4Iiq38CF',
		'backend' => 'vrXQQAK2iJmeiVN0a5yg1SdMbnFRNku5',
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
		'mail' => [
			'host' => 'mail',
			'username' => 'info@exmple.com',
			'password' => 'qwerty123',
			'port' => '25',
		],
	],
	'remote' => [
		'driver' => 'ar',
	],
];
```

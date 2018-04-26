Конфигурация
===

## Окружение

Это начальный конфиг окружения.

Что можно настроить:

* Режим
	* Окружение (prod, dev)
	* Дебаг
* Ссылки
	* frontend
	* backend
	* api
* Драйвер репозиториев
	* Главный
	* Вторичный
* Сервера
	* База данных
	* Место хранения статических данных
	* Почта
	* TPS
	* Ядро
* Фильтры конфигов

Конфиг находится в файлах:

* `common/config/env.php`
* `common/config/env-local.php`

##  Примеры

### env.php

Пример конфига `common/config/env.php`:

```php
use yii2lab\app\domain\filters\config\LoadConfig;
use yii2lab\app\domain\filters\config\LoadModuleConfig;
use yii2lab\domain\filters\LoadDomainConfig;

return [
	'config' => [
		'filters' => [
			[
				'class' => LoadConfig::class,
				'app' => COMMON,
				'name' => 'main',
				'withLocal' => true,
			],
			[
				'class' => LoadConfig::class,
				'app' => APP,
				'name' => 'main',
				'withLocal' => true,
			],
			
			/*[
				'class' => LoadConfig::class,
				'app' => COMMON,
				'name' => 'test',
				'withLocal' => true,
				'isEnabled' => YII_ENV == YiiEnvEnum::TEST,
			],
			[
				'class' => LoadConfig::class,
				'app' => APP,
				'name' => 'test',
				'withLocal' => true,
				'isEnabled' => YII_ENV == YiiEnvEnum::TEST,
			],*/
			
			[
				'class' => LoadModuleConfig::class,
				'app' => COMMON,
				'name' => 'modules',
				'withLocal' => true,
			],
			[
				'class' => LoadModuleConfig::class,
				'app' => APP,
				'name' => 'modules',
				'withLocal' => true,
			],
			
			[
				'class' => LoadConfig::class,
				'app' => COMMON,
				'name' => 'routes',
				'withLocal' => true,
				'assignTo' => 'components.urlManager.rules',
			],
			[
				'class' => LoadConfig::class,
				'app' => APP,
				'name' => 'routes',
				'withLocal' => true,
				'assignTo' => 'components.urlManager.rules',
			],
			
			[
				'class' => LoadConfig::class,
				'app' => COMMON,
				'name' => 'params',
				'withLocal' => true,
				'assignTo' => 'params',
			],
			[
				'class' => LoadConfig::class,
				'app' => APP,
				'name' => 'params',
				'withLocal' => true,
				'assignTo' => 'params',
			],
			
			[
				'class' => LoadDomainConfig::class,
				'app' => COMMON,
				'name' => 'domains',
				'withLocal' => true,
			],
			
			[
				'class' => LoadDomainConfig::class,
				'app' => COMMON,
				'name' => 'install',
				'withLocal' => false,
			],
			'yii2lab\app\domain\filters\config\SetControllerNamespace',
			'yii2lab\app\domain\filters\config\FixValidationKeyInTest',
			'yii2lab\app\domain\filters\config\SetAppId',
			'yii2lab\app\domain\filters\config\SetPath',
			'yii2module\offline\domain\filters\IsOffline',
			
			[
				'class' => 'yii2lab\migration\domain\filters\SetPath',
				'path' => [
					'@vendor/yii2module/yii2-article/src/domain/migrations',
					'@vendor/yii2woop/yii2-account/src/domain/migrations',
				],
				'scan' => [
					'@domain',
				],
			],
			
		],
	],
];
```

### env-local.php

Пример конфига `common/config/env-local.php`:

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
		'mail' => [
			'host' => 'mail',
			'username' => 'info@exmple.com',
			'password' => 'qwerty123',
			'port' => '25',
		],
	],
];
```

> Note: В этом конфиге можно использовать переменные окружения. 
> Это может потребоваться для повышения безопасности 
> или для упрощения деплоя и инициализации приложения.

##  Фильтры

Фильтрами можно:

* грузить конфиги
* исправлять недочеты
* делать автодополнения конфигов

Редактируются фильтры в файле `env.php` в разделе `config.filters`.

## Настройка структуры

Структуру конфигов можно настроить под проект индивидуально.
Делается это изменением состава фильтров.

Рассмотрим фильтр загрузки конфига:

```php
use yii2lab\app\domain\filters\config\LoadConfig;

return [
	
	...

	'config' => [
		'filters' => [
			
			...

			[
				'class' => LoadConfig::class,
				'app' => COMMON,
				'name' => 'main',
				'withLocal' => true,
			],
			[
				'class' => LoadConfig::class,
				'name' => 'main',
				'withLocal' => true,
			],
			...
		],
	],
	
	...

];
```

## Переопределение класса Yii

Есть возможность переопределить стандартный класс `Yii`.

Делаем так:

* Копируем класс  `vendor/yiisoft/yii2/Yii.php` в `common/Yii.php`
* Вносим необходимые изменения
* Указываем в конфиге `common/config/env.php` откуда грузить класс `Yii`

Пример конфига:

```php
return [

	...

	'yii' => [
		'class' => COMMON_DIR . DS . 'Yii.php',
	],
	
	...

];
```
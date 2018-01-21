<?php 

return [
	'name' => 'Test',
	'language' => 'ru-RU',
	'sourceLanguage' => 'xx-XX',
	'bootstrap' => [
		'log',
		'language',
		'queue',
	],
	'timeZone' => 'UTC',
	'aliases' => [
		'@bower' => '@vendor/bower-asset',
		'@npm' => '@vendor/npm-asset',
	],
	'components' => [
		'language' => 'yii2module\\lang\\domain\\components\\Language',
		'user' => [
			'class' => 'yii2woop\\account\\domain\\web\\User',
			'enableSession' => false,
		],
		'log' => [
			'targets' => [
				[
					'class' => 'yii\\log\\FileTarget',
					'except' => [
						'yii\\web\\HttpException:*',
						'yii2module\\lang\\domain\\i18n\\PhpMessageSource::loadMessages',
					],
				],
			],
			'traceLevel' => 3,
		],
		'authManager' => [
			'class' => 'yii2lab\\rbac\\rbac\\PhpManager',
			'itemFile' => '@common/data/rbac/items.php',
			'ruleFile' => '@common/data/rbac/rules.php',
			'defaultRoles' => [
				'rGuest',
			],
		],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'rules' => [],
		],
		'cache' => [
			'class' => 'yii\\caching\\FileCache',
			'cachePath' => '@common/runtime/cache',
		],
		'i18n' => [
			'class' => 'yii2module\\lang\\domain\\i18n\\I18N',
			'translations' => [
				'*' => [
					'class' => 'yii2module\\lang\\domain\\i18n\\PhpMessageSource',
					'basePath' => '@common/messages',
					'on missingTranslation' => [
						'yii2module\\lang\\domain\\handlers\\TranslationEventHandler',
						'handleMissingTranslation',
					],
				],
			],
		],
		'db' => [
			'class' => 'yii\\db\\Connection',
			'charset' => 'utf8',
			'enableSchemaCache' => false,
			'username' => 'root',
			'password' => '',
			'tablePrefix' => '',
			'dsn' => 'mysql:host=localhost;dbname=example_test',
		],
		'mailer' => [
			'class' => 'yii\\swiftmailer\\Mailer',
			'viewPath' => '@common/mail',
			'htmlLayout' => '@yii2lab/notify/domain/mail/layouts/html',
			'textLayout' => '@yii2lab/notify/domain/mail/layouts/text',
			'useFileTransport' => true,
			'fileTransportPath' => '@common/runtime/mail',
		],
		'queue' => [
			'class' => 'yii\\queue\\file\\Queue',
			'path' => '@common/runtime/queue',
		],
		'lang' => [
			'class' => 'yii2module\\lang\\domain\\Domain',
			'id' => 'lang',
			'repositories' => [
				'language' => 'disc',
				'store' => 'cookie',
			],
			'services' => [
				'language' => [
					'translationEventHandler' => [
						'yii2module\\lang\\domain\\handlers\\TranslationEventHandler',
						'handleMissingTranslation',
					],
				],
			],
		],
	],
	'modules' => [],
	'params' => [
		'pageSize' => 25,
		'adminEmail' => 'admin@example.com',
		'supportEmail' => 'support@example.com',
		'robotEmail' => 'robot@example.com',
	],
	'controllerNamespace' => 'console\\controllers',
	'id' => 'app-console',
	'basePath' => 'C:\\OpenServer\\domains\\qr.yii\\console',
	'vendorPath' => 'C:\\OpenServer\\domains\\qr.yii\\vendor\\',
];
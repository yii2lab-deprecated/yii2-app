<?php

use yii2lab\app\domain\helpers\Db;
use yii2module\lang\domain\enums\LanguageEnum;

return [
	'name' => 'Qrpay',
	'language' => LanguageEnum::RU, // current Language
	'sourceLanguage' => LanguageEnum::SOURCE, // Language development
	'bootstrap' => ['log', 'language', 'queue'],
	'timeZone' => 'UTC',
	'aliases' => [
		'@bower' => '@vendor/bower-asset',
		'@npm'   => '@vendor/npm-asset',
	],
	'components' => [
		'language' => 'yii2module\lang\domain\components\Language',
        'user' => [
			'class' => 'yii2woop\account\domain\web\User',
			//'identityClass' => 'yii2woop\account\domain\models\User',
		],
		'httpClient' => [
			'class' => 'yii\httpclient\Client',
		],
		'log' => [
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					//'levels' => ['error', 'warning'],
					'except' => [
						'yii\web\HttpException:*',
						YII_ENV_TEST ? 'yii2module\lang\domain\i18n\PhpMessageSource::loadMessages' : null,
					],
				],
			],
			'traceLevel' => YII_DEBUG ? 3 : 0,
		],
		'authManager' => [
			'class' => 'yii2lab\rbac\rbac\PhpManager',
			'itemFile' => '@common/data/rbac/items.php',
			'ruleFile' => '@common/data/rbac/rules.php',
			'defaultRoles' => ['rGuest'],
		],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
		],
		'cache' => [
			'class' => 'yii\caching\FileCache',
			'cachePath' => '@common/runtime/cache',
		],
		'i18n' => [
			'class' => 'yii2module\lang\domain\i18n\I18N',
			'translations' => [
				'*' => [
					'class' => 'yii2module\lang\domain\i18n\PhpMessageSource',
					'basePath' => '@common/messages',
					'on missingTranslation' => ['yii2module\lang\domain\handlers\TranslationEventHandler', 'handleMissingTranslation'],
				],
			],
		],
		'db' => Db::getConfig([
			'class' => 'yii\db\Connection',
			'charset' => 'utf8',
			'enableSchemaCache' => YII_ENV_PROD,
			/*
			'enableSchemaCache' => true,
			'schemaCacheDuration' => 3600,
			'schemaCache' => 'cache',
			*/
		], YII_ENV_TEST ? 'test' : 'main'),
		'mailer' => [
			'class' => 'yii\swiftmailer\Mailer',
			'viewPath' => '@common/mail',
            'htmlLayout' => '@yii2lab/notify/domain/mail/layouts/html',
            'textLayout' => '@yii2lab/notify/domain/mail/layouts/text',
			'useFileTransport' => YII_DEBUG,
			'fileTransportPath' => '@common/runtime/mail',
			'transport' => [
				'class' => 'Swift_SmtpTransport',
				'host' => env('servers.mail.host'),
				'username' => env('servers.mail.username'),
				'password' => env('servers.mail.password'),
				'port' => env('servers.mail.port', 25),
				//'encryption' => 'ssl', // It is often used, check your provider or mail server specs
			],
		],
		'queue' => [
			'class' => 'yii\queue\file\Queue',
			'path' => '@common/runtime/queue',
		],
		'security' => 'domain\v4\account\base\Security',
	],
];

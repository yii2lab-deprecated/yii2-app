<?php

use yii2module\lang\domain\enums\LanguageEnum;

return [
	'name' => 'Demo',
	'language' => LanguageEnum::RU, // current Language
	'sourceLanguage' => LanguageEnum::SOURCE, // Language development
	'bootstrap' => ['log', 'language', 'queue'],
	'timeZone' => 'UTC',
	'aliases' => [
		'@bower' => '@vendor/bower-asset',
		'@npm' => '@vendor/npm-asset',
	],
	'components' => [
		'language' => 'yii2module\lang\domain\components\Language',
		'user' => [
			'class' => 'yii2module\account\domain\v2\web\User',
		],
		'log' => [
			'targets' => [
				[
					'class' => 'yii\log\DbTarget',
					'levels' => ['error', 'warning'],
					'except' => [
						'yii\web\HttpException:*',
						YII_ENV_TEST ? 'yii2module\lang\domain\i18n\PhpMessageSource::loadMessages' : null,
					],
				],
			],
			'traceLevel' => YII_DEBUG ? 3 : 0,
		],
		'authManager' => 'yii2lab\rbac\domain\rbac\PhpManager',
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
			'aliases' => [
				'*' => '@common/messages',
			],
		],
		'db' => 'yii2lab\db\domain\db\Connection',
		'queue' => [
			'class' => 'yii2lab\extension\queue\drivers\file\Queue',
			'path' => '@common/runtime/queue',
			'autoRun' => !YII_ENV_PROD,
		],
	],
];

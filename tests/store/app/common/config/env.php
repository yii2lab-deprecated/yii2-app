<?php

use yii2lab\app\domain\filters\config\LoadConfig;
use yii2lab\app\domain\filters\config\LoadModuleConfig;
use yii2lab\domain\filters\LoadDomainConfig;
use yii2lab\misc\enums\YiiEnvEnum;

$common = 'vendor/yii2lab/yii2-app/tests/store/app/common';
$app = 'vendor/yii2lab/yii2-app/tests/store/app/app';

return [
	'config' => [
		'filters' => [
			[
				'class' => LoadConfig::class,
				'app' => $common,
				'name' => 'main',
				'withLocal' => true,
			],
			[
				'class' => LoadConfig::class,
				'app' => $app,
				'name' => 'main',
				'withLocal' => true,
			],
			
			[
				'class' => LoadModuleConfig::class,
				'app' => $common,
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
				'app' => $common,
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
				'app' => $common,
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
				'app' => $common,
				'name' => 'domains',
				'withLocal' => true,
			],
			
			[
				'class' => LoadConfig::class,
				'app' => $common,
				'name' => 'install',
			],
			[
				'class' => LoadConfig::class,
				'app' => APP,
				'name' => 'install',
			],
			
			[
				'class' => LoadConfig::class,
				'app' => $common,
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
			],
			
			'yii2lab\app\domain\filters\config\SetControllerNamespace',
			'yii2lab\app\domain\filters\config\FixValidationKeyInTest',
			'yii2lab\app\domain\filters\config\SetAppId',
			'yii2lab\app\domain\filters\config\SetPath',
			'yii2module\offline\domain\filters\IsOffline',
			
			[
				'class' => 'yii2lab\migration\domain\filters\SetPath',
				'path' => [
					//'@vendor/yii2module/yii2-rest-client/src/migrations',
					'@vendor/yii2module/yii2-article/src/domain/migrations',
					'@vendor/yii2lab/yii2-geo/src/domain/migrations',
					//'@vendor/yii2lab/yii2-notify/src/migrations',
					//'@vendor/yii2lab/yii2-qr/src/migrations',
					//'@vendor/yii2woop/yii2-account/src/domain/migrations',
					//'@vendor/yii2woop/yii2-service/src/domain/v1/migrations',
				],
				'scan' => [
					//	'@domain',
				],
			],
		],
	],
];
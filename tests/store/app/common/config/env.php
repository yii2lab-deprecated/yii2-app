<?php

use yii2lab\app\domain\filters\config\LoadConfig;
use yii2lab\app\domain\filters\config\LoadModuleConfig;
use yii2lab\domain\filters\LoadDomainConfig;
use yii2lab\misc\enums\YiiEnvEnum;

$basePath = 'vendor/yii2lab/yii2-app/tests/store/app/';

return [
	'config' => [
		'filters' => [
			[
				'class' => LoadConfig::class,
				'app' => $basePath . COMMON,
				'name' => 'main',
				'withLocal' => true,
			],
			[
				'class' => LoadConfig::class,
				'app' => $basePath . APP,
				'name' => 'main',
				'withLocal' => true,
			],
			
			[
				'class' => LoadModuleConfig::class,
				'app' => $basePath . COMMON,
				'name' => 'modules',
				'withLocal' => true,
			],
			[
				'class' => LoadModuleConfig::class,
				'app' => $basePath . APP,
				'name' => 'modules',
				'withLocal' => true,
			],
			
			[
				'class' => LoadConfig::class,
				'app' => $basePath . COMMON,
				'name' => 'routes',
				'withLocal' => true,
				'assignTo' => 'components.urlManager.rules',
			],
			[
				'class' => LoadConfig::class,
				'app' => $basePath . APP,
				'name' => 'routes',
				'withLocal' => true,
				'assignTo' => 'components.urlManager.rules',
			],
			
			[
				'class' => LoadConfig::class,
				'app' => $basePath . COMMON,
				'name' => 'params',
				'withLocal' => true,
				'assignTo' => 'params',
			],
			[
				'class' => LoadConfig::class,
				'app' => $basePath . APP,
				'name' => 'params',
				'withLocal' => true,
				'assignTo' => 'params',
			],
			
			[
				'class' => LoadDomainConfig::class,
				'app' => $basePath . COMMON,
				'name' => 'domains',
				'withLocal' => true,
			],
			
			[
				'class' => LoadConfig::class,
				'app' => $basePath . COMMON,
				'name' => 'install',
			],
			[
				'class' => LoadConfig::class,
				'app' => $basePath . APP,
				'name' => 'install',
			],
			
			[
				'class' => LoadConfig::class,
				'app' => $basePath . COMMON,
				'name' => 'test',
				'withLocal' => true,
				'isEnabled' => YII_ENV == YiiEnvEnum::TEST,
			],
			[
				'class' => LoadConfig::class,
				'app' => $basePath . APP,
				'name' => 'test',
				'withLocal' => true,
				'isEnabled' => YII_ENV == YiiEnvEnum::TEST,
			],
			
			'yii2lab\app\domain\filters\config\SetControllerNamespace',
			'yii2lab\app\domain\filters\config\FixValidationKeyInTest',
			'yii2lab\app\domain\filters\config\SetAppId',
			'yii2lab\app\domain\filters\config\SetPath',
			'yii2module\offline\domain\filters\IsOffline',
		],
	],
];
<?php

use yii2lab\app\domain\filters\config\LoadConfig;
use yii2lab\helpers\UrlHelper;
use yii2lab\misc\enums\YiiEnvEnum;

$domain = UrlHelper::currentDomain();
$baseDomain = UrlHelper::baseDomain($domain);

return [
	'project' => 'guest',
	'mode' => [
		'debug' => true,
		'env' => YiiEnvEnum::DEV,
	],
	'url' => [
		'frontend' => 'http://' . $baseDomain . SL,
		'backend' => 'http://admin.' . $baseDomain. SL,
		'api' => 'http://api.' . $baseDomain . SL,
	],
	'cookieValidationKey' => [
		'frontend' => '8TeBn54VTvHGpl3pRE9CJbQD4Iiq38CF',
		'backend' => 'vrXQQAK2iJmeiVN0a5yg1SdMbnFRNku5',
	],
	'remote' => [
		'driver' => 'disc',
	],
	'config' => [
		'filters' => [
			[
				'class' => LoadConfig::class,
				'app' => 'common',
				'name' => 'main',
				'withLocal' => true,
			],
			[
				'class' => LoadConfig::class,
				'name' => 'main',
				'withLocal' => true,
			],
			
			/*[
				'class' => LoadConfig::class,
				'app' => 'common',
				'name' => 'test',
				'withLocal' => true,
				'isEnabled' => YII_ENV == YiiEnvEnum::TEST,
			],
			[
				'class' => LoadConfig::class,
				'name' => 'test',
				'withLocal' => true,
				'isEnabled' => YII_ENV == YiiEnvEnum::TEST,
			],*/
			
			[
				'class' => LoadConfig::class,
				'app' => 'common',
				'name' => 'modules',
				'withLocal' => true,
			],
			[
				'class' => LoadConfig::class,
				'name' => 'modules',
				'withLocal' => true,
			],
			
			[
				'class' => LoadConfig::class,
				'app' => 'common',
				'name' => 'params',
				'withLocal' => true,
				'assignTo' => 'params',
			],
			[
				'class' => LoadConfig::class,
				'name' => 'params',
				'withLocal' => true,
				'assignTo' => 'params',
			],
			
			[
				'class' => LoadConfig::class,
				'app' => 'common',
				'name' => 'services',
				'withLocal' => true,
			],
			'yii2lab\app\domain\filters\config\SetControllerNamespace',
			'yii2lab\app\domain\filters\config\FixValidationKeyInTest',
			'yii2lab\app\domain\filters\config\SetAppId',
			'yii2lab\app\domain\filters\config\SetPath',
			'yii2module\offline\domain\filters\IsOffline',
			'yii2lab\migration\domain\filters\SetPath',
			'yii2lab\domain\filters\NormalizeServices',
		],
	],
];
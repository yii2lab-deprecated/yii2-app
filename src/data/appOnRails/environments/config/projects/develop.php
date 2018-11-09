<?php

use yii2lab\app\domain\enums\YiiEnvEnum;
use yii2lab\extension\common\helpers\StringHelper;
use yii2lab\extension\enum\enums\TimeEnum;

$domain = 'demo.yii';

$servers = [
	'static' => [
		'publicPath' => '@frontend/web/',
		'domain' => 'http://' . $domain . '/',
		'driver' => 'local',
		'connection' => [
			'path' => '@frontend/web',
		],
	],
	/*'mail' => [
		'host' => '',
		'username' => '',
		'password' => '',
		'port' => 25,
		//'encryption' => 'ssl', // It is often used, check your provider or mail server specs
	],*/
	'db' => [
		'main' => [
			'driver' => 'mysql',
			'host' => 'localhost',
			'username' => 'root',
			'password' => '',
			'dbname' => 'demo_yii',
		],
	],
];

$jwtProfiles = [
	'default' => [
		'key' => StringHelper::generateRandomString(32),
		'issuer_url' => 'http://api.' . $domain . '/v1/auth',
		'life_time' => TimeEnum::SECOND_PER_MINUTE * 20,
		'allowed_algs' => ['HS256', 'SHA512', 'HS384'],
		'default_alg' => 'HS256',
		'audience' => ['http://api.' . $domain],
	],
	'auth' => [
		'key' => StringHelper::generateRandomString(32),
		'issuer_url' => 'http://api.' . $domain . '/v1/auth',
		'life_time' => TimeEnum::SECOND_PER_MINUTE * 20,
		'allowed_algs' => ['HS256', 'SHA512', 'HS384'],
		'default_alg' => 'HS256',
		'audience' => ['http://api.' . $domain],
	],
];

$authclientProfiles = [
	'github' => [
		'class' => 'yii\authclient\clients\Github',
		'clientId' => '',
		'clientSecret' => '',
	],
];

$config = [
	'title' => 'Develop',
	'filters' => [
		[
			'class' => 'yii2lab\init\domain\filters\input\Custom',
			'title' => 'Custom env config',
			'segment' => null,
			'value' => [
				'url' => [
					'frontend' => 'http://' . $domain . '/',
					'backend' => 'http://admin.' . $domain . '/',
					'api' => 'http://api.' . $domain . '/',
				],
				'servers' => $servers,
				'mode' => [
					'env' => YiiEnvEnum::DEV,
					'debug' => true,
				],
				'jwt' => [
					'profiles' => $jwtProfiles,
				],
				'authclient' => [
					'profiles' => $authclientProfiles,
				],
			
			],
		],
	],
];

$commonConfig = include(realpath(__DIR__ . '/../snipet/commonFilters.php'));
$config['filters'] = array_merge($config['filters'], $commonConfig);
return $config;
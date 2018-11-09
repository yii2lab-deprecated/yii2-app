<?php

use yii2lab\app\domain\helpers\EnvService;

return [
	'bootstrap' => [],
	'components' => [
		'user' => [
			'enableAutoLogin' => true,
			'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
			'loginUrl' => ['user/auth/login'],
		],
		'request' => [
			'csrfParam' => '_csrf-frontend',
			'parsers' => [
				'application/json' => 'yii\web\JsonParser',
			],
			'cookieValidationKey' => EnvService::get('cookieValidationKey.frontend'),
		],
		'session' => [
			// this is the name of the session cookie used for login on the frontend
			'name' => 'advanced-frontend',
		],
		'errorHandler' => [
			'errorAction' => 'error/error/error',
		],
	],
];

<?php

return [
	'bootstrap' => [],
	'layout' => '@yii2lab/applicationTemplate/backend/views/layouts/main',
	'components' => [
		'user' => [
			'enableAutoLogin' => true,
			'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
			'loginUrl' => ['user/auth/login'],
		],
		'request' => [
			'csrfParam' => '_csrf-backend',
			'parsers' => [
				'application/json' => 'yii\web\JsonParser',
			],
			'cookieValidationKey' => env('cookieValidationKey.backend'),
		],
		'session' => [
			// this is the name of the session cookie used for login on the backend
			'name' => 'advanced-backend',
		],
		'errorHandler' => [
			'errorAction' => 'error/error/error',
		],
	],
];

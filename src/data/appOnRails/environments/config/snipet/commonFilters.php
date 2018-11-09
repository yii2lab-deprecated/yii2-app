<?php

return [
	[
		'class' => 'yii2lab\init\domain\filters\input\Custom',
		'title' => 'Domain',
		'segment' => 'domain',
		'value' => [
			'driver' => [
				'primary' => 'ar',
				'slave' => 'ar',
			],
		],
	],
	[
		'class' => 'yii2lab\init\domain\filters\input\Custom',
		'title' => 'Encrypt',
		'segment' => 'encrypt',
		'value' => [
			'profiles' => [
				'default' => [
					'password' => 'qwerty123',
					'iv' => 'ZZZZZZZZZZZZZZZZ',
				],
			],
		],
	],
	[
		'class' => 'yii2lab\init\domain\filters\input\CookieValidationKey',
		'length' => 32,
		'apps' => [
			'frontend',
			'backend',
		],
	],
	[
		'class' => 'yii2lab\init\domain\filters\store\Copy',
		'paths' => [
			'environments/files',
		],
	],
	[
		'class' => 'yii2lab\init\domain\filters\store\SetWritable',
		'target' => [
			'frontend',
			'backend',
			'api',
			'console',
		],
		'paths' => [
			'frontend/web/images',
			'common/runtime',
			'common/runtime/sqlite',
			'common/runtime/queue',
			'console/migrations',
			'{app}/runtime',
			'{app}/web/assets',
		],
		'ignorePaths' => [
			'console/web/assets',
		],
	],
	[
		'class' => 'yii2lab\init\domain\filters\store\SetExecutable',
		'paths' => [
			'yii',
			'yii_test',
		],
	],
	[
		'class' => 'yii2lab\init\domain\filters\store\EnvLocalConfig',
	],
];

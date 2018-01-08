<?php

use yii2lab\misc\enums\YiiEnvEnum;

return [
	'YII_DEBUG' => true,
	'YII_ENV' => YiiEnvEnum::DEV,
	'project' => 'guest',
	'config' => [
		'map' => [
			[
				'name' => 'services',
				'merge' => true,
				'withLocal' => true,
				'onlyApps' => [
					'common',
				],
			],
		],
	],
	'remote' => [
		'driver' => 'disc',
	],
];
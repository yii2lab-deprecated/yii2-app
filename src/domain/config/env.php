<?php

return [
	/*'YII_DEBUG' => true,
	'YII_ENV' => 'env',
	'project' => 'guest',*/
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
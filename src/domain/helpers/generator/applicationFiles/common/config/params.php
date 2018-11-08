<?php

return [
	'MaintenanceMode' => false,
	'pageSize' => 25,
	'adminEmail' => 'admin@example.com',
	'fixture' => [
		'dir' => '@common/fixtures',
		'exclude' => [
			'migration',
		],
	],
	'static' => [
		'path' => [
			'avatar' => 'images/avatars',
		],
	],
	'article' => [
		'links' => [
			'about',
			'contact',
		],
	],
];
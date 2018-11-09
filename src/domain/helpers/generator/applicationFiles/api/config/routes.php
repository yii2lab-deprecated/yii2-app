<?php

use yii2lab\rest\domain\helpers\ApiVersionConfig;

$config = [
	API_VERSION_STRING => 'dashboard/default/index',
	
	'@import' => [
		'vendor/yii2lab/yii2-rest/src/api',
	],
];

$config = ApiVersionConfig::load('routes', $config);

return $config;

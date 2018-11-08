<?php

use yii2lab\rest\domain\helpers\ApiVersionConfig;

$config = [
	
	API_VERSION_STRING => 'dashboard/default/index',
	
	[
		'class' => 'yii2lab\app\domain\filters\config\LoadRouteConfig',
		'modules' => [],
	],
];

$config = ApiVersionConfig::load('routes', $config);

return $config;

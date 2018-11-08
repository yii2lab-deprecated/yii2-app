<?php

use yii2lab\rest\domain\helpers\ApiVersionConfig;

$config = [
	'dashboard' => 'yii2module\dashboard\api\Module',
	'rest' => [
		'class' => 'yii2lab\rest\api\Module',
		'isEnabledDoc' => YII_ENV_DEV,
	],
];

return ApiVersionConfig::load('modules', $config);

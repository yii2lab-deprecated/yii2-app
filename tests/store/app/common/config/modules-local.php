<?php

use yii2lab\app\domain\helpers\Config;
use yii2lab\helpers\Behavior;

return [
	
	'debug' => [
		'class' => 'yii\debug\Module',
		'allowedIPs' => env('allowedIPs', []),
		'isEnabled' => YII_ENV_DEV && YII_DEBUG,
	],
	'test' => [
		'class' => 'yii2module\test\web\Module',
		'isEnabled' => YII_ENV_DEV && YII_DEBUG,
	],
];

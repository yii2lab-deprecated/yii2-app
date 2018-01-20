<?php

use common\enums\rbac\PermissionEnum;
use yii2lab\app\domain\helpers\Config;
use yii2lab\helpers\Behavior;

return [
	'gii' => [
		'class' => 'yii\gii\Module',
		'allowedIPs' => env('allowedIPs'),
		'as access' => Behavior::access(PermissionEnum::BACKEND_ALL),
		'isEnabled' => YII_ENV_DEV && YII_DEBUG,
	],
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

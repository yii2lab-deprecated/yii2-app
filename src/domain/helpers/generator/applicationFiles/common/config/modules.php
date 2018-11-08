<?php

use common\enums\rbac\PermissionEnum;
use yii2lab\helpers\Behavior;

return [
	'offline' => [
		'class' => 'yii2module\offline\web\Module',
	],
	'lang' => [
		'class' => 'yii2module\lang\module\Module',
	],
	'debug' => [
		'class' => 'yii\debug\Module',
		'allowedIPs' => ['127.0.0.1'],
		'as access' => Behavior::access(PermissionEnum::BACKEND_ALL),
	],
	'gii' => [
		'class' => 'yii\gii\Module',
		'allowedIPs' => ['127.0.0.1'],
		'as access' => Behavior::access(PermissionEnum::BACKEND_ALL),
		'isEnabled' => YII_ENV_DEV,
	],
];


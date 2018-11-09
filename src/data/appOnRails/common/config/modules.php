<?php

use yii2lab\applicationTemplate\common\enums\ApplicationPermissionEnum;
use yii2lab\extension\web\helpers\Behavior;

return [
	'lang' => [
		'class' => 'yii2module\lang\module\Module',
	],
	'debug' => [
		'class' => 'yii\debug\Module',
		'allowedIPs' => ['127.0.0.1'],
		'as access' => Behavior::access(ApplicationPermissionEnum::BACKEND_ALL),
	],
	'gii' => [
		'class' => 'yii\gii\Module',
		'allowedIPs' => ['127.0.0.1'],
		'as access' => Behavior::access(ApplicationPermissionEnum::BACKEND_ALL),
		'isEnabled' => YII_ENV_DEV,
	],
];


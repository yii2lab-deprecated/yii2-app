<?php

use yii2lab\extension\web\helpers\Behavior;

return [
	'error' => 'yii2module\error\module\Module',
	'user' => [
		'class' => 'yii2module\account\module\Module',
		'controllerMap' => [
			'auth' => [
				'class' => 'yii2module\account\module\controllers\AuthController',
				'layout' => '@yii2lab/applicationTemplate/backend/views/layouts/singleForm.php',
			],
		],
	],
	'dashboard' => [
		'class' => 'yii2module\dashboard\admin\Module',
		'as access' => Behavior::access(PermissionEnum::BACKEND_ALL),
	],
	'vendor' => 'yii2module\vendor\admin\Module',
];

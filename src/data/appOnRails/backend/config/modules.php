<?php

return [
	'error' => 'yii2module\error\module\Module',
	'dashboard' => 'yii2module\dashboard\admin\Module',
	'user' => [
		'class' => 'yii2module\account\module\Module',
		'controllerMap' => [
			'auth' => [
				'class' => 'yii2module\account\module\controllers\AuthController',
				'layout' => '@yii2lab/applicationTemplate/backend/views/layouts/singleForm.php',
			],
		],
	],
];

<?php

Yii::$container->set('yii\web\ErrorHandler', [
	'class' => 'yii2module\error\domain\web\ErrorHandler',
	'filters' => [
		'yii2lab\rbac\domain\filters\PermissionException',
	],
]);

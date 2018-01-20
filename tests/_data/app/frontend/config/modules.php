<?php

use common\enums\rbac\PermissionEnum;
use yii2lab\app\domain\helpers\Config;
use yii2lab\helpers\Behavior;

$config = [
	'error' => [
		'class' => 'yii2module\error\Module',
	],
	'user' => [
		'class' => 'yii2woop\account\module\Module',
	],
	'profile' => [
		'class' => 'yii2woop\profile\module\Module',
		'actionList' => [
			'person',
			'address',
			'car',
			//'avatar',
			'security',
			'qr',
		],
	],
	'welcome' => [
		'class' => 'yii2module\dashboard\web\Module',
	],
	'guide' => [
		'class' => 'yii2module\guide\module\Module',
	],
	'article' => [
		'class' => 'yii2module\article\web\Module',
	],
	'cabinet' => [
		'class' => 'frontend\modules\cabinet\CabinetModule',
	],
];

if(YII_ENV_DEV) {
	$config['rest-v4'] = [
		'class' => 'yii2module\rest_client\Module',
		'baseUrl' => env('url.api') . 'v4',
		'as access' => Behavior::access(PermissionEnum::REST_CLIENT_ALL),
	];
}

return $config;

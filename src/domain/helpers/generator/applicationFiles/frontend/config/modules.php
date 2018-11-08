<?php

use yii2lab\rest\web\helpers\RestModuleHelper;

$config = [
	'error' => 'yii2module\error\module\Module',
	'user' => 'yii2module\account\module\Module',
	'profile' => 'yii2module\profile\module\v1\Module',
	'welcome' => 'yii2module\dashboard\web\Module',
	'guide' => 'yii2module\guide\module\Module',
	'article' => 'yii2module\article\web\Module',
];

if(YII_ENV_DEV) {
	$config = RestModuleHelper::appendConfig($config);
}

return $config;

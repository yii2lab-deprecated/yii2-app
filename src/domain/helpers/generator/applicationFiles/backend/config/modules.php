<?php

use yii2lab\applicationTemplate\common\enums\ApplicationPermissionEnum;
use yii2lab\helpers\Behavior;

return [
	'vendor' => 'yii2module\vendor\admin\Module',
	'encrypt' => 'yii2module\encrypt\admin\Module',
	'error' =>  'yii2module\error\module\Module',
    'offline' => 'yii2module\offline\admin\Module',
    'app' => 'yii2lab\app\admin\Module',
    'init' => 'yii2lab\init\admin\Module',
    'dashboard' => 'yii2module\dashboard\admin\Module',
    'article' => 'yii2module\article\admin\Module',
    'notify' =>'yii2lab\notify\admin\Module',
    'cleaner' =>  'yii2module\cleaner\admin\Module',
	'user' => 'yii2module\account\module\BackendModule',
	'rbac' => \yii2lab\rbac\admin\helpers\ModuleHelper::config(),
	'logreader' => [
		'class' => 'alyanik\viewlog\Module',
		'as access' => Behavior::access(ApplicationPermissionEnum::LOGREADER_MANAGE),
	],
    'gridview' => 'kartik\grid\Module',
];

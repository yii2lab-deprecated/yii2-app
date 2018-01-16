<?php

use yii2lab\helpers\UrlHelper;
use yii2lab\misc\enums\YiiEnvEnum;

$domain = UrlHelper::currentDomain();
$baseDomain = UrlHelper::baseDomain($domain);

return [
	'project' => 'guest',
	'mode' => [
		'debug' => true,
		'env' => YiiEnvEnum::DEV,
	],
	'url' => [
		'frontend' => 'http://' . $baseDomain . SL,
		'backend' => 'http://admin.' . $baseDomain. SL,
		'api' => 'http://api.' . $baseDomain . SL,
	],
	'cookieValidationKey' => [
		'frontend' => '8TeBn54VTvHGpl3pRE9CJbQD4Iiq38CF',
		'backend' => 'vrXQQAK2iJmeiVN0a5yg1SdMbnFRNku5',
	],
	'domain' => [
		'driver' => [
			'primary' => 'disc',
			'slave' => 'disc',
		],
	],
];
<?php

use yii\helpers\ArrayHelper;
use yii2lab\app\helpers\Config;
use yii2lab\app\helpers\Env;

function config($name, $default = null) {
	$value = Config::get($name);
	if($value === null) {
		$value = $default;
	}
	return $value;
}

function env($name, $default = null) {
	$value = Env::get($name);
	if($value === null) {
		$value = $default;
	}
	return $value;
}

function param($name, $default = null) {
	$params = \Yii::$app->params;
	$value = ArrayHelper::getValue($params, $name);
	if($value === null) {
		$value = $default;
	}
	return $value;
}

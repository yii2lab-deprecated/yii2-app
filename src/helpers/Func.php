<?php

use yii\helpers\ArrayHelper;
use yii2lab\app\helpers\Config;
use yii2lab\app\helpers\Env;

function config($name) {
	return Config::get($name);
}

function env($name) {
	return Env::get($name);
}

function param($name) {
	$params = \Yii::$app->params;
	$value = ArrayHelper::getValue($params, $name);
	return $value;
}

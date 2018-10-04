<?php

use yii\helpers\ArrayHelper;
use yii2lab\app\domain\helpers\Config;
use yii2lab\app\domain\helpers\Env;

function config($name, $default = null) {
	$value = Config::get($name);
	if($value === null) {
		$value = $default;
	}
	return $value;
}

/**
 * @param      $name
 * @param null $default
 *
 * @return array|mixed|null|object
 * @deprecated use EnvService
 */
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

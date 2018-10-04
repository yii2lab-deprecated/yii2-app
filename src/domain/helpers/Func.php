<?php

use yii\helpers\ArrayHelper;
use yii2lab\app\domain\helpers\Config;
use yii2lab\app\domain\helpers\Env;
use yii2lab\helpers\Debug;

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

function prr($val, $exit = false, $forceToArray = false) {
	Debug::prr($val, $exit, $forceToArray);
}

function mb_ucfirst($word) {
	return mb_strtoupper(mb_substr($word, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr(mb_convert_case($word, MB_CASE_LOWER, 'UTF-8'), 1, mb_strlen($word), 'UTF-8');
}

function sortByLen($a, $b) {
	if(strlen($a) < strlen($b)) {
		return 1;
	} elseif(strlen($a) == strlen($b)) {
		return 0;
	} else {
		return -1;
	}
}

/**
 * @param       $category
 * @param       $message
 * @param array $params
 * @param null  $language
 *
 * @return string
 * @deprecated
 */
function t($category, $message, $params = [], $language = null) {
	return \Yii::t($category, $message, $params, $language);
}

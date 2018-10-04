<?php

use yii2lab\app\App;

$name = 'frontend';
$path = '../..';

@include_once(__DIR__ . '/' . $path . '/vendor/yii2lab/yii2-app/src/App.php');

if(!class_exists('yii2lab\app\App')) {
	die('Run composer install');
}

App::run($name);

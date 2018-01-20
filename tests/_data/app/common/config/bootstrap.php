<?php

defined('IS_SALEM_PORTAL_API') or define('IS_SALEM_PORTAL_API', false);
defined('IS_SALEM_PORTAL') or define('IS_SALEM_PORTAL', false);

Yii::$container->set('yii\web\ErrorHandler', [
	'class' => 'yii2module\error\web\ErrorHandler',
]);

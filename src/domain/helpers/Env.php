<?php

namespace yii2lab\app\domain\helpers;

use yii\helpers\ArrayHelper;
use yii2lab\misc\helpers\FilterHelper;

class Env
{

	private static $config = [];
	private static $filters = [
		'yii2lab\app\domain\filters\env\YiiEnv',
		'yii2lab\app\domain\filters\env\AllowedIp',
		'yii2lab\app\domain\filters\env\Db',
	];

	static function get($key = null) {
		if (empty(self::$config)) {
			self::$config = self::load();
		}
		if (empty($key)) {
			return self::$config;
		}
		return ArrayHelper::getValue(self::$config, $key);
	}
	
	private static function load()
	{
		$config = @include(COMMON_DIR . DS . 'config' . DS . 'env.php');
		if(empty($config)) {
			$config = include(VENDOR_DIR . DS . 'yii2lab' . DS .  'yii2-app' . DS .  'src' . DS . 'domain' . DS . 'config' . DS . 'env.php');
		}
		$config = FilterHelper::runAll(self::$filters, $config);
		return $config;
	}

}

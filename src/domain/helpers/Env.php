<?php

namespace yii2lab\app\domain\helpers;

use yii\helpers\ArrayHelper;

class Env
{

	private static $config = [];
	
	static function get($key = null) {
		if (empty(self::$config)) {
			return null;
		}
		if (empty($key)) {
			return self::$config;
		}
		return ArrayHelper::getValue(self::$config, $key);
	}
	
	public static function init($definition) {
		self::$config = self::load($definition);
	}
	
	public static function load($definition = []) {
		return EnvLoader::run($definition);
	}
	
}

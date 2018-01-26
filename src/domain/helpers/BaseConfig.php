<?php

namespace yii2lab\app\domain\helpers;

use yii\helpers\ArrayHelper;

class BaseConfig {
	
	protected static $config = [];
	
	static function get($key = null, $default = null) {
		if(empty(static::$config)) {
			return null;
		}
		if(empty($key)) {
			return static::$config;
		}
		$value = ArrayHelper::getValue(static::$config, $key);
		if(func_num_args() > 1 && $value === null) {
			return $default;
		}
		return ArrayHelper::getValue(static::$config, $key);
	}
	
}

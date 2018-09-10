<?php

namespace yii2lab\app\domain\helpers;

use yii2lab\extension\registry\base\BaseRegistry;
use yii2lab\helpers\ClassHelper;

class Config extends BaseRegistry {
	
	protected static $data = [];
	
	public static function init($definition) {
	    $callback = function () use ($definition) {
            return self::load($definition);
        };
        static::$data = CacheHelper::forge(APP . '_app_config', $callback);
	}
	
	public static function load($definition = []) {
		$definition['class'] = Handler::class;
		/** @var Handler $loader */
		$loader = ClassHelper::createObject($definition);
		return $loader->run();
	}
	
}

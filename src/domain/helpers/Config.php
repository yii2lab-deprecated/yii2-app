<?php

namespace yii2lab\app\domain\helpers;

use yii2lab\extension\registry\base\BaseRegistry;
use yii2lab\extension\common\helpers\ClassHelper;

class Config extends BaseRegistry {

	public static function init($definition) {
	    $callback = function () use ($definition) {
            return self::loadData($definition);
        };
        $config = CacheHelper::forge(APP . '_app_config', $callback);
        self::load($config);
	}
	
	public static function loadData($definition = []) {
		$definition['class'] = Handler::class;
		/** @var Handler $loader */
		$loader = ClassHelper::createObject($definition);
		return $loader->run();
	}
	
}

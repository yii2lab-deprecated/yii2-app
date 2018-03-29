<?php

namespace yii2lab\app\domain\helpers;

use yii2lab\extension\registry\base\BaseRegistry;
use yii2lab\helpers\ClassHelper;

class Config extends BaseRegistry {
	
	protected static $data = [];
	
	public static function init($definition) {
		static::$data = self::load($definition);
	}
	
	public static function load($definition = []) {
		$definition['class'] = Handler::class;
		/** @var Handler $loader */
		$loader = ClassHelper::createObject($definition);
		return $loader->run();
	}
	
}

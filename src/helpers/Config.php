<?php

namespace yii2lab\app\helpers;

use yii\helpers\ArrayHelper;
use yii2lab\migration\helpers\MigrationHelper;

class Config {
	
	private static $config = [];
	private static $map = [
		[
			'name' => 'modules',
			'merge' => true,
			'withLocal' => true,
		],
		[
			'name' => 'params',
			'merge' => false,
			'withLocal' => true,
		],
	];
	
	static function get($key = null) {
		if(empty(self::$config)) {
			self::load();
		}
		if(empty($key)) {
			return self::$config;
		}
		return ArrayHelper::getValue(self::$config, $key);
	}
	
	private static function load() {
		$config = ArrayHelper::merge(
			self::requireConfig(COMMON),
			self::requireConfig(APP)
		);
		$config = self::loadMap($config);
		$config = Mutation::mutation($config);
		self::$config = $config;
	}
	
	private static function loadMap($config) {
		foreach(self::$map as $mapItem) {
			$name = $mapItem['name'];
			$value = self::loadPart($name, !empty($mapItem['withLocal']));
			if(!empty($mapItem['merge'])) {
				$config = ArrayHelper::merge($config, $value);
			} else {
				$config[$name] = $value;
			}
		}
		return $config;
	}

	private static function loadPart($name, $withLocal) {
		$params = ArrayHelper::merge(
			self::requireConfigWithLocal(COMMON, $name, $withLocal),
			self::requireConfigWithLocal(APP, $name, $withLocal)
		);
		return $params;
	}
	
	private static function requireConfigItem($from, $name) {
		$config = @include(ROOT_DIR . DS . $from . DS  . 'config' . DS . $name.'.php');
		return !empty($config) ? $config : [];
	}
	
	private static function requireConfig($from) {
		$config = self::requireConfigWithLocal($from, 'main');
		if(YII_ENV == 'test') {
			$config = ArrayHelper::merge(
				$config,
				self::requireConfigWithLocal($from, 'test')
			);
		}
		return $config;
	}
	
	private static function requireConfigWithLocal($from, $name, $withLocal = true) {
		$config = self::requireConfigItem($from, $name);
		if($withLocal) {
			$configLocal = self::requireConfigItem($from, $name . '-local');
			$config = ArrayHelper::merge($config, $configLocal);
		}
		return $config;
	}
}

<?php

namespace yii2lab\app\helpers;

use yii\helpers\ArrayHelper;
use yii2lab\migration\helpers\MigrationHelper;

class Config {
	
	private static $config = [];
	
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
		$config = self::loadModule($config);
		$config['params'] = self::loadParams();
		$config = self::mutation($config);
		self::$config = $config;
	}

	private static function loadModule($config) {
		$modules = ArrayHelper::merge(
			self::requireConfigWithLocal(COMMON, 'modules'),
			self::requireConfigWithLocal(APP, 'modules')
		);
		$config = ArrayHelper::merge($config, $modules);
		return $config;
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
	
	private static function requireConfigWithLocal($from, $name) {
		$config = ArrayHelper::merge(
			self::requireConfigItem($from, $name),
			self::requireConfigItem($from, $name . '-local')
		);
		return $config;
	}
	
	private static function loadParams() {
		$params = ArrayHelper::merge(
			self::requireConfigWithLocal(COMMON, 'params'),
			self::requireConfigWithLocal(APP, 'params')
		);
		return $params;
	}
	
	private static function mutation($config) {
		if(in_array(APP, $config['params']['offline']['exclude'])) {
			unset($config['catchAll']);
		}
		$config['id'] = self::assignAppId($config);
		$config['basePath'] = ROOT_DIR . DS . APP;
		$config['controllerNamespace'] = APP . '\controllers';
		$config['vendorPath'] = VENDOR_DIR . DS;
		if(APP == COMMON && YII_ENV_TEST) {
			$config['components']['request']['cookieValidationKey'] = 'testValidationKey'; // костыль, чтоб не выдавало ошибку при тестах в common
		}
		
		if(APP == CONSOLE) {
			$config['params'] = self::assignMigrationPath($config['params']);
		}
		
		return $config;
	}
	
	private static function assignMigrationPath($params) {
		require_once(VENDOR_DIR . '/yii2lab/yii2-migration/src/helpers/MigrationHelper.php');
		$params['dee.migration.path'] = ArrayHelper::merge(
			$params['dee.migration.path'], 
			MigrationHelper::getAliases()
		);
		return $params;
	}
	
	private static function assignAppId($config) {
		if(!empty($config['id'])) {
			return $config['id'];
		}
		$id = 'app-' . APP;
		if(YII_ENV == 'test') {
			$id .= '-test';
		}
		return $id;
	}
	
}

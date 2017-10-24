<?php

namespace yii2lab\app\helpers;

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

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
	private static $mutation = [
		[
			'yii2lab\app\helpers\Mutation',
			'isOffline',
		],
		[
			'yii2lab\app\helpers\Mutation',
			'setControllerNamespace',
		],
		[
			'yii2lab\app\helpers\Mutation',
			'fixValidationKeyInTest',
		],
		[
			'yii2lab\app\helpers\Mutation',
			'setAppId',
		],
		[
			'yii2lab\app\helpers\Mutation',
			'setPath',
		],
		[
			'yii2lab\migration\helpers\MigrationHelper',
			'setPath',
		],
		
	];
	
	static function get($key = null) {
		if(empty(self::$config)) {
			self::$config = self::load();
		}
		if(empty($key)) {
			return self::$config;
		}
		return ArrayHelper::getValue(self::$config, $key);
	}

	static function genAccess($roles, $only = null, $allow = true) {
		$roles = is_array($roles) ? $roles : [$roles];
		$access = [
			'class' => AccessControl::className(),
			'rules' => [
				[
					'allow' => $allow,
					'roles' => $roles,
				],
			],
		];
		if(!empty($only)) {
			$access['only'] = ArrayHelper::toArray($only);
		}
		return $access;
	}

	private static function load() {
		$config = ArrayHelper::merge(
			self::requireConfig(COMMON),
			self::requireConfig(APP)
		);
		$config = self::loadMap($config);
		$config = self::loadMutation($config);
		return $config;
	}
	
	private static function getMutationSettings() {
		$mutationFromEnv = Env::get('config.mutation');
		if(empty($mutationFromEnv)) {
			return self::$mutation;
		}
		$mutation = ArrayHelper::merge(self::$mutation, $mutationFromEnv);
		return $mutation;
	}
	
	private static function getMapSettings() {
		$mapFromEnv = Env::get('config.map');
		if(empty($mapFromEnv)) {
			return self::$map;
		}
		$map = ArrayHelper::merge(self::$map, $mapFromEnv);
		return $map;
	}
	
	private static function loadMutation($config) {
		$mutation = self::getMutationSettings();
		foreach($mutation as $item) {
			if(class_exists($item[0])) {
				$config = call_user_func($item, $config);
			}
		}
		return $config;
	}
	
	private static function loadMap($config) {
		$map = self::getMapSettings();
		foreach($map as $mapItem) {
			$name = $mapItem['name'];
			$onlyApps = ArrayHelper::getValue($mapItem, 'onlyApps');
			$value = self::loadPart($name, !empty($mapItem['withLocal']), $onlyApps);
			if(!empty($mapItem['merge'])) {
				$config = ArrayHelper::merge($config, $value);
			} else {
				$config[$name] = $value;
			}
		}
		return $config;
	}

	private static function loadPart($name, $withLocal, $onlyApps = null) {
		$commonConfig = [];
		$appConfig = [];
		if(empty($onlyApps) || in_array(COMMON, $onlyApps)) {
			$commonConfig = self::requireConfigWithLocal(COMMON, $name, $withLocal);
		}
		if(empty($onlyApps) || in_array(APP, $onlyApps)) {
			$appConfig = self::requireConfigWithLocal(APP, $name, $withLocal);
		}
		$params = ArrayHelper::merge($commonConfig, $appConfig);
		return $params;
	}
	
	private static function requireConfigItem($from, $name) {
		$config = @include(ROOT_DIR . DS . $from . DS  . 'config' . DS . $name.'.php');
		return !empty($config) ? $config : [];
	}
	
	private static function requireConfig($from) {
		$config = self::requireConfigWithLocal($from, 'main');
		if(YII_ENV == 'test') {
			$configTest = self::requireConfigWithLocal($from, 'test');
			$config = ArrayHelper::merge($config, $configTest);
		}
		return $config;
	}
	
	private static function requireConfigWithLocal($from, $name, $withLocal = true) {
		$config = self::requireConfigItem($from, $name);
		if($withLocal) {
			$configLocal = self::requireConfigItem($from, $name . '-local');
			if(is_array($configLocal)) {
				$config = ArrayHelper::merge($config, $configLocal);
			}
		}
		return $config;
	}
}

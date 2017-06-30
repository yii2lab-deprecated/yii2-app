<?php

namespace yii2lab\app\helpers;

use yii\helpers\ArrayHelper;
use yii2lab\migration\helpers\MigrationHelper;

class Mutation
{

	public static function fixValidationKeyInTest($config) {
		if(APP == COMMON && YII_ENV_TEST) {
			$config['components']['request']['cookieValidationKey'] = 'testValidationKey'; // костыль, чтоб не выдавало ошибку при тестах в common
		}
		return $config;
	}
	
	public static function setControllerNamespace($config) {
		$config['controllerNamespace'] = APP . '\controllers';
		return $config;
	}
	
	public static function isOffline($config) {
		if(in_array(APP, $config['params']['offline']['exclude'])) {
			unset($config['catchAll']);
		}
		return $config;
	}
	
	public static function setBasePath($config) {
		$config['basePath'] = ROOT_DIR . DS . APP;
		$config['vendorPath'] = VENDOR_DIR . DS;
		return $config;
	}
	
	public static function setMigrationPath($config) {
		if(APP != CONSOLE) {
			return $config;
		}
		require_once(VENDOR_DIR . '/yii2lab/yii2-migration/src/helpers/MigrationHelper.php');
		$config['params']['dee.migration.path'] = ArrayHelper::merge(
			$config['params']['dee.migration.path'], 
			MigrationHelper::getAliases()
		);
		
		return $config;
	}
	
	public static function setAppId($config) {
		if(!empty($config['id'])) {
			return $config;
		}
		$id = 'app-' . APP;
		if(YII_ENV == 'test') {
			$id .= '-test';
		}
		$config['id'] = $id;
		return $config;
	}

}

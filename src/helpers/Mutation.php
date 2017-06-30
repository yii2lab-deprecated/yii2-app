<?php

namespace yii2lab\app\helpers;

class Mutation
{

	public static function mutation($config) {
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

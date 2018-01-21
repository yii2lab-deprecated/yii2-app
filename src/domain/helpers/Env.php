<?php

namespace yii2lab\app\domain\helpers;

use yii\helpers\ArrayHelper;

class Env
{

	private static $config = [];
	//private static $defaultDefinition = ;
	
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
		if(is_string($definition)) {
			$definition = [
				'commands' => [],
				'filters' => [
					[
						'class' => 'yii2lab\app\domain\filters\env\LoadConfig',
						'paths' => [
							$definition,
							'vendor/yii2lab/yii2-app/src/domain/config',
						],
					],
					'yii2lab\app\domain\filters\env\YiiEnv',
					'yii2lab\app\domain\filters\env\NormalizeDbConfig',
				],
			];
		}
		return EnvLoader::run($definition);
	}
	
}

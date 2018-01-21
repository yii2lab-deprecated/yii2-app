<?php

namespace yii2lab\app\domain\helpers;

use yii\helpers\ArrayHelper;

class Env
{

	private static $config = [];
	
	static function get($key = null) {
		if (empty(self::$config)) {
			return null;
		}
		if (empty($key)) {
			return self::$config;
		}
		return ArrayHelper::getValue(self::$config, $key);
	}
	
	public static function init($projectDir) {
		$definition = self::getDefinition($projectDir);
		self::$config = self::load($definition);
	}
	
	public static function load($definition) {
		return EnvLoader::run($definition);
	}
	
	public static function getDefinition($projectDir) {
		$projectDirs = ArrayHelper::toArray($projectDir);
		$projectDirs[] = 'vendor/yii2lab/yii2-app/src/application';
		$paths = [];
		foreach($projectDirs as $dir) {
			$paths[] = self::initItem($dir);
		}
		$definition = [
			'commands' => [],
			'filters' => [
				[
					'class' => 'yii2lab\app\domain\filters\env\LoadConfig',
					'paths' => $paths,
				],
				'yii2lab\app\domain\filters\env\YiiEnv',
				'yii2lab\app\domain\filters\env\NormalizeDbConfig',
			],
		];
		return $definition;
	}
	
	private static function initItem($projectDir) {
		$definitionItem = trim($projectDir, '/') . '/common/config';
		$definitionItem = trim($definitionItem, '/');
		return $definitionItem;
	}
	
}

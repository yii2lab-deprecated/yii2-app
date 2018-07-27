<?php

namespace yii2lab\app\domain\helpers;

use yii\helpers\ArrayHelper;
use yii2lab\extension\registry\base\BaseRegistry;
use yii2lab\helpers\yii\FileHelper;

class Env extends BaseRegistry {
	
	protected static $data = [];
	
	public static function init($projectDir) {
		$definition = self::getDefinition($projectDir);
		static::$data = self::load($definition);
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
				'yii2lab\db\domain\filters\env\NormalizeDbConfig',
			],
		];
		return $definition;
	}
	
	private static function initItem($projectDir) {
		$projectDir = FileHelper::trimRootPath($projectDir);
		$definitionItem = trim($projectDir, SL) . '/common/config';
		$definitionItem = trim($definitionItem, SL);
		return $definitionItem;
	}
	
}

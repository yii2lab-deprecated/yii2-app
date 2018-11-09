<?php

namespace yii2lab\app\domain\helpers\generator;

use yii\helpers\ArrayHelper;
use yii2lab\extension\console\helpers\CopyFiles;
use yii2lab\extension\console\helpers\input\Select;
use yii2lab\extension\console\helpers\Output;

class Generator {
	
	const SOURCE_DIR = 'vendor/yii2lab/yii2-app/src/domain/helpers/generator/applicationFiles';
	
	private static $forCopy = [
		'api' => [
			'api',
			'environments/files/api',
			'common',
			'environments/files/common',
		],
		'backend' => [
			'backend',
			'environments/files/backend',
			'common',
			'environments/files/common',
		],
		'frontend' => [
			'frontend',
			'environments/files/frontend',
			'common',
			'environments/files/common',
		],
		'console' => [
			'cmd',
			'console',
			'environments/files/console',
		],
		'phpStorm' => [
			'.idea',
		],
	];
	
	static function generateApplication($sourceDir) {
		$selected = Select::display('Select applications for generate', array_keys(self::$forCopy), true);
		$dirs = self::dirsFromSelect($selected);
		self::copyFiles($dirs, $sourceDir);
	}
	
	private static function dirsFromSelect($selected) {
		$dirs = [];
		foreach($selected as $name) {
			$itemDirs = self::$forCopy[$name];
			$dirs = ArrayHelper::merge($dirs, $itemDirs);
		}
		$dirs = ArrayHelper::merge($dirs, [
			'environments/config',
		]);
		return $dirs;
	}
	
	private static function copyFiles($dirs, $sourceDir) {
		$copyFiles = new CopyFiles;
		$copyFiles->copyAllFiles($sourceDir . DS . 'root');
		foreach($dirs as $dir) {
			Output::title($dir);
			Output::line();
			$mainFiles = $sourceDir . DS . $dir;
			$copyFiles->copyAllFiles($mainFiles, $dir);
		}
	}
	
}

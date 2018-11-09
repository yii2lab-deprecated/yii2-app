<?php

namespace yii2lab\app\domain\helpers\generator;

use yii\helpers\ArrayHelper;
use yii2lab\extension\console\helpers\CopyFiles;
use yii2lab\extension\console\helpers\input\Select;
use yii2lab\extension\console\helpers\Output;

class Generator {
	
	static function generateApplication($sourceDir, $forCopy) {
		$selected = Select::display('Select applications for generate', array_keys($forCopy), true);
		$dirs = self::dirsFromSelect($selected, $forCopy);
		self::copyFiles($dirs, $sourceDir);
	}
	
	private static function dirsFromSelect($selected, $forCopy) {
		$dirs = [];
		foreach($selected as $name) {
			$itemDirs = $forCopy[$name];
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

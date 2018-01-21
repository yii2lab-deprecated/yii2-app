<?php

namespace yii2lab\app\domain\filters\env;

use yii\base\BaseObject;
use yii\helpers\ArrayHelper;
use yii2lab\designPattern\filter\interfaces\FilterInterface;

class LoadConfig extends BaseObject implements FilterInterface {

	const FILE_ENV = 'env';
	const FILE_ENV_LOCAL = 'env-local';
	
	public $paths = [];
	
	public function run($config) {
		$mainConfig = $this->loadByFileName(self::FILE_ENV);
		$localConfig = $this->loadByFileName(self::FILE_ENV_LOCAL);
		$config = ArrayHelper::merge($mainConfig, $localConfig);
		return $config;
	}
	
	private function loadByFileName($fileName) {
		foreach($this->paths as $path) {
			$config = $this->load($path, $fileName);
			if(!empty($config)) {
				return $config;
			}
		}
		return [];
	}
	
	private function load($path, $fileName) {
		$config = @include(ROOT_DIR . DS . $path . DS . $fileName . '.php');
		return !empty($config) ? $config : [];
	}
	
}

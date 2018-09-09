<?php

namespace yii2lab\app\domain\filters\config;

use yii2lab\extension\scenario\base\BaseScenario;
use yii2mod\helpers\ArrayHelper;

class LoadConfig extends BaseScenario {
	
	public $withLocal = true;
	public $name;
	public $app = APP;
	public $dir = EMP;
	public $assignTo;
	
	public function run() {
		$config = $this->getData();
		$loadedConfig = $this->requireConfigWithLocal($this->app, $this->name, $this->withLocal);
		$rootConfig = self::extractRootConfig($loadedConfig);
		$config = $this->merge($config, $loadedConfig, $this->assignTo);
		if(!empty($rootConfig)) {
			$config = ArrayHelper::merge($config, $rootConfig);
		}
		$this->setData($config);
	}
	
	protected function extractRootConfig(&$loadedConfig) {
		$rootConfig = [];
		if(!empty($loadedConfig['@config'])) {
			$rootConfig = ArrayHelper::getValue($loadedConfig, '@config');
			unset($loadedConfig['@config']);
		}
		return $rootConfig;
	}
	
	protected function merge($config, $loadedConfig, $name = null) {
		if(!empty($name)) {
			$configItem = ArrayHelper::getValue($config, $name, []);
			$configItem = ArrayHelper::merge($configItem, $loadedConfig);
			ArrayHelper::setValue($config, $name, $configItem);
		} else {
			$config = ArrayHelper::merge($config, $loadedConfig);
		}
		return $config;
	}
	
	protected function normalizeItems($items) {
		if(!method_exists($this, 'normalizeItem')) {
			return $items;
		}
		$newData = [];
		foreach($items as $name => $data) {
			$data = $this->normalizeItem($name, $data);
			if($data) {
				$newData[$name] = $data;
			}
		}
		return $newData;
	}
	
	protected function requireConfigWithLocal($from, $name, $withLocal = true) {
		$config = $this->requireConfigItem($from, $name);
		if($withLocal) {
			$configLocal = $this->requireConfigItem($from, $name . '-local');
			if(is_array($configLocal)) {
				$config = ArrayHelper::merge($config, $configLocal);
			}
		}
		return $config;
	}
	
	protected function requireConfigItem($from, $name) {
		$config = @include(ROOT_DIR . DS . $from . DS  . 'config' . DS . $name.'.php');
		if(empty($config) || !is_array($config)) {
			return [];
		}
		$config = $this->normalizeItems($config);
		return $config;
	}
	
}

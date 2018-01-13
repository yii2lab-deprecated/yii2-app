<?php

namespace yii2lab\app\domain\filters\config;

use yii\base\BaseObject;
use yii2lab\designPattern\filter\interfaces\FilterInterface;
use yii2mod\helpers\ArrayHelper;

class LoadConfig extends BaseObject implements FilterInterface {
	
	public $withLocal = true;
	public $name;
	public $app = APP;
	public $assignTo;
	
	public function run($config) {
		$loadedConfig = self::requireConfigWithLocal($this->app, $this->name, $this->withLocal);
		if(!empty($this->assignTo)) {
			$baseConfig = ArrayHelper::getValue($config, $this->assignTo, []);
			$mergedConfig = ArrayHelper::merge($baseConfig, $loadedConfig);
			ArrayHelper::setValue($config, $this->assignTo, $mergedConfig);
			
		} else {
			$config = ArrayHelper::merge($config, $loadedConfig);
		}
		return $config;
	}
	
	protected static function requireConfigWithLocal($from, $name, $withLocal = true) {
		$config = self::requireConfigItem($from, $name);
		if($withLocal) {
			$configLocal = self::requireConfigItem($from, $name . '-local');
			if(is_array($configLocal)) {
				$config = ArrayHelper::merge($config, $configLocal);
			}
		}
		return $config;
	}
	
	protected static function requireConfigItem($from, $name) {
		$config = @include(ROOT_DIR . DS . $from . DS  . 'config' . DS . $name.'.php');
		return !empty($config) ? $config : [];
	}
	
}

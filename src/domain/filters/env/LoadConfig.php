<?php

namespace yii2lab\app\domain\filters\env;

use yii\base\BaseObject;
use yii\helpers\ArrayHelper;
use yii2lab\designPattern\filter\interfaces\FilterInterface;

class LoadConfig extends BaseObject implements FilterInterface {

	public $list = [
		['common/config/env.php', 'common/config/env-local.php'],
		'vendor/yii2lab/yii2-app/src/domain/config/env.php',
	];
	
	public function run($config) {
		foreach($this->list as $files) {
			$config = $this->load($files);
			if(!empty($config)) {
				return $config;
			}
		}
		return [];
	}
	
	private function load($fileNames) {
		$config = [];
		$fileNames = ArrayHelper::toArray($fileNames);
		foreach($fileNames as $arg) {
			$itemConfig = @include(ROOT_DIR . DS . $arg);
			if(!empty($itemConfig)) {
				$config = ArrayHelper::merge($config, $itemConfig);
			}
		}
		return $config;
	}
	
}

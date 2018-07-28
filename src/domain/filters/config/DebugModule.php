<?php

namespace yii2lab\app\domain\filters\config;

use yii2lab\designPattern\scenario\base\BaseScenario;

class DebugModule extends BaseScenario {
	
	public $isEnable = YII_ENV_DEV && YII_DEBUG && APP != API;
	
	public function run() {
		$config = $this->getData();
		$isEnabledDebug = $this->isEnable && isset($config['modules']['debug']);
		if($isEnabledDebug) {
			$config['bootstrap'][] = 'debug';
		} else {
			unset($config['modules']['debug']);
		}
		$this->setData($config);
	}
	
}

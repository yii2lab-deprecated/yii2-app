<?php

namespace yii2lab\app\domain\filters\config;

use yii2lab\extension\scenario\base\BaseScenario;

class DebugModule extends BaseScenario {
	
	public $isEnableBootstrap = YII_ENV_DEV && YII_DEBUG && APP != API;
	
	public function run() {
		$config = $this->getData();
		if(!isset($config['modules']['debug'])) {
			return;
		}
		if($this->isEnableBootstrap) {
			$config['bootstrap'][] = 'debug';
		} else {
			unset($config['modules']['debug']);
		}
		$this->setData($config);
	}
	
}

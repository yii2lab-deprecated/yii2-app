<?php

namespace yii2lab\app\domain\filters\config;

use yii2lab\extension\scenario\base\BaseScenario;

class SetAppId extends BaseScenario {
	
	public function run() {
		$config = $this->getData();
		if(empty($config['id'])) {
			$config['id'] = $this->generateId(APP);
		}
		$this->setData($config);
	}
	
	private function generateId($app) {
		$id = 'app-' . $app;
		/*if(YII_ENV == 'test') {
			$id .= '-test';
		}*/
		return $id;
	}
}

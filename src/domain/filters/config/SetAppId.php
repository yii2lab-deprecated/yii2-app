<?php

namespace yii2lab\app\domain\filters\config;

use yii\base\BaseObject;
use yii2lab\designPattern\filter\interfaces\FilterInterface;

class SetAppId extends BaseObject implements FilterInterface {

	public function run($config) {
		if(empty($config['id'])) {
			$config['id'] = $this->generateId(APP);
		}
		return $config;
	}
	
	private function generateId($app) {
		$id = 'app-' . $app;
		/*if(YII_ENV == 'test') {
			$id .= '-test';
		}*/
		return $id;
	}
}

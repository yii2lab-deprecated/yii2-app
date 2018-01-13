<?php

namespace yii2lab\app\domain\filters\config;

use yii\base\BaseObject;
use yii2lab\designPattern\filter\interfaces\FilterInterface;

class SetControllerNamespace extends BaseObject implements FilterInterface {

	public function run($config) {
		if(empty($config['controllerNamespace'])) {
			$config['controllerNamespace'] = APP . '\controllers';
		}
		return $config;
	}
	
}

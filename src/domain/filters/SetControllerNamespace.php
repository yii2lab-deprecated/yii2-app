<?php

namespace yii2lab\app\domain\filters;

use yii\base\BaseObject;
use yii2lab\misc\interfaces\FilterInterface;

class SetControllerNamespace extends BaseObject implements FilterInterface {

	public function run($config) {
		$config['controllerNamespace'] = APP . '\controllers';
		return $config;
	}
	
}

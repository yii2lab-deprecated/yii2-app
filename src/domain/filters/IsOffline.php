<?php

namespace yii2lab\app\domain\filters;

use yii\base\BaseObject;
use yii2lab\misc\interfaces\FilterInterface;

class IsOffline extends BaseObject implements FilterInterface {

	public function run($config) {
		if(in_array(APP, $config['params']['offline']['exclude'])) {
			unset($config['catchAll']);
		}
		return $config;
	}
	
}

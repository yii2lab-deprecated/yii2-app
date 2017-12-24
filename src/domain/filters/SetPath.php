<?php

namespace yii2lab\app\domain\filters;

use yii\base\BaseObject;
use yii2lab\misc\interfaces\FilterInterface;

class SetPath extends BaseObject implements FilterInterface {

	public function run($config) {
		$config['basePath'] = ROOT_DIR . DS . APP;
		$config['vendorPath'] = VENDOR_DIR . DS;
		return $config;
	}
	
}

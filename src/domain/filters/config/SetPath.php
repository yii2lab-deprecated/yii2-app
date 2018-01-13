<?php

namespace yii2lab\app\domain\filters\config;

use yii\base\BaseObject;
use yii2lab\designPattern\filter\interfaces\FilterInterface;

class SetPath extends BaseObject implements FilterInterface {

	public function run($config) {
		if(empty($config['basePath'])) {
			$config['basePath'] = ROOT_DIR . DS . APP;
		}
		if(empty($config['vendorPath'])) {
			$config['vendorPath'] = VENDOR_DIR . DS;
		}
		return $config;
	}
	
}

<?php

namespace yii2lab\app\domain\filters\config;

use yii2lab\extension\scenario\base\BaseScenario;

class SetPath extends BaseScenario {
	
	public function run() {
		$config = $this->getData();
		if(empty($config['basePath'])) {
			$config['basePath'] = ROOT_DIR . DS . APP;
		}
		if(empty($config['vendorPath'])) {
			$config['vendorPath'] = VENDOR_DIR . DS;
		}
		$this->setData($config);
	}
	
}

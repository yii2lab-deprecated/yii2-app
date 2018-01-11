<?php

namespace yii2lab\app\domain\filters\env;

use yii\base\BaseObject;
use yii2lab\misc\interfaces\FilterInterface;

class LoadConfig extends BaseObject implements FilterInterface {

	const FILE_NAME = 'env.php';
	const DIR_NAME = 'config';
	
	public function run($config) {
		$config = $this->load(COMMON_DIR);
		if(empty($config)) {
			$config = $this->load(VENDOR_DIR . DS . 'yii2lab' . DS .  'yii2-app' . DS .  'src' . DS . 'domain');
		}
		return $config;
	}
	
	private function load($dir) {
		$fileName = $dir . DS . self::DIR_NAME . DS . self::FILE_NAME;
		$config = @include($fileName);
		return $config;
	}
	
}

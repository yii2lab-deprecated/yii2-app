<?php

namespace yii2lab\app\domain\commands;

use yii\base\BaseObject;
use yii2lab\designPattern\command\interfaces\CommandInterface;

class RunBootstrap extends BaseObject implements CommandInterface {

	public $appName;
	public $env;
	
	public function run() {
		$this->bootstrap();
	}
	
	private function bootstrap()
	{
		@include(COMMON_DIR . DS . 'config' . DS . 'bootstrap.php');
		@include(ROOT_DIR . DS . $this->appName . DS . 'config' . DS . 'bootstrap.php');
	}
	
}

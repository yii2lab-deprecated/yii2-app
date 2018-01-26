<?php

namespace yii2lab\app\domain\commands;

use yii\base\BaseObject;
use yii2lab\designPattern\command\interfaces\CommandInterface;

class RunBootstrap extends BaseObject implements CommandInterface {

	public $app;
	
	public function run() {
		$file = ROOT_DIR . DS . $this->app . DS . 'config' . DS . 'bootstrap.php';
		@include($file);
	}
	
}

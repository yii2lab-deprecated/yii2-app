<?php

namespace yii2lab\app\domain\commands;

use yii2lab\extension\scenario\base\BaseScenario;

class RunBootstrap extends BaseScenario {

	public $app;
	
	public function run() {
		$file = ROOT_DIR . DS . $this->app . DS . 'config' . DS . 'bootstrap.php';
		@include($file);
	}
	
}

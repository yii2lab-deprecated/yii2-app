<?php

namespace yii2lab\app\domain\helpers;

use yii2lab\designPattern\command\helpers\CommandHelper;
use yii2lab\designPattern\filter\helpers\FilterHelper;

class Handler {
	
	public $filters = [];
	public $commands = [];
	
	public function run($data = []) {
		$data = FilterHelper::runAll($this->filters, $data);
		CommandHelper::runAll($this->commands);
		return $data;
	}
	
}

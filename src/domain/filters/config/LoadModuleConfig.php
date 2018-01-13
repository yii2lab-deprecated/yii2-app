<?php

namespace yii2lab\app\domain\filters\config;

use yii2lab\designPattern\filter\interfaces\FilterInterface;
use yii2lab\helpers\Helper;

class LoadModuleConfig extends LoadConfig implements FilterInterface {
	
	public $assignTo = 'modules';
	
	protected function normalizeItem($name, $data) {
		$data = Helper::normalizeComponentConfig($data);
		$data = Helper::isEnabledComponent($data);
		if(empty($data)) {
			return null;
		}
		return $data;
	}
	
}

<?php

namespace yii2lab\app\domain\filters\config;

use yii2lab\extension\common\helpers\ClassHelper;
use yii2lab\extension\common\helpers\Helper;

class LoadModuleConfig extends LoadConfig {
	
	public $assignTo = 'modules';
	
	protected function normalizeItem($name, $data) {
		$data = ClassHelper::normalizeComponentConfig($data);
		$data = Helper::isEnabledComponent($data);
		if(empty($data)) {
			return null;
		}
		return $data;
	}
	
}

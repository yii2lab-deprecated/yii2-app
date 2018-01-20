<?php

namespace yii2lab\app\domain\helpers;

use yii2lab\helpers\Helper;
use yii2lab\designPattern\command\helpers\CommandHelper;
use yii2lab\designPattern\filter\helpers\FilterHelper;

class EnvLoader
{

	public static function run($definition) {
		$config = FilterHelper::runAll($definition['filters'], []);
		$definition['commands'] = Helper::assignAttributesForList($definition['commands'], [
			'env' => $config,
		]);
		CommandHelper::runAll($definition['commands']);
		return $config;
	}
	
}

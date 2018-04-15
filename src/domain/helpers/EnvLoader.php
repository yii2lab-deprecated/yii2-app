<?php

namespace yii2lab\app\domain\helpers;

use yii2lab\designPattern\scenario\helpers\ScenarioHelper;
use yii2lab\helpers\Helper;

class EnvLoader
{
	
	/**
	 * @param $definition
	 *
	 * @return \yii2lab\domain\values\BaseValue
	 * @throws \yii\base\InvalidConfigException
	 * @throws \yii\web\ServerErrorHttpException
	 */
	public static function run($definition) {
		$filterCollection = ScenarioHelper::forgeCollection($definition['filters']);
		$config = ScenarioHelper::runAll($filterCollection, []);
		$definition['commands'] = Helper::assignAttributesForList($definition['commands'], [
			'env' => $config,
		]);
		$commandCollection = ScenarioHelper::forgeCollection($definition['commands']);
		ScenarioHelper::runAll($commandCollection);
		return $config;
	}
	
}

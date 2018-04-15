<?php

namespace yii2lab\app\domain\helpers;

use yii2lab\designPattern\scenario\helpers\ScenarioHelper;

class Handler {
	
	public $filters = [];
	public $commands = [];
	
	/**
	 * @param array $data
	 *
	 * @return array|\yii2lab\domain\values\BaseValue
	 * @throws \yii\base\InvalidConfigException
	 * @throws \yii\web\ServerErrorHttpException
	 */
	public function run($data = []) {
		$filterCollection = ScenarioHelper::forgeCollection($this->filters);
		$data =  ScenarioHelper::runAll($filterCollection, $data);
		return $data;
	}
	
}

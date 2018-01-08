<?php

namespace yii2lab\app\domain\filters\env;

use yii\base\BaseObject;
use yii2lab\helpers\yii\ArrayHelper;
use yii2lab\misc\enums\YiiEnvEnum;
use yii2lab\misc\interfaces\FilterInterface;

class YiiEnv extends BaseObject implements FilterInterface {

	public function run($config) {
		$config = $this->toOldFormat($config);
		$config['YII_DEBUG'] = defined('YII_DEBUG') ? YII_DEBUG : !empty($config['YII_DEBUG']);
		$config['YII_ENV'] = !empty($config['YII_ENV']) ? $config['YII_ENV'] : YiiEnvEnum::PROD;
		$config['YII_ENV'] = defined('YII_ENV') ? YII_ENV : YiiEnvEnum::value($config['YII_ENV'], YiiEnvEnum::PROD);
		return $config;
	}
	
	private function toOldFormat($config) {
		if(!isset($config['YII_DEBUG'])) {
			$config['YII_DEBUG'] = ArrayHelper::getValue($config, 'mode.debug', false);
		}
		if(!isset($config['YII_ENV'])) {
			$config['YII_ENV'] = ArrayHelper::getValue($config, 'mode.env', false);
		}
		return $config;
	}
}

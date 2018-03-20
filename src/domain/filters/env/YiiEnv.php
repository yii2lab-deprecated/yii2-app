<?php

namespace yii2lab\app\domain\filters\env;

use yii\base\BaseObject;
use yii2lab\helpers\yii\ArrayHelper;
use yii2lab\misc\enums\YiiEnvEnum;
use yii2lab\designPattern\filter\interfaces\FilterInterface;

class YiiEnv extends BaseObject implements FilterInterface {

	public function run($config) {
		$config = $this->toOldFormat($config);
		$config['mode']['debug'] = defined('YII_DEBUG') ? YII_DEBUG : !empty($config['mode']['debug']);
		$config['mode']['env'] = ArrayHelper::getValue($config, 'mode.env', YiiEnvEnum::PROD);
		$this->checkProdMode($config['mode']['env']);
		$config['mode']['env'] = defined('YII_ENV') ? YII_ENV : YiiEnvEnum::value($config['mode']['env'], YiiEnvEnum::PROD);
		return $config;
	}
	
	private function checkProdMode($env) {
		if(defined('YII_ENV') && YII_ENV == YiiEnvEnum::TEST && $env == YiiEnvEnum::PROD) {
			exit('Attempt to launch a test mode on the production server! The test mode is only possible from the development mode.');
		}
	}
	
	private function toOldFormat($config) {
		if(!isset($config['mode']['debug'])) {
			$config['mode']['debug'] = ArrayHelper::getValue($config, 'YII_DEBUG', false);
		}
		if(!isset($config['mode']['env'])) {
			$config['mode']['env'] = ArrayHelper::getValue($config, 'YII_ENV', false);
		}
		return $config;
	}
}

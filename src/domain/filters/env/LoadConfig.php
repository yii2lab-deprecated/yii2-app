<?php

namespace yii2lab\app\domain\filters\env;

use yii\base\BaseObject;
use yii\helpers\ArrayHelper;
use yii2lab\designPattern\filter\interfaces\FilterInterface;

class LoadConfig extends BaseObject implements FilterInterface {

	const FROM_APP = 'common/config';
	const FROM_RESERVE = 'vendor/yii2lab/yii2-app/src/domain/config';
	
	const FILE_ENV = 'env';
	const FILE_ENV_LOCAL = 'env-local';
	
	public function run($config) {
		$mainConfig = $this->load(self::FROM_APP, self::FILE_ENV);
		if(empty($mainConfig)) {
			$mainConfig = $this->load(self::FROM_RESERVE, self::FILE_ENV);
		}
		$localConfig = $this->load(self::FROM_APP, self::FILE_ENV_LOCAL);
		if(empty($localConfig)) {
			$localConfig = $this->load(self::FROM_RESERVE, self::FILE_ENV_LOCAL);
		}
		$config = ArrayHelper::merge($mainConfig, $localConfig);
		return $config;
	}
	
	private function load($path, $fileName) {
		$config = @include(ROOT_DIR . DS . $path . DS . $fileName . '.php');
		return !empty($config) ? $config : [];
	}
	
}

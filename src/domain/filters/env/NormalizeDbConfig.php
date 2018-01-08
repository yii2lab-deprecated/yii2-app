<?php

namespace yii2lab\app\domain\filters\env;

use yii\base\BaseObject;
use yii2lab\misc\interfaces\FilterInterface;

class NormalizeDbConfig extends BaseObject implements FilterInterface {

	public function run($config) {
		if(!empty($config['connection'])) {
			$config['db'] = self::initConfig($config['connection']);
		}
		return $config;
	}
	
	public static function initConfig($connection)
	{
		if (isset($connection['test'])) {
			$connection['test'] = array_merge($connection['main'], $connection['test']);
			$connection['test'] = \yii2lab\app\domain\helpers\Db::normalizeConfig($connection['test']);
		}
		$connection['main'] = \yii2lab\app\domain\helpers\Db::normalizeConfig($connection['main']);
		return $connection;
	}
}

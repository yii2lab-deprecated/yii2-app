<?php

namespace yii2lab\app\domain\filters\env;

use yii2lab\app\domain\helpers\Db;
use yii2lab\designPattern\scenario\base\BaseScenario;

class NormalizeDbConfig extends BaseScenario {
	
	public function run() {
		$config = $this->getData();
		if(!empty($config['connection'])) {
			// todo: @deprecated удалить устаревший параметр
			$config['db'] = self::initConfig($config['connection']);
		} elseif(!empty($config['servers']['db'])) {
			$config['db'] = self::initConfig($config['servers']['db']);
		}
		$this->setData($config);
	}
	
	public static function initConfig($connection)
	{
		if (isset($connection['test'])) {
			$connection['test'] = array_merge($connection['main'], $connection['test']);
			$connection['test'] = Db::normalizeConfig($connection['test']);
		}
		$connection['main'] = Db::normalizeConfig($connection['main']);
		return $connection;
	}
}

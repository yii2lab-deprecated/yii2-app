<?php

namespace yii2lab\app\domain\filters\env;

use yii\base\BaseObject;
use yii2lab\app\domain\helpers\Db;
use yii2lab\designPattern\filter\interfaces\FilterInterface;

class NormalizeDbConfig extends BaseObject implements FilterInterface {

	public function run($config) {
		if(!empty($config['connection'])) {
			// todo: удалить устаревший параметр
			$config['db'] = self::initConfig($config['connection']);
		} elseif(!empty($config['servers']['db'])) {
			$config['db'] = self::initConfig($config['servers']['db']);
		}
		return $config;
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

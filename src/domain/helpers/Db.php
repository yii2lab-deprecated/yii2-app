<?php

namespace yii2lab\app\domain\helpers;

use yii\helpers\ArrayHelper;
use yii2lab\app\domain\entities\ConnectionEntity;
use yii2lab\misc\enums\DbDriverEnum;

class Db
{

	public static function getConfig($config, $name = 'main') {
		$pre = 'db.' . $name;
		$config = ArrayHelper::merge($config, Env::get($pre));
		$config = self::schemaMap($config);
		unset($config['defaultSchema']);
		unset($config['driver']);
		unset($config['host']);
		unset($config['dbname']);
		return $config;
	}

	public static function schemaMap($config) {
		if($config['driver'] != DbDriverEnum::PGSQL) {
			unset($config['schemaMap']);
			return $config;
		}
		if(!empty($config['schemaMap'])) {
			$config = self::postgresFix($config, $config['schemaMap']);
		}
		if(!empty($config['defaultSchema'])) {
			$schemaMap =  [
				'pgsql' => [
					'class' => 'yii\db\pgsql\Schema',
					'defaultSchema' => $config['defaultSchema'],
				]
			];
			$config = self::postgresFix($config, $schemaMap);
		}
		return $config;
	}
	
	public static function normalizeConfig($db)
	{
		$db['password'] = isset($db['password']) ? $db['password'] : '';
		$db['tablePrefix'] = isset($db['tablePrefix']) ? $db['tablePrefix'] : '';
		if (empty($db['dsn'])) {
			$db['driver'] = isset($db['driver']) ? $db['driver'] : 'mysql';
			$db['host'] = isset($db['host']) ? $db['host'] : 'localhost';
			$db['dsn'] = $db['driver'] . ':host=' . $db['host'] . ';dbname=' . $db['dbname'];
		}
		if($db['driver'] != 'pgsql' && isset($db['defaultSchema'])) {
			unset($db['defaultSchema']);
		}
		return $db;
	}
	
	private static function postgresFix($config, $schemaMap) {
		$config['schemaMap'] = $schemaMap;
		$config['on afterOpen'] = function ($event) use ($config) {
			$command = 'SET search_path TO ' . $config['schemaMap']['pgsql']['defaultSchema'];
			$event->sender->createCommand($command)->execute();
		};
		return $config;
	}
	
}

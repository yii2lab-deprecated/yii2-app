<?php

namespace yii2lab\app\helpers;

class Db
{

	public static function initConfig($connection)
	{
		if (isset($connection['test'])) {
			$connection['test'] = array_merge($connection['main'], $connection['test']);
			$connection['test'] = self::normalizeConfig($connection['test']);
		}
		$connection['main'] = self::normalizeConfig($connection['main']);
		return $connection;
	}

	public static function getConfig($config, $name = 'main') {
		$pre = 'db.' . $name . '.';
		$config['dsn'] = Env::get($pre . 'dsn');
		$config['username'] = Env::get($pre . 'username');
		$config['password'] = Env::get($pre . 'password');
		$config['tablePrefix'] = Env::get($pre . 'tablePrefix');
		$schemaMap = Env::get($pre . 'schemaMap');
		if(!empty($schemaMap)) {
			$config = self::postgresFix($config, $schemaMap);
		}
		$defaultSchema = Env::get($pre . 'defaultSchema');
		if(!empty($defaultSchema)) {
			$schemaMap =  [
				'pgsql' => [
					'class' => 'yii\db\pgsql\Schema',
					'defaultSchema' => $defaultSchema,
				]
			];
			$config = self::postgresFix($config, $schemaMap);
		}
		return $config;
	}
	
	private static function postgresFix($config, $schemaMap) {
		$config['schemaMap'] = $schemaMap;
		$config['on afterOpen'] = function ($event) use ($config) {
			$command = 'SET search_path TO ' . $config['schemaMap']['pgsql']['defaultSchema'];
			$event->sender->createCommand($command)->execute();
		};
		return $config;
	}
	
	private static function normalizeConfig($db)
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

}

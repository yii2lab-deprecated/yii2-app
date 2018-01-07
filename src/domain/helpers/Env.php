<?php

namespace yii2lab\app\domain\helpers;

use yii\helpers\ArrayHelper;
use yii2lab\misc\enums\YiiEnvEnum;

class Env
{

	private static $config = [];

	static function get($key = null) {
		if (empty(self::$config)) {
			self::$config = self::load();
		}
		if (empty($key)) {
			return self::$config;
		}
		return ArrayHelper::getValue(self::$config, $key);
	}
	
	private static function load()
	{
		if(defined('GUEST_ENV') && GUEST_ENV) {
			$config = [
				'YII_DEBUG' => true,
				'YII_ENV' => YiiEnvEnum::DEV,
				'project' => 'guest',
				'config' => [
					'map' => [
						[
							'name' => 'services',
							'merge' => true,
							'withLocal' => true,
							'onlyApps' => [
								'common',
							],
						],
					],
				],
				'remote' => [
					'driver' => 'disc',
				],
			];
		} else {
			$config = require(ROOT_DIR . DS . COMMON . DS . 'config' . DS . 'env.php');
		}
		$config = self::initYiiConfig($config);
		if(!empty($config['connection'])) {
			$config['db'] = Db::initConfig($config['connection']);
		}
		$config['allowedIPs'] = self::initAllowedIPsConfig(isset($config['allowedIPs']) ? $config['allowedIPs'] : []);
		return $config;
	}

	private static function initYiiConfig($config)
	{
		$config['YII_DEBUG'] = defined('YII_DEBUG') ? YII_DEBUG : !empty($config['YII_DEBUG']);
		$config['YII_ENV'] = defined('YII_ENV') ? YII_ENV : YiiEnvEnum::value($config['YII_ENV'], YiiEnvEnum::PROD);
		return $config;
	}

	private static function initAllowedIPsConfig($config)
	{
		if (empty($config) || in_array('*', $config)) {
			$config = ['127.0.0.1', '::1'];
			if (!empty($_SERVER['REMOTE_ADDR'])) {
				$config[] = $_SERVER['REMOTE_ADDR'];
			}
		}
		return $config;
	}

}

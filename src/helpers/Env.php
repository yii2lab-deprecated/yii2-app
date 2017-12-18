<?php

namespace yii2lab\app\helpers;

use yii\helpers\ArrayHelper;

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
				'YII_ENV' => 'dev',
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
		$envList = ['prod', 'dev', 'test'];
		$config['YII_DEBUG'] = defined('YII_DEBUG') ? YII_DEBUG : !empty($config['YII_DEBUG']);
		$config['YII_ENV'] = defined('YII_ENV') ? YII_ENV : (in_array($config['YII_ENV'], $envList) ? $config['YII_ENV'] : 'prod');
		
		$config['COMMON_DIR'] = !empty($config['COMMON_DIR']) ? $config['COMMON_DIR'] : ROOT_DIR . DS . COMMON;
		$config['FRONTEND_DIR'] = !empty($config['FRONTEND_DIR']) ? $config['FRONTEND_DIR'] : ROOT_DIR . DS . FRONTEND;
		$config['BACKEND_DIR'] = !empty($config['BACKEND_DIR']) ? $config['BACKEND_DIR'] : ROOT_DIR . DS . BACKEND;
		$config['API_DIR'] = !empty($config['API_DIR']) ? $config['API_DIR'] : ROOT_DIR . DS . API;
		$config['CONSOLE_DIR'] = !empty($config['CONSOLE_DIR']) ? $config['CONSOLE_DIR'] : ROOT_DIR . DS . CONSOLE;
		$config['VENDOR_DIR'] = !empty($config['VENDOR_DIR']) ? $config['VENDOR_DIR'] : ROOT_DIR . DS . VENDOR;
		$config['DOMAIN_DIR'] = !empty($config['DOMAIN_DIR']) ? $config['DOMAIN_DIR'] : ROOT_DIR . DS . DOMAIN;
		
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

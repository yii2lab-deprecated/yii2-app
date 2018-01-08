<?php

namespace yii2lab\app\domain\filters\env;

use yii\base\BaseObject;
use yii2lab\misc\interfaces\FilterInterface;

class AllowedIp extends BaseObject implements FilterInterface {

	public function run($config) {
		$config['allowedIPs'] = self::initAllowedIPsConfig(isset($config['allowedIPs']) ? $config['allowedIPs'] : []);
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

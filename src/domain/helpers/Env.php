<?php

namespace yii2lab\app\domain\helpers;

use yii\helpers\ArrayHelper;
use yii2lab\helpers\Helper;
use yii2lab\designPattern\command\helpers\CommandHelper;
use yii2lab\designPattern\filter\helpers\FilterHelper;

class Env
{

	private static $config = [];
	
	static function get($key = null) {
		if (empty(self::$config)) {
			self::init();
		}
		if (empty($key)) {
			return self::$config;
		}
		return ArrayHelper::getValue(self::$config, $key);
	}
	
	public static function init() {
		$definition = [
			'commands' => [],
			'filters' => [
				'yii2lab\app\domain\filters\env\LoadConfig',
				'yii2lab\app\domain\filters\env\YiiEnv',
				'yii2lab\app\domain\filters\env\NormalizeDbConfig',
			],
		];
		self::$config = self::load($definition);
	}
	
	private static function load($definition = []) {
		$config = FilterHelper::runAll($definition['filters'], []);
		$definition['commands'] = Helper::assignAttributesForList($definition['commands'], [
			'env' => $config,
		]);
		CommandHelper::runAll($definition['commands']);
		return $config;
	}
	
}

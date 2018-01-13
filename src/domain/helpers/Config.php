<?php

namespace yii2lab\app\domain\helpers;

use yii\filters\AccessControl;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii2lab\app\domain\filters\config\LoadConfig;
use yii2lab\helpers\Helper;
use yii2lab\designPattern\command\helpers\CommandHelper;
use yii2lab\designPattern\filter\helpers\FilterHelper;

class Config {
	
	private static $config = [];
	private static $commands = [];
	private static $filters = [
		[
			'class' => LoadConfig::class,
			'app' => COMMON,
			'name' => 'main',
			'withLocal' => true,
		],
		[
			'class' => LoadConfig::class,
			'name' => 'main',
			'withLocal' => true,
		],
		
		/*[
			'class' => LoadConfig::class,
			'app' => COMMON,
			'name' => 'test',
			'withLocal' => true,
			'isEnabled' => YII_ENV == YiiEnvEnum::TEST,
		],
		[
			'class' => LoadConfig::class,
			'name' => 'test',
			'withLocal' => true,
			'isEnabled' => YII_ENV == YiiEnvEnum::TEST,
		],*/
		
		[
			'class' => LoadConfig::class,
			'app' => COMMON,
			'name' => 'modules',
			'withLocal' => true,
		],
		[
			'class' => LoadConfig::class,
			'name' => 'modules',
			'withLocal' => true,
		],
		
		[
			'class' => LoadConfig::class,
			'app' => COMMON,
			'name' => 'params',
			'withLocal' => true,
			'assignTo' => 'params',
		],
		[
			'class' => LoadConfig::class,
			'name' => 'params',
			'withLocal' => true,
			'assignTo' => 'params',
		],
		
		[
			'class' => LoadConfig::class,
			'app' => COMMON,
			'name' => 'services',
			'withLocal' => true,
		],
		'yii2lab\app\domain\filters\config\SetControllerNamespace',
		'yii2lab\app\domain\filters\config\FixValidationKeyInTest',
		'yii2lab\app\domain\filters\config\SetAppId',
		'yii2lab\app\domain\filters\config\SetPath',
		'yii2module\offline\domain\filters\IsOffline',
		'yii2lab\migration\domain\filters\SetPath',
		'yii2lab\domain\filters\NormalizeServices',
	];
	
	static function get($key = null) {
		if(empty(self::$config)) {
			self::$config = self::load();
		}
		if(empty($key)) {
			return self::$config;
		}
		return ArrayHelper::getValue(self::$config, $key);
	}
	
	/**
	 * @return array
	 *
	 * @deprecated move to yii2lab\app\domain\helpers\Behavior::access
	 */
	static function genAccess($roles, $only = null, $allow = true) {
		$roles = is_array($roles) ? $roles : [$roles];
		$access = [
			'class' => AccessControl::className(),
			'rules' => [
				[
					'allow' => $allow,
					'roles' => $roles,
				],
			],
		];
		if(!empty($only)) {
			$access['only'] = ArrayHelper::toArray($only);
		}
		return $access;
	}
	
	/**
	 * @return array
	 *
	 * @deprecated move to yii2lab\app\domain\helpers\Behavior::cors
	 */
	static function genCors() {
		$origin = [];
		$urls = env('url');
		foreach($urls as $url) {
			$origin[] = trim($url, SL);
		}
		// todo: load from env.php
		return [
			'class' => Cors::className(),
			'cors' => [
				'Origin' => $origin,
				'Access-Control-Request-Method' => ['get', 'post', 'put', 'delete', 'options'],
				'Access-Control-Request-Headers' => [
					//'X-Wsse',
					'content-type',
					'x-requested-with',
					'authorization',
					'registration-token',
				],
				//'Access-Control-Allow-Credentials' => true,
				//'Access-Control-Max-Age' => 3600, // Allow OPTIONS caching
				
				'Access-Control-Expose-Headers' => [
					'link',
					'access-token',
					'authorization',
					'x-pagination-total-count',
					'x-pagination-page-count',
					'x-pagination-current-page',
					'x-pagination-per-page',
				],
			],
		];
	}

	private static function load() {
		$config = [];
		$config = self::runFilters($config);
		self::runCommands($config);
		return $config;
	}
	
	private static function runFilters($config) {
		$filters = Env::get('config.filters');
		if(empty($filters)) {
			$filters = self::$filters;
		}
		$config = FilterHelper::runAll($filters, $config);
		return $config;
	}
	
	private static function runCommands($config) {
		$commands = Env::get('config.commands');
		if(empty($commands)) {
			$commands = self::$commands;
		}
		if(empty($commands)) {
			return null;
		}
		$env = env(null);
		$commands = Helper::assignAttributesForList($commands, [
			'env' => $env,
			'config' => $config,
		]);
		CommandHelper::runAll($commands);
	}
	
}

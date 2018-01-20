<?php

namespace yii2lab\app\domain\helpers;

use yii\filters\AccessControl;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii2lab\helpers\Helper;

class Config {
	
	private static $config = [];
	
	static function get($key = null) {
		if (empty(self::$config)) {
			return null;
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
	
	public static function init($definition) {
		self::$config = self::load($definition);
	}
	
	public static function load($definition = []) {
		$definition['class'] = Handler::class;
		/** @var Handler $loader */
		$loader = Helper::createObject($definition);
		return $loader->run();
	}
	
}

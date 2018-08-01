<?php

namespace yii2lab\app\domain\helpers;

use yii2lab\helpers\UrlHelper;

class EnvService {
	
	public static function getServer($name, $default = null) {
		return env('servers.' . $name, $default);
	}
	
	public static function getConnection($name, $default = null) {
		return self::getServer('db.' . $name, $default);
	}
	
	public static function getStaticHost() {
		$domain = self::getServer('static.domain');
		$domain = trim($domain, SL);
		return $domain;
	}
	
	public static function getUrl($name, $uri = null) {
		$domain = env('url' . DOT . $name);
		return self::generateUrl($domain, $uri);
	}
	
	public static function getStaticUrl($path) {
		$path = trim($path, SL);
		if(!UrlHelper::isAbsolute($path)) {
			$path = self::getStaticHost() . SL . $path;
		}
		return $path;
	}
	
	private static function generateUrl($domain, $uri) {
		$domain = rtrim($domain, SL);
		$uri = ltrim($uri, SL);
		if($uri) {
			$domain .= SL . $uri;
		}
		return $domain;
	}
}

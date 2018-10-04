<?php

namespace yii2lab\app\domain\helpers;

use yii2lab\extension\common\helpers\UrlHelper;

class EnvService {

    public static function get($name, $default = null) {
	    $value = Env::get($name);
	    if($value === null) {
		    $value = $default;
	    }
	    return $value;
    }

	public static function getServerHost($name, $default = null) {
		$host = self::get('servers.' . $name . '.host', $default);
		return rtrim($host, SL);
	}
	
	public static function getServerHostUrl($name, $uri) {
		$host = self::get('servers.' . $name . '.host');
		return self::generateUrl($host, $uri);
	}
	
	public static function getServer($name, $default = null) {
		return self::get('servers.' . $name, $default);
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
		$domain = self::get('url' . DOT . $name);
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

<?php

namespace yii2lab\app\helpers;

class Api
{
	
	public static function getApiVersion()
	{
		$version = null;
		if(APP == API) {
			$url = $_SERVER['REQUEST_URI'];
			if (preg_match('#/v([0-9]+)(/|$)#i', $url, $matches)) {
				$version = $matches[1];
				//$_SERVER['REQUEST_URI'] = str_replace('/v' . $version, '', $_SERVER['REQUEST_URI']);
			}
		}
		return $version;
	}
	
	public static function initCors($cors)
	{
		$cors = self::initCorsConfig($cors);
		$headersArray = array_merge($cors['allow-headers'], $cors['expose-headers']);
		$cors['allow-headers'] = $headersArray;
		$cors['expose-headers'] = $headersArray;
		foreach($cors as $name => $value) {
			if(!empty($value)) {
				$value = implode(' , ', $value);
				header("Access-Control-{$name}: {$value}");
			}
		}
		if(!empty($_SERVER['REQUEST_METHOD']) && strtolower($_SERVER['REQUEST_METHOD']) == 'options') {
			header("HTTP/1.0 200 Ok");
			exit();
		}
	}
	
	private static function initCorsConfig($cors)
	{
		if(empty($cors['allow-origin'])) {
			$cors['allow-origin'] = ['*'];
		}
		if(empty($cors['allow-methods'])) {
			$cors['allow-methods'] = ['get', 'post', 'put', 'delete', 'options'];
		}
		if(empty($cors['allow-headers'])) {
			$cors['allow-headers'] = [
				'content-type', 'x-requested-with', 
				'authorization', 'registration-token'
			];
		}
		if(empty($cors['expose-headers'])) {
			$cors['expose-headers'] = [
				'link', 'access-token', 
				'x-pagination-total-count', 'x-pagination-page-count', 
				'x-pagination-current-page', 'x-pagination-per-page'
			];
		}
		return $cors;
	}

}

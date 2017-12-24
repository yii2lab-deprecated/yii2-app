<?php

namespace yii2lab\app\domain\helpers;

class Api
{
	
	public static function getApiVersion()
	{
		$version = null;
		if(APP == API && !empty($_SERVER['REQUEST_URI'])) {
			$version = self::getApiVersionFromUrl();
			if(empty($version)) {
				$version = self::getApiVersionFromHeader();
			}
			if(empty($version)) {
				header('HTTP/1.1 400 Bad Request', true, 400);
				header('Content-Type: application/json');
				exit(json_encode([
					"name" => "Bad Request",
					"message" => "No API version specified",
					"code" => 0,
					"status" => 400,
					"type" => "Exception",
				]));
			}
		}
		return $version;
	}
	
	private static function getApiVersionFromUrl()
	{
		$version = null;
		$url = $_SERVER['REQUEST_URI'];
		if (preg_match('#/v([0-9]+)(/|$)#i', $url, $matches)) {
			$version = $matches[1];
			//$_SERVER['REQUEST_URI'] = str_replace('/v' . $version, '', $_SERVER['REQUEST_URI']);
		}
		return $version;
	}
	
	private static function getApiVersionFromHeader()
	{
		$version = null;
		$allHeaders = getallheaders();
		if(!empty($allHeaders['Version'])) {
			$version = $allHeaders['Version'];
			$_SERVER['REQUEST_URI'] = '/v' . $version . $_SERVER['REQUEST_URI'];
		}
		return $version;
	}

}

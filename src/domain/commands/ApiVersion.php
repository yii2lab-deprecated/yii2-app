<?php

namespace yii2lab\app\domain\commands;

use yii\base\BaseObject;
use yii2lab\helpers\Helper;
use yii2lab\designPattern\command\interfaces\CommandInterface;

class ApiVersion extends BaseObject implements CommandInterface {

	public function run() {
		$version = self::getApiVersion();
		if(empty($version)) {
			self::showError();
		}
		self::setApiVersionConst($version);
	}
	
	private static function setApiVersionConst($version) {
		define('API_VERSION', $version);
		define('API_VERSION_STRING', $version ? 'v' . $version : '');
	}
	
	private static function getApiVersion()
	{
		$version = self::getApiVersionFromUrl();
		if(empty($version)) {
			$version = self::getApiVersionFromHeader();
			if(empty($version)) {
				return null;
			}
			self::forgeRequestUri($version);
		}
		return $version;
	}
	
	private static function showError()
	{
		header('HTTP/1.1 400 Bad Request', true, 400);
		header('Content-Type: application/json');
		$body = [
			"name" => "Bad Request",
			"message" => "No API version specified",
			"code" => 0,
			"status" => 400,
			"type" => "Exception",
			"versions" => Helper::getApiVersionNumberList(),
		];
		exit(json_encode($body));
	}
	
	private static function getApiVersionFromUrl()
	{
		if(empty($_SERVER['REQUEST_URI'])) {
			return null;
		}
		if (preg_match('#/v([0-9]+)(/|$)#i', $_SERVER['REQUEST_URI'], $matches)) {
			return $matches[1];
		}
		return null;
	}
	
	private static function getApiVersionFromHeader()
	{
		$headers = getallheaders();
		if(empty($headers['Version'])) {
			return null;
		}
		return $headers['Version'];
	}
	
	private static function forgeRequestUri($version) {
		$_SERVER['REQUEST_URI'] = '/v' . $version . $_SERVER['REQUEST_URI'];
	}
}

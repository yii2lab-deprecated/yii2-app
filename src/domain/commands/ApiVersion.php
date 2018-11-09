<?php

namespace yii2lab\app\domain\commands;

use yii2lab\extension\scenario\base\BaseScenario;
use yii2lab\rest\domain\helpers\MiscHelper;

class ApiVersion extends BaseScenario {

	public function run() {
		$version = self::getApiVersion();
		if(empty($version) && !YII_ENV_TEST) {
			self::showError('No API version specified');
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
				if(APP == CONSOLE) {
					$version = 1;
				} else {
					return null;
				}
			}
			self::forgeRequestUri($version);
		}
		if(APP != CONSOLE && !MiscHelper::isValidVersion('v' . $version)) {
			self::showError('Version ' . $version . ' not found');
		}
		return $version;
	}
	
	private static function showError($message)
	{
		header('HTTP/1.1 400 Bad Request', true, 400);
		header('Content-Type: application/json');
		$body = [
			"name" => "Bad Request",
			"message" => $message,
			"code" => 0,
			"status" => 400,
			"type" => "Exception",
			"versions" => $versionList = MiscHelper::getAllVersions(),
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
		$headers = function_exists('getallheaders') ? getallheaders() : [];
		if(empty($headers['Version'])) {
			return null;
		}
		return $headers['Version'];
	}
	
	private static function forgeRequestUri($version) {
		if(!isset($_SERVER['REQUEST_URI'])) {
			return;
		}
		$_SERVER['REQUEST_URI'] = '/v' . $version . $_SERVER['REQUEST_URI'];
	}
}

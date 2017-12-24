<?php

namespace yii2lab\app;

use yii\console\Application as ConsoleApplication;
use yii\web\Application as WebApplication;
use yii2lab\app\domain\helpers\Env;
use yii2lab\app\domain\helpers\Constant;
use yii2lab\app\domain\helpers\Api;
use yii2lab\app\domain\helpers\Config;
use yii2lab\app\domain\helpers\Load;

class App
{

	public static function run($name)
	{
		self::init($name);
		Load::bootstrap();
		$config = Config::get();
		if (APP == CONSOLE) {
			self::runConsoleApplication($config);
		} else {
			self::runWebApplication($config);
		}
	}

	public static function init($appName)
	{
		require_once(__DIR__ . '/domain/helpers/Load.php');
		Load::helpers();
		$rootDir = realpath(__DIR__ . str_repeat(DIRECTORY_SEPARATOR . '..', 4));
		Constant::setConst($appName, $rootDir);
		$env = Env::get();
		Constant::setEnv($env);
		$apiVersion = Api::getApiVersion();
		Constant::setApiVersion($apiVersion);
		Load::required();
		Constant::setAliases();
	}

	private static function runConsoleApplication($config)
	{
		$application = new ConsoleApplication($config);
		$exitCode = $application->run();
		exit($exitCode);
	}

	private static function runWebApplication($config)
	{
		$env = Env::get();
		if(APP == API && !empty($env['cors'])) {
			Api::initCors($env['cors']);
		}
		self::checkIp($env['allowedIPs']);
		$application = new WebApplication($config);
		$application->run();
	}

	private static function checkIp($allowedIPs)
	{
		if (YII_ENV != 'test' || empty($allowedIPs)) {
			return;
		}
		if ( ! in_array(@$_SERVER['REMOTE_ADDR'], $allowedIPs)) {
			die('You are not allowed to access this file.');
		}
	}

}

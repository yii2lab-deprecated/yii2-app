<?php

namespace yii2lab\app;

use yii\console\Application as ConsoleApplication;
use yii\web\Application as WebApplication;
use yii2lab\app\domain\helpers\Env;
use yii2lab\app\domain\helpers\Constant;
use yii2lab\app\domain\helpers\Api;
use yii2lab\app\domain\helpers\Config;
use yii2lab\app\domain\helpers\Load;
use yii2lab\misc\helpers\CommandHelper;

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
		self::runWebCommands();
		$application = new WebApplication($config);
		$application->run();
	}
	
	private static function runWebCommands()
	{
		$env = Env::get();
		$commands = [
			[
				'class' => 'yii2lab\app\domain\commands\Cors',
				'env' => $env,
			],
			[
				'class' => 'yii2lab\app\domain\commands\CheckIp',
				'env' => $env,
			],
		];
		CommandHelper::runAll($commands);
	}

}

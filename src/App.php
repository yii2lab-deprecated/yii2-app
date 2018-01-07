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

	public static function run($appName)
	{
		self::init($appName);
		Load::bootstrap();
		$config = Config::get();
		self::runApplication($config);
	}

	public static function init($appName)
	{
		require_once(__DIR__ . '/domain/helpers/Load.php');
		Load::helpers();
		Constant::init();
		Load::autoload();
		$env = Env::get();
		Constant::setYiiEnv($env);
		Load::required();
		Constant::setApp($appName);
		$version = Api::getApiVersion($appName);
		Constant::setApiVersion($version);
	}
	
	private static function runApplication($config)
	{
		if (APP == CONSOLE) {
			$application = new ConsoleApplication($config);
			$exitCode = $application->run();
			exit($exitCode);
		} else {
			self::runWebCommands();
			$application = new WebApplication($config);
			$application->run();
		}
	}
	
	private static function runWebCommands()
	{
		$env = Env::get();
		$commands = [
			/*[
				'class' => 'yii2lab\app\domain\commands\Cors',
				'env' => $env,
			],
			[
				'class' => 'yii2lab\app\domain\commands\CheckIp',
				'env' => $env,
			],*/
		];
		CommandHelper::runAll($commands);
	}

}

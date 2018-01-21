<?php

namespace yii2lab\app;

use yii\console\Application as ConsoleApplication;
use yii\web\Application as WebApplication;
use yii2lab\app\domain\helpers\Env;
use yii2lab\app\domain\helpers\Constant;
use yii2lab\app\domain\helpers\Config;
use yii2lab\app\domain\helpers\Load;
use yii2lab\helpers\Helper;
use yii2lab\designPattern\command\helpers\CommandHelper;

class App
{
	
	private static $commands = [
		'yii2lab\app\domain\commands\RunBootstrap',
		'yii2lab\app\domain\commands\ApiVersion',
	];
	private static $initedAs = null;
	
	public static function run($appName = null, $projectDir = '')
	{
		if(!empty($appName)) {
			self::init($appName, $projectDir);
		}
		$definition = Env::get('config');
		Config::init($definition);
		$config = Config::get();
		self::runApplication($config);
	}

	public static function init($appName, $projectDir = '')
	{
		if(self::$initedAs) {
			return;
		}
		require_once(__DIR__ . '/domain/helpers/Load.php');
		Load::helpers();
		Constant::init($appName);
		Load::autoload();
		Env::init($projectDir);
		$env = Env::get();
		Constant::setYiiEnv($env);
		Load::required();
		Constant::setAliases();
		self::runCommands(self::$commands, $appName, $env);
		self::$initedAs = $appName;
	}
	
	private static function runApplication($config)
	{
		if (APP == CONSOLE) {
			$application = new ConsoleApplication($config);
			$exitCode = $application->run();
			exit($exitCode);
		} else {
			$application = new WebApplication($config);
			$application->run();
		}
	}
	
	private static function runCommands($commands, $appName, $config) {
		if(empty($commands)) {
			return null;
		}
		$commands = Helper::assignAttributesForList($commands, [
			'appName' => $appName,
			'env' => $config,
		]);
		CommandHelper::runAll($commands);
	}
	
}

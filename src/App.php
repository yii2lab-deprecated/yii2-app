<?php

namespace yii2lab\app;

use yii\console\Application as ConsoleApplication;
use yii\web\Application as WebApplication;
use yii2lab\app\domain\helpers\Env;
use yii2lab\app\domain\helpers\Constant;
use yii2lab\app\domain\helpers\Config;
use yii2lab\app\domain\helpers\Load;
use yii2lab\designPattern\command\helpers\CommandHelper;

class App
{
	
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
		Constant::setYiiEnv($env['mode']['env']);
		Constant::setYiiDebug($env['mode']['debug']);
		Load::required();
		Constant::setAliases();
		CommandHelper::runAll(Env::get('app.commands', []));
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
	
}

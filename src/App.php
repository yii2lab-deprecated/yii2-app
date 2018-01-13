<?php

namespace yii2lab\app;

require 'C:\OpenServer\domains\qr.yii\vendor\yii2lab\yii2-design-pattern\src\command\helpers\CommandHelper.php';
require 'C:\OpenServer\domains\qr.yii\vendor\yii2lab\yii2-design-pattern\src\filter\helpers\FilterHelper.php';
require 'C:\OpenServer\domains\qr.yii\vendor\yii2lab\yii2-design-pattern\src\command\interfaces\CommandInterface.php';
require 'C:\OpenServer\domains\qr.yii\vendor\yii2lab\yii2-design-pattern\src\filter\interfaces\FilterInterface.php';

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
		'yii2lab\app\domain\commands\ApiVersion',
	];
	private static $initedAs = null;
	
	public static function run($appName = null)
	{
		if(!empty($appName)) {
			self::init($appName);
		}
		$env = Env::get();
		self::runCommands(self::$commands, $appName, $env);
		Load::bootstrap();
		$config = Config::get();
		self::runApplication($config);
	}

	public static function init($appName)
	{
		if(self::$initedAs) {
			return;
		}
		require_once(__DIR__ . '/domain/helpers/Load.php');
		Load::helpers();
		Constant::init();
		Load::autoload();
		$env = Env::get();
		Constant::setYiiEnv($env);
		Load::required();
		Constant::setApp($appName);
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

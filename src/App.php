<?php

namespace yii2lab\app;

use Yii;
use yii\base\InvalidConfigException;
use yii\console\Application as ConsoleApplication;
use yii\web\Application as WebApplication;
use yii\web\ServerErrorHttpException;
use yii2lab\app\domain\helpers\Env;
use yii2lab\app\domain\helpers\Constant;
use yii2lab\app\domain\helpers\Config;
use yii2lab\app\domain\helpers\Load;
use yii2lab\designPattern\scenario\helpers\ScenarioHelper;

class App
{
	
	private static $initedAs = null;
	
	public static function run($appName = null, $projectDir = '')
	{
		if(!empty($appName)) {
			self::init($appName, $projectDir);
		}
		Yii::beginProfile('init_config', __METHOD__);
		$definition = Env::get('config');
		Config::init($definition);
		$config = Config::get();
		Yii::endProfile('init_config', __METHOD__);
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
		$yiiClass = Env::get('yii.class');
		Load::yii($yiiClass);
		Yii::beginProfile('init_yii', __METHOD__);
		Load::required();
		$aliases = Env::get('aliases');
		Constant::setAliases($aliases);
		Yii::endProfile('init_yii', __METHOD__);
		Yii::beginProfile('run_env_commands', __METHOD__);
		$commands = Env::get('app.commands', []);
		self::runCommands($commands);
		self::$initedAs = $appName;
		Yii::endProfile('run_env_commands', __METHOD__);
	}
	
	private static function runCommands($commands)
	{
		$commandCollection = ScenarioHelper::forgeCollection($commands);
		try {
			ScenarioHelper::runAll($commandCollection);
		} catch(InvalidConfigException $e) {
		} catch(ServerErrorHttpException $e) {
		}
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

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
	
	public static function run($appName = null, $appDir = 'common/config')
	{
		if(!empty($appName)) {
			self::init($appName, $appDir);
		}
		$definition = Env::get('config');
		Config::init($definition);
		$config = Config::get();
		self::runApplication($config);
	}

	public static function init($appName, $appDir = 'common/config')
	{
		if(self::$initedAs) {
			return;
		}
		require_once(__DIR__ . '/domain/helpers/Load.php');
		Load::helpers();
		Constant::init($appName);
		Load::autoload();
		Env::init(self::envDefinition($appDir));
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
	
	public static function envDefinition($evnConfigDir) {
		return [
			'commands' => [],
			'filters' => [
				[
					'class' => 'yii2lab\app\domain\filters\env\LoadConfig',
					'paths' => [
						$evnConfigDir,
						'vendor/yii2lab/yii2-app/src/domain/config',
					],
				],
				'yii2lab\app\domain\filters\env\YiiEnv',
				'yii2lab\app\domain\filters\env\NormalizeDbConfig',
			],
		];
	}
}

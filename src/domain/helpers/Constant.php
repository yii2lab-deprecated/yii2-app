<?php

namespace yii2lab\app\domain\helpers;

use Yii;

class Constant {
	
	public static function init() {
		self::setBase(); # legacy from CI3
		self::setNames(); # define name
		self::setDirs();
	}
	
	public static function setYiiEnv($env) {
		defined('YII_DEBUG') OR define('YII_DEBUG', $env['YII_DEBUG']);
		defined('YII_ENV') OR define('YII_ENV', $env['YII_ENV']);
	}
	
	public static function setApp($appName) {
		self::setApplication($appName);
		self::setAliases();
	}
	
	private static function setAliases() {
		Yii::setAlias('@root', ROOT_DIR);
		Yii::setAlias('@common', COMMON_DIR);
		Yii::setAlias('@frontend', FRONTEND_DIR);
		Yii::setAlias('@backend', BACKEND_DIR);
		Yii::setAlias('@api', API_DIR);
		Yii::setAlias('@console', CONSOLE_DIR);
		Yii::setAlias('@vendor', VENDOR_DIR);
		Yii::setAlias('@domain', DOMAIN_DIR);
	}
	
	private static function setApplication($appName) {
		define('APP', $appName);
		define('APP_DIR', ROOT_DIR . DS . strtoupper($appName));
		//Yii::setAlias('@app', APP_DIR);
	}
	
	private static function setNames() {
		define('COMMON', 'common');
		define('FRONTEND', 'frontend');
		define('BACKEND', 'backend');
		define('API', 'api');
		define('CONSOLE', 'console');
		define('VENDOR', 'vendor');
		define('DOMAIN', 'domain');
	}
	
	private static function setBase() {
		define('DS', DIRECTORY_SEPARATOR);
		define('SL', '/');
		define('BSL', '\\');
		define('NBSP', '&nbsp;');
		define('NBSP2X', '&nbsp;&nbsp;');
		define('NS', "\n"); //new string Linux
		//define('NSW', "\r\n"); //new string Windows
		define('BL', '_'); //bottom line
		define('DL', '-'); //dash line
		define('DOT', '.');
		define('SPC', ' ');
		define('EMP', '');
		define('TAB', "\t");
		define('BR', '<br/>');
		define('TIMESTAMP', time());
	}
	
	private static function setDirs() {
		define('ROOT_DIR', self::getRootDir());
		define('COMMON_DIR', ROOT_DIR . DS . COMMON);
		define('COMMON_DATA_DIR', COMMON_DIR . DS . 'data');
		define('FRONTEND_DIR', ROOT_DIR . DS . FRONTEND);
		define('BACKEND_DIR', ROOT_DIR . DS . BACKEND);
		define('API_DIR', ROOT_DIR . DS . API);
		define('CONSOLE_DIR', ROOT_DIR . DS . CONSOLE);
		define('VENDOR_DIR', ROOT_DIR . DS . VENDOR);
		define('DOMAIN_DIR', ROOT_DIR . DS . DOMAIN);
	}
	
	private static function getRootDir() {
		$up = DIRECTORY_SEPARATOR . '..';
		$upScope = str_repeat($up, 6);
		return realpath(__DIR__ . $upScope);
	}
}

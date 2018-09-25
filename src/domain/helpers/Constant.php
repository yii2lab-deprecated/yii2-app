<?php

namespace yii2lab\app\domain\helpers;

use Yii;
use yii2lab\app\domain\enums\YiiEnvEnum;

class Constant {
	
	public static function init($appName) {
		self::setBase(); # legacy from CI3
		self::setNames(); # define name
		self::setDirs();
		self::setApplication($appName);
	}
	
	public static function setYiiEnv($env = YiiEnvEnum::PROD) {
		defined('YII_ENV') OR define('YII_ENV', YiiEnvEnum::value($env, YiiEnvEnum::PROD));
	}
	
	public static function setYiiDebug($debug = false) {
		defined('YII_DEBUG') OR define('YII_DEBUG', $debug);
	}
	
	public static function setContainer($container = []) {
		if(!empty($container)) {
			foreach ($container as $name => $definition) {
				Yii::$container->set($name, $definition);
			}
		}
	}
	
	public static function setAliases($aliases = []) {
		Yii::setAlias('@root', ROOT_DIR);
		Yii::setAlias('@common', COMMON_DIR);
		Yii::setAlias('@frontend', FRONTEND_DIR);
		Yii::setAlias('@backend', BACKEND_DIR);
		Yii::setAlias('@api', API_DIR);
		Yii::setAlias('@console', CONSOLE_DIR);
		Yii::setAlias('@vendor', VENDOR_DIR);
		Yii::setAlias('@domain', DOMAIN_DIR);
		if(!empty($aliases)) {
		    foreach ($aliases as $alias => $path) {
                Yii::setAlias($alias, $path);
            }
        }
	}
	
	public static function setApplication($appName) {
		defined('APP') OR define('APP', $appName);
		defined('APP_DIR') OR define('APP_DIR', ROOT_DIR . DS . strtolower($appName));
		//Yii::setAlias('@app', APP_DIR);
	}
	
	private static function setNames() {
		defined('COMMON') OR define('COMMON', 'common');
		defined('FRONTEND') OR define('FRONTEND', 'frontend');
		defined('BACKEND') OR define('BACKEND', 'backend');
		defined('API') OR define('API', 'api');
		defined('CONSOLE') OR define('CONSOLE', 'console');
		defined('VENDOR') OR define('VENDOR', 'vendor');
		defined('DOMAIN') OR define('DOMAIN', 'domain');
	}
	
	private static function setBase() {
		defined('DS') OR define('DS', DIRECTORY_SEPARATOR);
		defined('SL') OR define('SL', '/');
		defined('BSL') OR define('BSL', '\\');
		defined('NBSP') OR define('NBSP', '&nbsp;');
		//defined('NBSP2X') OR define('NBSP2X', '&nbsp;&nbsp;');
		defined('NS') OR define('NS', "\n"); //new string Linux
		//defined('NSW') OR define('NSW', "\r\n"); //new string Windows
		defined('BL') OR define('BL', '_'); //bottom line
		defined('DL') OR define('DL', '-'); //dash line
		defined('DOT') OR define('DOT', '.');
		defined('SPC') OR define('SPC', ' ');
		defined('EMP') OR define('EMP', '');
		defined('TAB') OR define('TAB', "\t");
		defined('BR') OR define('BR', '<br/>');
		defined('TIMESTAMP') OR define('TIMESTAMP', time());
	}
	
	private static function setDirs() {
		defined('ROOT_DIR') OR define('ROOT_DIR', self::getRootDir());
		defined('COMMON_DIR') OR define('COMMON_DIR', ROOT_DIR . DS . COMMON);
		defined('COMMON_DATA_DIR') OR define('COMMON_DATA_DIR', COMMON_DIR . DS . 'data');
		defined('FRONTEND_DIR') OR define('FRONTEND_DIR', ROOT_DIR . DS . FRONTEND);
		defined('BACKEND_DIR') OR define('BACKEND_DIR', ROOT_DIR . DS . BACKEND);
		defined('API_DIR') OR define('API_DIR', ROOT_DIR . DS . API);
		defined('CONSOLE_DIR') OR define('CONSOLE_DIR', ROOT_DIR . DS . CONSOLE);
		defined('VENDOR_DIR') OR define('VENDOR_DIR', ROOT_DIR . DS . VENDOR);
		defined('DOMAIN_DIR') OR define('DOMAIN_DIR', ROOT_DIR . DS . DOMAIN);
		defined('TEST_APPLICATION_DIR') OR define('TEST_APPLICATION_DIR', 'vendor/yii2lab/yii2-test/src/base/_application');
	}
	
	private static function getRootDir() {
		$up = DS . '..';
		$upScope = str_repeat($up, 6);
		return realpath(__DIR__ . $upScope);
	}
}

<?php

namespace yii2lab\app\helpers;

use Yii;

class Constant
{

	public static function setConst($appName, $rootDir)
	{
		self::setNames($appName); # define name
		self::setBase($rootDir); # define base
		self::setLegacy(); # legacy from CI3
	}

	public static function setEnv($env)
	{
		self::setYiiEnv($env);
		self::setDirs($env);
	}

	public static function setApiVersion($version)
	{
		define('API_VERSION', $version);
		define('API_VERSION_STRING', $version ? 'v' . $version : '');
	}
	
	public static function setAliases()
	{
		Yii::setAlias('@common', COMMON_DIR);
		Yii::setAlias('@frontend', FRONTEND_DIR);
		Yii::setAlias('@backend', BACKEND_DIR);
		Yii::setAlias('@api', API_DIR);
		Yii::setAlias('@console', CONSOLE_DIR);
		Yii::setAlias('@vendor', VENDOR_DIR);
		Yii::setAlias('@domain', DOMAIN_DIR);
		/* $aliasList = Env::get('alias');
		if(!empty($aliasList)) {
			foreach($aliasList as $aliasName => $aliasDir) {
				Yii::setAlias('@' . $aliasName, ROOT_DIR . DS . $aliasDir);
			}
		} */
	}
	
	private static function setNames($appName)
	{
		define('APP', $appName);
		define('COMMON', 'common');
		define('FRONTEND', 'frontend');
		define('BACKEND', 'backend');
		define('API', 'api');
		define('CONSOLE', 'console');
		define('VENDOR', 'vendor');
		define('DOMAIN', 'domain');
	}

	private static function setBase($rootDir)
	{
		define('ROOT_DIR', $rootDir);
	}

	private static function setLegacy()
	{
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

	private static function setYiiEnv($env)
	{
		defined('YII_DEBUG') OR define('YII_DEBUG', $env['YII_DEBUG']);
		defined('YII_ENV') OR define('YII_ENV', $env['YII_ENV']);
	}

	private static function setDirs($env)
	{
		define('APP_DIR', $env[strtoupper(APP) . '_DIR']);
		define('COMMON_DIR', $env['COMMON_DIR']);
		define('COMMON_DATA_DIR', $env['COMMON_DIR'] . DS . 'data');
		define('FRONTEND_DIR', $env['FRONTEND_DIR']);
		define('BACKEND_DIR', $env['BACKEND_DIR']);
		define('API_DIR', $env['API_DIR']);
		define('CONSOLE_DIR', $env['CONSOLE_DIR']);
		define('VENDOR_DIR', $env['VENDOR_DIR']);
		define('DOMAIN_DIR', $env['DOMAIN_DIR']);
	}
	
}

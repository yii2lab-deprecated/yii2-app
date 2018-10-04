<?php

namespace yii2lab\app\domain\helpers;

class Load
{

	const YII_CLASS = VENDOR_DIR . DS . 'yiisoft' . DS . 'yii2' . DS . 'Yii.php';
	
	public static function autoload()
	{
		require(__DIR__ . '/../../../../../autoload.php');
	}
	
	public static function helpers()
	{
		//$vendorDir = __DIR__ . '/../../../../..';
		//require($vendorDir . '/yii2lab/yii2-extension/src/registry/base/BaseRegistry.php');
		//require($vendorDir . '/yii2lab/yii2-db/src/domain/helpers/DbHelper.php');
		//require('BaseConfig.php');
		//require('Env.php');
		//require('Constant.php');
		//require('Db.php');
		//require('Config.php');
	}
	
	public static function yii($class)
	{
		if(empty($class)) {
			$class = self::YII_CLASS;
		}
		require($class);
	}
	
	public static function required()
	{
        require('Func.php');
	}

}

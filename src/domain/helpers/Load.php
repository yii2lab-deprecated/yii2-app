<?php

namespace yii2lab\app\domain\helpers;

class Load
{

	const YII_CLASS = VENDOR_DIR . DS . 'yiisoft' . DS . 'yii2' . DS . 'Yii.php';
	
	public static function helpers()
	{
		$vendorDir = __DIR__ . '/../../../../..';
		require($vendorDir . '/yii2lab/yii2-extension/src/registry/base/BaseRegistry.php');
		require('BaseConfig.php');
		require('Env.php');
		require('Constant.php');
		require('Func.php');
		require('Db.php');
		require('Config.php');
	}
	
	public static function autoload()
	{
		require(VENDOR_DIR . DS . 'autoload.php');
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
		require(VENDOR_DIR . DS . 'yii2lab/yii2-helpers/src' . DS . 'Func.php');
	}

}

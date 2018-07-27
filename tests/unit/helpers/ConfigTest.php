<?php

namespace tests\unit\helpers;

use yii2lab\test\Test\Unit;
use yii\helpers\ArrayHelper;
use yii2lab\app\domain\helpers\Config;
use yii2lab\app\domain\helpers\Env;
use yii2lab\test\helpers\DataHelper;

class ConfigTest extends Unit
{
	
	const PACKAGE = 'yii2lab/yii2-app';
	
	public function testLoadEnv()
	{
		$definition = DataHelper::load(self::PACKAGE, 'store/definitionEnvSelf.php');
		$config = Env::load($definition);
		
		$expected = DataHelper::loadForTest(self::PACKAGE, __METHOD__, $config);
		
		expect($expected)->equals($config);
	}
	
	public function testEnvGetDefinition()
	{
		$definitionGenerated = Env::getDefinition('vendor/yii2lab/yii2-app/tests/_application_test');
		$expected = DataHelper::loadForTest(self::PACKAGE, __METHOD__, $definitionGenerated);
		expect($expected)->equals($definitionGenerated);
		
		$definitionGenerated = Env::getDefinition(['vendor/yii2lab/yii2-app/tests/_application_test']);
		expect($expected)->equals($definitionGenerated);
	}
	
	public function testLoadConfig()
	{
		$env = DataHelper::load(self::PACKAGE, '_application_test/common/config/env.php');
		$envLocal = DataHelper::load(self::PACKAGE, '_application_test/common/config/env-local.php');
		$env = ArrayHelper::merge($env, $envLocal);
		$config = Config::load($env['config']);
		
		$expected = DataHelper::loadForTest(self::PACKAGE, __METHOD__, $config);
		
		unset($expected['basePath']);
		unset($expected['vendorPath']);
		unset($config['basePath']);
		unset($config['vendorPath']);
		expect($expected)->equals($config);
	}
	
}

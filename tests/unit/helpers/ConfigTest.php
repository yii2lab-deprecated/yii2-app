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
		$config = Env::loadData($definition);

		$expected = DataHelper::loadForTest(self::PACKAGE, __METHOD__, $config);
		
		$this->tester->assertEquals($expected, $config);
	}
	
	public function testEnvGetDefinition()
	{
		$definitionGenerated = Env::getDefinition('vendor/yii2lab/yii2-app/tests/_application_test');
		$expected = DataHelper::loadForTest(self::PACKAGE, __METHOD__, $definitionGenerated);
		$this->tester->assertEquals($expected, $definitionGenerated);
		
		$definitionGenerated = Env::getDefinition(['vendor/yii2lab/yii2-app/tests/_application_test']);
		$this->tester->assertEquals($expected, $definitionGenerated);
	}
	
	public function testLoadConfig()
	{
		$env = DataHelper::load(self::PACKAGE, '_application_test/common/config/env.php');
		$envLocal = DataHelper::load(self::PACKAGE, '_application_test/common/config/env-local.php');
		$env = ArrayHelper::merge($env, $envLocal);
		$config = Config::loadData($env['config']);
		
		$expected = DataHelper::loadForTest(self::PACKAGE, __METHOD__, $config);
		
		unset($expected['basePath']);
		unset($expected['vendorPath']);
		unset($config['basePath']);
		unset($config['vendorPath']);
		$this->tester->assertEquals($expected, $config);
	}
	
}

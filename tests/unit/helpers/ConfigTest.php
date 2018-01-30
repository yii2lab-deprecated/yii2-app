<?php

namespace tests\unit\helpers;

use Codeception\Test\Unit;
use yii\helpers\ArrayHelper;
use yii2lab\app\domain\helpers\Config;
use yii2lab\app\domain\helpers\Env;
use UnitTester;
use yii2lab\test\helpers\DataHelper;

/**
 * Class ConfigTest
 *
 * @package api\tests\unit\helpers
 *
 * @property UnitTester $tester
 */
class ConfigTest extends Unit
{
	
	const PACKAGE = 'yii2lab/yii2-app';
	
	public function testLoadEnv()
	{
		$definition = DataHelper::load(self::PACKAGE, 'store/definitionEnvSelf.php');
		$config = Env::load($definition);
		$expect = DataHelper::load(self::PACKAGE, 'store/resultEnv.php', $config);
		expect($expect)->equals($config);
	}
	
	public function testEnvGetDefinition()
	{
		$expect = DataHelper::load(self::PACKAGE, 'store/definitionEnv.php');
		$definitionGenerated = Env::getDefinition('vendor/yii2lab/yii2-app/tests/_application_test');
		expect($expect)->equals($definitionGenerated);
		
		$definitionGenerated = Env::getDefinition(['vendor/yii2lab/yii2-app/tests/_application_test']);
		expect($expect)->equals($definitionGenerated);
	}
	
	public function testLoadConfig()
	{
		$env = DataHelper::load(self::PACKAGE, '_application_test/common/config/env.php');
		$envLocal = DataHelper::load(self::PACKAGE, '_application_test/common/config/env-local.php');
		$env = ArrayHelper::merge($env, $envLocal);
		$config = Config::load($env['config']);
		$configExpect = DataHelper::load(self::PACKAGE, 'store/resultConfig.php', $config);
		expect($configExpect)->equals($config);
	}
	
}

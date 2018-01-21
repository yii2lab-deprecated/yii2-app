<?php
namespace api\tests\unit\helpers;

use Codeception\Test\Unit;
use yii\helpers\ArrayHelper;
use yii2lab\app\domain\helpers\Config;
use yii2lab\app\domain\helpers\Env;
use yii2lab\store\Store;

class ConfigTest extends Unit
{
	
	const DATA_PATH_ALIAS = '@vendor/yii2lab/yii2-app/tests/store/';
	
	public function testLoadConfig()
	{
		$env = $this->loadData('app/common/config/env.php');
		$envLocal = $this->loadData('app/common/config/env-local.php');
		$env = ArrayHelper::merge($env, $envLocal);
		$config = Config::load($env['config']);
		$configExpect = $this->loadData('resultConfig.php', $config);
		expect($configExpect)->equals($config);
	}
	
	public function testEnvGetDefinition()
	{
		$definition = $this->loadData('definitionEnv.php');
		$definitionGenerated = Env::getDefinition('vendor/yii2lab/yii2-app/tests/store/app');
		expect($definition)->equals($definitionGenerated);
		
		$definitionGenerated = Env::getDefinition(['vendor/yii2lab/yii2-app/tests/store/app']);
		expect($definition)->equals($definitionGenerated);
	}
	
	public function testLoadEnv()
	{
		$definition = $this->loadData('definitionEnv.php');
		$config = Env::load($definition);
		$configExpect = $this->loadData('resultEnv.php', $config);
		expect($configExpect)->equals($config);
	}
	
	private function loadData($filename, $defaultData = null) {
		$store = new Store('php');
		$configExpect = $store->load(self::DATA_PATH_ALIAS . $filename);
		if(empty($configExpect)) {
			$this->saveData($filename, $defaultData);
			return $defaultData;
		}
		return $configExpect;
	}
	
	private function saveData($filename, $data) {
		$store = new Store('php');
		$store->save(self::DATA_PATH_ALIAS . $filename, $data);
	}
	
}

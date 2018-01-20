<?php
namespace api\tests\unit\helpers;

use Codeception\Test\Unit;
use yii2lab\app\domain\helpers\Config;
use yii2lab\store\Store;

class ConfigTest extends Unit
{
	
	const DATA_PATH_ALIAS = '@vendor/yii2lab/yii2-app/tests/store/';
	
	public function testLoad()
	{
		$env = $this->loadData('app/common/config/env.php');
		$config = Config::load($env['config']);
		$configExpect = $this->loadData('resultConfig.php');
		expect($configExpect)->equals($config);
	}
	
	private function loadData($filename) {
		$store = new Store('php');
		$configExpect = $store->load(self::DATA_PATH_ALIAS . $filename);
		return $configExpect;
	}
	
	private function saveData($filename, $data) {
		$store = new Store('php');
		$store->save(self::DATA_PATH_ALIAS . $filename, $data);
	}
	
}

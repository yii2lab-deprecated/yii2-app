<?php

namespace yii2lab\app\domain\filters\config;

use yii\base\BaseObject;
use yii2lab\designPattern\filter\interfaces\FilterInterface;

class FixValidationKeyInTest extends BaseObject implements FilterInterface {

	public function run($config) {
		if(APP != CONSOLE && empty($config['components']['request']['cookieValidationKey'])) {
			$config['components']['request']['cookieValidationKey'] = 'testValidationKey'; // костыль, чтоб не выдавало ошибку при тестах в common
		}
		return $config;
	}
	
}

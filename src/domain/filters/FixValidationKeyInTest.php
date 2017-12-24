<?php

namespace yii2lab\app\domain\filters;

use yii\base\BaseObject;
use yii2lab\misc\interfaces\FilterInterface;

class FixValidationKeyInTest extends BaseObject implements FilterInterface {

	public function run($config) {
		if(APP == COMMON && YII_ENV_TEST) {
			$config['components']['request']['cookieValidationKey'] = 'testValidationKey'; // костыль, чтоб не выдавало ошибку при тестах в common
		}
		return $config;
	}
	
}

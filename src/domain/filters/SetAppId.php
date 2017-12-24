<?php

namespace yii2lab\app\domain\filters;

use yii\base\BaseObject;
use yii2lab\misc\interfaces\FilterInterface;

class SetAppId extends BaseObject implements FilterInterface {

	public function run($config) {
		if(!empty($config['id'])) {
			return $config;
		}
		$id = 'app-' . APP;
		if(YII_ENV == 'test') {
			$id .= '-test';
		}
		$config['id'] = $id;
		return $config;
	}
	
}

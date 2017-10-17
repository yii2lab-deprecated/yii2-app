<?php

namespace yii2lab\app\domain\repositories\disc;

use Yii;

class CookieRepository extends BaseConfigRepository {

	public $key = 'cookieValidationKey';

	public function generate($post) {
		$store = $this->storeInstance();
		$config = $store->load($this->file, $this->key);
		if(!empty($post['frontend_gen'])) {
			$config['frontend'] = Yii::$app->security->generateRandomString(32);
		}
		if(!empty($post['backend_gen'])) {
			$config['backend'] = Yii::$app->security->generateRandomString(32);
		}
		$store->update($this->file, $this->key, $config);
	}

}
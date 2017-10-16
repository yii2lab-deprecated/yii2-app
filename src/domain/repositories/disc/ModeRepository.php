<?php

namespace yii2lab\app\domain\repositories\disc;

use yii2lab\domain\BaseEntity;

class ModeRepository extends BaseConfigRepository {

	public $key = null;

	public function load() {
		$store = $this->storeInstance();
		$config = $store->load($this->file, $this->key);
		return $this->forgeEntity([
			'debug' => $config['YII_DEBUG'],
			'env' => $config['YII_ENV'],
		]);
	}

	public function save(BaseEntity $entity) {
		$entity->validate();
		$store = $this->storeInstance();
		$store->update($this->file, 'YII_DEBUG', $entity->debug);
		$store->update($this->file, 'YII_ENV', $entity->env);
	}
}
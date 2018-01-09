<?php

namespace yii2lab\app\domain\repositories\disc;

use yii2lab\domain\BaseEntity;

class ModeRepository extends BaseConfigRepository {

	public $key = null;

	public function load() {
		$store = $this->storeInstance();
		$config = $store->load($this->file, $this->key);
		return $this->forgeEntity([
			'debug' => $config['mode']['debug'],
			'env' => $config['mode']['env'],
		]);
	}

	public function save(BaseEntity $entity) {
		$entity->validate();
		$store = $this->storeInstance();
		$store->update($this->file, 'mode.debug', $entity->debug);
		$store->update($this->file, 'mode.env', $entity->env);
	}
}
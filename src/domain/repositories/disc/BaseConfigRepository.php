<?php

namespace yii2lab\app\domain\repositories\disc;

use yii2lab\domain\BaseEntity;
use yii2lab\domain\repositories\BaseRepository as YiiBaseRepository;
use yii2lab\extension\store\Store;

class BaseConfigRepository extends YiiBaseRepository {

	public $file = '@common/config/env-local.php';
	public $key;

	public function load() {
		$store = $this->storeInstance();
		$config = $store->load($this->file, $this->key);
		return $this->forgeEntity($config);
	}
	
	public function save(BaseEntity $entity) {
		$entity->validate();
		$store = $this->storeInstance();
		$store->update($this->file, $this->key, $entity->toArray());
	}

	protected function storeInstance() {
		$store = new Store('php');
		return $store;
	}

}
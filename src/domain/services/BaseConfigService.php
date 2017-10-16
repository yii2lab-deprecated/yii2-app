<?php

namespace yii2lab\app\domain\services;

use Yii;
use yii2lab\domain\services\BaseService;

class BaseConfigService extends BaseService {

	public function load() {
		return $this->repository->load();
	}

	public function save($data) {
		$entity = $this->domain->factory->entity->create($this->id, $data);
		return $this->repository->save($entity);
	}

}

<?php

namespace yii2lab\app\domain\services;

use Yii;
use yii2lab\domain\services\BaseService;

class UrlService extends BaseService {

	public function load() {
		return $this->repository->load();
	}

	public function save($data) {
		$entity = $this->domain->factory->entity->create('url', $data);
		return $this->repository->save($entity);
	}

}

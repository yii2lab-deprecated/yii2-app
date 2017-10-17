<?php

namespace yii2lab\app\domain\services;

use yii2lab\domain\exceptions\UnprocessableEntityHttpException;
use yii2lab\domain\helpers\ErrorCollection;

class CookieService extends BaseConfigService {

	public function generate($post) {
		$error = new ErrorCollection;
		if(empty($post['frontend_gen']) && empty($post['backend_gen'])) {
			$error->add('frontend_gen', 'app/cookie', 'select_any_error');
			$error->add('backend_gen', 'app/cookie', 'select_any_error');
			throw new UnprocessableEntityHttpException($error);
		}
		return $this->repository->generate($post);
	}
}

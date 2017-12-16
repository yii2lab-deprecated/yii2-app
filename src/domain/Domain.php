<?php

namespace yii2lab\app\domain;

use yii2lab\domain\enums\Driver;

class Domain extends \yii2lab\domain\Domain {
	
	public function config() {
		return [
			'repositories' => [
				'mode' => Driver::DISC,
				'url' => Driver::DISC,
				'remote' => Driver::DISC,
				'connection' => Driver::DISC,
				'cookie' => Driver::DISC,
			],
			'services' => [
				'mode',
				'url',
				'remote',
				'connection',
				'cookie',
			],
		];
	}
	
}
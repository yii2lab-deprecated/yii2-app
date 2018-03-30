<?php

namespace yii2lab\app\domain;

use yii2lab\domain\enums\Driver;

/**
 * Class Domain
 *
 * @package yii2lab\app\domain
 *
 * @property \yii2lab\app\domain\services\ModeService $mode
 * @property \yii2lab\app\domain\services\UrlService $url
 * @property \yii2lab\app\domain\services\RemoteService $remote
 * @property \yii2lab\app\domain\services\ConnectionService $connection
 * @property \yii2lab\app\domain\services\CookieService $cookie
 */
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
<?php

namespace yii2lab\app\admin\helpers;

use Yii;

// todo: отрефакторить - сделать нормальный интерфейс и родителя

class Navigation {
	
	static function getMenu() {
		return [
			'label' => t('app/main', 'title'),
			'icon' => 'cogs',
			//'access' => 'app.config',
			'encode' => false,
			'items' => [
				[
					'label' => ['app/url', 'title'],
					'url' => 'app/url',
				],
				[
					'label' => ['app/db', 'title'],
					'url' => 'app/db',
				],
				[
					'label' => ['app/server', 'title'],
					'url' => 'app/server',
				],
			],
		];
	}

}

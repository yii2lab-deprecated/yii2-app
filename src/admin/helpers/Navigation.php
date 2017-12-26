<?php

namespace yii2lab\app\admin\helpers;

use common\enums\rbac\PermissionEnum;

// todo: отрефакторить - сделать нормальный интерфейс и родителя

class Navigation {
	
	static function getMenu() {
		return [
			'label' => ['app/main', 'title'],
			'module' => 'app',
			'access' => PermissionEnum::APP_CONFIG,
			'icon' => 'sliders',
			'items' => [
				[
					'label' => ['app/mode', 'title'],
					'url' => 'app/mode',
				],
				[
					'label' => ['app/url', 'title'],
					'url' => 'app/url',
				],
				[
					'label' => ['app/connection', 'title'],
					'url' => 'app/connection',
				],
				[
					'label' => ['app/cookie', 'title'],
					'url' => 'app/cookie',
				],
				[
					'label' => ['app/server', 'title'],
					'url' => 'app/server',
				],
				[
					'label' => ['app/remote', 'title'],
					'url' => 'app/remote',
				],
			],
		];
	}

}

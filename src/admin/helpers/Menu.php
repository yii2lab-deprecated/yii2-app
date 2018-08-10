<?php

namespace yii2lab\app\admin\helpers;

use yii2lab\app\domain\enums\AppPermissionEnum;
use yii2lab\extension\menu\interfaces\MenuInterface;

class Menu implements MenuInterface {
	
	public function toArray() {
		return [
			'label' => ['app/main', 'title'],
			'module' => 'app',
			'access' => AppPermissionEnum::CONFIG,
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

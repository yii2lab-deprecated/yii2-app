<?php

use common\enums\rbac\PermissionEnum;
use yii2lab\app\domain\helpers\EnvService;

return [
	'leftMenu' => [
		[
			'label' => ['guide/main', 'title'],
			'url' => 'guide',
			'module' => 'guide',
			'visible' => YII_ENV_DEV,
		],
		[
			'label' => 'Gii',
			'url' => 'gii',
			'module' => 'gii',
			'access' => PermissionEnum::BACKEND_ALL,
			'visible' => YII_ENV_DEV,
		],
		[
			'label' => ['main', 'go_to_backend'],
			'url' => EnvService::getUrl(BACKEND),
			'access' => PermissionEnum::BACKEND_ALL,
			'visible' => APP != BACKEND,
		],
	],
];
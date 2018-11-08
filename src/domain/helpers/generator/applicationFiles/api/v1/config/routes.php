<?php

return [
	
	[
		'class' => 'yii2lab\app\domain\filters\config\LoadRouteConfig',
		'modules' => [
			'vendor/yii2module/yii2-account/src/api/v2',
			'vendor/yii2module/yii2-profile/src/api/v2',
            'vendor/yii2module/yii2-summary/src/api',
			'vendor/yii2lab/yii2-geo/src/api',
            'vendor/yii2lab/yii2-qr/src/api',
			'vendor/yii2woop/yii2-service/src/api/v3',
			'vendor/yii2woop/yii2-summary/src/api',
			'vendor/yii2woop/yii2-history/src/api',
			'vendor/yii2woop/yii2-bank/src/api/v2',
			'vendor/yii2woop/yii2-operation/src/api/v2',
		],
	],
];

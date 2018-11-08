<?php

return [
	'' => 'welcome',
	
	[
		'class' => 'yii2lab\app\domain\filters\config\LoadRouteConfig',
		'modules' => [
			'vendor/yii2module/yii2-guide/src/module',
			'vendor/yii2module/yii2-article/src/web',
		],
	],

];

<?php 

return [
	'commands' => [],
	'filters' => [
		[
			'class' => 'yii2lab\\app\\domain\\filters\\env\\LoadConfig',
			'paths' => [
				'vendor/yii2lab/yii2-app/tests/store/app/common/config',
				'vendor/yii2lab/yii2-app/src/application/common/config',
			],
		],
		'yii2lab\\app\\domain\\filters\\env\\YiiEnv',
		'yii2lab\\app\\domain\\filters\\env\\NormalizeDbConfig',
	],
];
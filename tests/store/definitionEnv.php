<?php 

return [
	'commands' => [],
	'filters' => [
		[
			'class' => 'yii2lab\\app\\domain\\filters\\env\\LoadConfig',
			'paths' => [
				TEST_APPLICATION_DIR . '/common/config',
				'vendor/yii2lab/yii2-app/src/application/common/config',
			],
		],
		'yii2lab\\app\\domain\\filters\\env\\YiiEnv',
		'yii2lab\\app\\domain\\filters\\env\\NormalizeDbConfig',
	],
];
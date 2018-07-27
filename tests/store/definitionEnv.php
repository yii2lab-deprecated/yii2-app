<?php 

return [
	'commands' => [],
	'filters' => [
		[
			'class' => 'yii2lab\\app\\domain\\filters\\env\\LoadConfig',
			'paths' => [
				'vendor/yii2lab/yii2-app/tests/_application_test/common/config',
				'vendor/yii2lab/yii2-app/src/application/common/config',
			],
		],
		'yii2lab\\app\\domain\\filters\\env\\YiiEnv',
	],
];
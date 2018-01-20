<?php

return [
	'vendor' => 'yii2module\vendor\console\Module',
	'tool' => 'yii2module\tool\console\Module',
	'encrypt' => 'yii2module\encrypt\console\Module',
	//'util' => 'yii2my\util\Module', // "yii2my/yii2-util": "0.*",
	'offline' => 'yii2module\offline\console\Module',
	'rbac' => 'yii2lab\rbac\console\Module',
	'cleaner' => 'yii2module\cleaner\console\Module',
	'environments' => 'yii2lab\init\console\Module',
	'fixtures' => 'yii2module\fixture\Module',
	'test' => 'yii2module\test\console\Module',
	'db' => [
		'class' => 'yii2lab\db\console\Module',
		'actions' => [
			'ImportFixture' => [
				'tableList' => [
					'user',
					'user_assignment',
					'rest',
				],
			],
			'common\init\db\Subject2user',
			'common\init\db\AuthAssignment2userAssignment',
			'common\init\db\AuthAssignment2userPoint',
			'SetGrant' => [
				'grantUser' => 'logging',
			],
			'SetSequence' => [
				'tableList' => [
					'user' => 'user_id_seq',
				],
			],
		],
	],
];

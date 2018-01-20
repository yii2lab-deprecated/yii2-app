<?php

return [
	'components' => [
		'user' => [
			'enableSession' => false, // ! important
		],
	],
	'controllerMap' => [
		'migrate' => [
			'class' => 'dee\console\MigrateController',
			'migrationPath' => '@console/migrations',
			'generatorTemplateFiles' => [
				'create_table' => '@yii2lab/migration/yii/views/createTableMigration.php',
			],
		],
	],
];

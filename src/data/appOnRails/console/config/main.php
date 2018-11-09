<?php

use yii2module\lang\domain\enums\LanguageEnum;

return [
	'language' => LanguageEnum::EN, // current Language
	'components' => [
		'user' => [
			'class' => 'yii2module\account\domain\v2\web\User',
			'enableSession' => false, // ! important
		],
	],
	'controllerMap' => [
		'migrate' => 'yii2lab\db\console\controllers\MigrateController',
	],
];

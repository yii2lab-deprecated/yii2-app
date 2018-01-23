<?php 

return [
	'config' => [
		'filters' => [
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-test/src/base/_application\\common',
				'name' => 'main',
				'withLocal' => true,
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-test/src/base/_application\\console',
				'name' => 'main',
				'withLocal' => true,
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadModuleConfig',
				'app' => 'vendor/yii2lab/yii2-test/src/base/_application\\common',
				'name' => 'modules',
				'withLocal' => true,
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadModuleConfig',
				'app' => 'vendor/yii2lab/yii2-test/src/base/_application\\console',
				'name' => 'modules',
				'withLocal' => true,
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-test/src/base/_application\\common',
				'name' => 'routes',
				'withLocal' => true,
				'assignTo' => 'components.urlManager.rules',
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-test/src/base/_application\\console',
				'name' => 'routes',
				'withLocal' => true,
				'assignTo' => 'components.urlManager.rules',
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-test/src/base/_application\\common',
				'name' => 'params',
				'withLocal' => true,
				'assignTo' => 'params',
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-test/src/base/_application\\console',
				'name' => 'params',
				'withLocal' => true,
				'assignTo' => 'params',
			],
			[
				'class' => 'yii2lab\\domain\\filters\\LoadDomainConfig',
				'app' => 'vendor/yii2lab/yii2-test/src/base/_application\\common',
				'name' => 'domains',
				'withLocal' => true,
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-test/src/base/_application\\common',
				'name' => 'install',
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-test/src/base/_application\\console',
				'name' => 'install',
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-test/src/base/_application\\common',
				'name' => 'test',
				'withLocal' => true,
				'isEnabled' => true,
			],
			[
				'class' => 'yii2lab\\app\\domain\\filters\\config\\LoadConfig',
				'app' => 'vendor/yii2lab/yii2-test/src/base/_application\\console',
				'name' => 'test',
				'withLocal' => true,
				'isEnabled' => true,
			],
			'yii2lab\\app\\domain\\filters\\config\\SetControllerNamespace',
			'yii2lab\\app\\domain\\filters\\config\\FixValidationKeyInTest',
			'yii2lab\\app\\domain\\filters\\config\\SetAppId',
			'yii2lab\\app\\domain\\filters\\config\\SetPath',
			'yii2module\\offline\\domain\\filters\\IsOffline',
			'yii2lab\\domain\\filters\\SetDomainTranslationConfig',
		],
	],
	'project' => 'test',
	'mode' => [
		'debug' => true,
		'env' => 'test',
	],
	'url' => [
		'frontend' => 'http://example.com/',
		'backend' => 'http://admin.example.com/',
		'api' => 'http://api.example.com/',
	],
	'cookieValidationKey' => [
		'frontend' => 'bBXEWnH5ERCG7SF3wxtbotYxq3W-Op7B',
		'backend' => 'zbfqVR5PhdO3E8Xi7DB4aoxmxSstJ6aI',
	],
	'domain' => [
		'driver' => [
			'primary' => 'disc',
			'slave' => 'ar',
		],
	],
	'servers' => [
		'db' => [
			'main' => [
				'driver' => 'mysql',
				'host' => 'localhost',
				'username' => 'root',
				'password' => '',
				'dbname' => 'example',
			],
			'test' => [
				'driver' => 'mysql',
				'host' => 'localhost',
				'username' => 'root',
				'password' => '',
				'dbname' => 'example_test',
			],
		],
	],
	'db' => [
		'main' => [
			'driver' => 'mysql',
			'host' => 'localhost',
			'username' => 'root',
			'password' => '',
			'dbname' => 'example',
			'tablePrefix' => '',
			'dsn' => 'mysql:host=localhost;dbname=example',
		],
		'test' => [
			'driver' => 'mysql',
			'host' => 'localhost',
			'username' => 'root',
			'password' => '',
			'dbname' => 'example_test',
			'tablePrefix' => '',
			'dsn' => 'mysql:host=localhost;dbname=example_test',
		],
	],
];
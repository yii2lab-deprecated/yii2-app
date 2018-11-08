<?php

use yii2lab\db\domain\enums\DbDriverEnum;
use yii2lab\app\domain\enums\YiiEnvEnum;

return [
	'title' => 'Custom',
	'filters' => [
		[
			'class' => 'yii2lab\init\domain\filters\store\Copy',
			'paths' => [
				'environments/common',
			],
		],
		[
			'class' => 'yii2lab\init\domain\filters\input\Url',
			'default' => [
				'frontend' => 'extended.tpl',
				'backend' => 'admin.extended.tpl',
				'api' => 'api.extended.tpl',
			],
		],
		[
			'class' => 'yii2lab\init\domain\filters\input\ServerDb',
			'default' => [
				'driver' => DbDriverEnum::MYSQL,
				'host' => 'localhost',
				'username' => 'root',
				'password' => '',
				'dbname' => 'wooppay_yii',
			],
		],
        [
            'class' => 'yii2lab\init\domain\filters\input\Custom',
            'title' => 'Core',
            'segment' => 'servers.core',
            'value' => [
                'domain' => 'http://api.core.yii/',
                'defaultVersion' => 5,
            ],
        ],
		[
			'class' => 'yii2lab\init\domain\filters\input\ServerMail',
			'default' => [
				'host' => 'mail',
				'port' => '25',
				'username' => 'info@demo.com',
				'password' => 'qwerty123',
			],
		],
		/*[
			'class' => 'yii2lab\init\domain\filters\input\Mode',
			'default' => [
				'env' => 'prod',
				'debug' => false,
			],
		],*/
        [
            'class' => 'yii2lab\init\domain\filters\input\Custom',
            'title' => 'Core',
            'segment' => 'mode',
            'value' => [
                'env' => YiiEnvEnum::DEV,
                'debug' => true,
            ],
        ],
		[
			'class' => 'yii2lab\init\domain\filters\input\CookieValidationKey',
			'length' => 32,
			'apps' => [
				'frontend',
				'backend',
			],
		],
		[
			'class' => 'yii2lab\init\domain\filters\input\Domain',
			'driver' => [
				'primary' => 'core',
				'slave' => 'ar',
			],
		],
		[
			'class' => 'yii2lab\init\domain\filters\input\ServerStatic',
			'default' => [
				// todo: выпилить publicPath
				// todo: сделать профили
				'publicPath' => '@frontend/web/',
				'domain' => 'http://extended.tpl/',
				'driver' => 'local',
				'connection' => [
					'path' => '@frontend/web',
				],
				/*'driver' => 'ftp',
				'connection' => [
					'host' => 'localhost',
					'username' => 'static.extended.tpl',
					'password' => '111',
					'root' => '/frontend/web',
				],*/
			],
		],
		[
			'class' => 'yii2lab\init\domain\filters\store\SetWritable',
			'target' => [
				'frontend',
				'backend',
				'api',
				'console',
			],
			'paths' => [
				'frontend/web/images',
				'common/runtime',
				'{app}/runtime',
				'{app}/web/assets',
			],
			'ignorePaths' => [
				'console/web/assets',
			],
		],
		[
			'class' => 'yii2lab\init\domain\filters\store\SetExecutable',
			'paths' => [
				'yii',
				'yii_test',
			],
		],
		[
			'class' => 'yii2lab\init\domain\filters\input\Custom',
			'title' => 'Encrypt profiles',
			'segment' => 'encrypt.profiles',
			'value' => [
				'default' => [
					'password' => 'qwerty123',
					'iv' => 'ZZZZZZZZZZZZZZZZ',
				],
			],
		],
		/*[
			'class' => 'yii2lab\init\domain\filters\input\Custom',
			'title' => 'REST API',
			'segment' => 'api',
			'value' => [
				'defaultVersion' => 1,
			],
		],*/
		[
			'class' => 'yii2lab\init\domain\filters\store\EnvLocalConfig',
		],
	],
];

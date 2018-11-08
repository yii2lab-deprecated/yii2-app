<?php

use yii2lab\app\domain\commands\ApiVersion;
use yii2lab\app\domain\commands\RunBootstrap;
use yii2lab\app\domain\filters\config\LoadConfig;
use yii2lab\app\domain\filters\config\LoadModuleConfig;
use yii2lab\domain\filters\LoadDomainConfig;
use yii2lab\app\domain\enums\YiiEnvEnum;
use yii2lab\app\domain\filters\config\LoadRouteConfig;

return [
	/*'yii' => [
		'class' => VENDOR_DIR . DS . 'yii2lab/yii2-domain/src/yii2' . DS . 'Yii.php',
	],*/
	'app' => [
		'commands' => [
			[
				'class' => RunBootstrap::class,
				'app' => COMMON,
			],
			[
				'class' => RunBootstrap::class,
				'app' => APP,
			],
			[
				'class' => ApiVersion::class,
				'isEnabled' => APP == API,
			],
            [
                'class' => 'yii2lab\domain\filters\DefineDomainLocator',
                'filters' => [
                    [
                        'class' => LoadDomainConfig::class,
                        'app' => COMMON,
                        'name' => 'domains',
                        'withLocal' => true,
                    ],
                    [
                        'class' => LoadDomainConfig::class,
                        'app' => APP,
                        'name' => 'domains',
                        'withLocal' => true,
                    ],
                ],
            ],
            /*[
                'class' => 'yii2module\offline\domain\filters\IsOffline',
                'exclude' => [
                    CONSOLE,
                    BACKEND,
                ],
            ],*/
            [
                'class' => 'yii2lab\db\domain\filters\migration\SetPath',
                'path' => [
                    '@vendor/yii2module/yii2-account/src/domain/v2/migrations',
                    '@vendor/yii2module/yii2-profile/src/domain/v2/migrations',
                    '@vendor/yii2module/yii2-article/src/domain/migrations',
                    '@vendor/yii2module/yii2-rest-client/src/migrations',
                    '@vendor/yii2lab/yii2-qr/src/domain/migrations',
                    '@vendor/yii2lab/yii2-geo/src/domain/migrations',
                    //'@vendor/yii2lab/yii2-notify/src/migrations',
                ],
                'scan' => [
                    '@domain',
                ],
            ],
		],
	],
	'config' => [
		'filters' => [
			[
				'class' => LoadConfig::class,
				'app' => COMMON,
				'name' => 'main',
				'withLocal' => true,
			],
			[
				'class' => LoadConfig::class,
				'app' => APP,
				'name' => 'main',
				'withLocal' => true,
			],
			
			[
				'class' => LoadModuleConfig::class,
				'app' => COMMON,
				'name' => 'modules',
				'withLocal' => true,
			],
			[
				'class' => LoadModuleConfig::class,
				'app' => APP,
				'name' => 'modules',
				'withLocal' => true,
			],

            [
                'class' => LoadRouteConfig::class,
                'app' => COMMON,
                'name' => 'routes',
                'withLocal' => true,
            ],
            [
                'class' => LoadRouteConfig::class,
                'app' => APP,
                'name' => 'routes',
                'withLocal' => true,
            ],

			[
				'class' => LoadConfig::class,
				'app' => COMMON,
				'name' => 'params',
				'withLocal' => true,
				'assignTo' => 'params',
			],
			[
				'class' => LoadConfig::class,
				'app' => APP,
				'name' => 'params',
				'withLocal' => true,
				'assignTo' => 'params',
			],
			
			[
				'class' => LoadConfig::class,
				'app' => COMMON,
				'name' => 'install',
			],
			[
				'class' => LoadConfig::class,
				'app' => APP,
				'name' => 'install',
			],
			
			[
				'class' => LoadConfig::class,
				'app' => COMMON,
				'name' => 'test',
				'withLocal' => true,
				'isEnabled' => YII_ENV == YiiEnvEnum::TEST,
			],
			[
				'class' => LoadConfig::class,
				'app' => APP,
				'name' => 'test',
				'withLocal' => true,
				'isEnabled' => YII_ENV == YiiEnvEnum::TEST,
			],
			
            'yii2lab\app\domain\filters\config\StandardConfigMutations',
		],
	],
];
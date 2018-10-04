<?php

use yii2lab\app\domain\commands\RunBootstrap;
use yii2lab\app\domain\enums\YiiEnvEnum;
use yii2lab\app\domain\filters\config\LoadConfig;

return [
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
        ],
    ],
    'config' => [
        'filters' => [
            [
                'class' => LoadConfig::class,
                'app' => COMMON,
                'name' => 'main',
                'withLocal' => true,
                'isEnabled' => YII_ENV != YiiEnvEnum::TEST,
            ],
            [
                'class' => LoadConfig::class,
                'app' => APP,
                'name' => 'main',
                'withLocal' => true,
                'isEnabled' => YII_ENV != YiiEnvEnum::TEST,
            ],

            [
                'class' => LoadConfig::class,
                'app' => COMMON,
                'name' => 'test-local',
                'withLocal' => false,
                'isEnabled' => YII_ENV == YiiEnvEnum::TEST,
            ],

            [
                'class' => LoadConfig::class,
                'app' => APP,
                'name' => 'test-local',
                'withLocal' => false,
                'isEnabled' => YII_ENV == YiiEnvEnum::TEST,
            ],
        ],
    ],
];

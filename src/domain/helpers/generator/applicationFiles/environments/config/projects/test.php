<?php

use yii2lab\app\domain\enums\YiiEnvEnum;

$config = [
    'title' => 'Test',
    'filters' => [
        [
            'class' => 'yii2lab\init\domain\filters\input\Custom',
            'title' => 'Custom env config',
            'segment' => null,
            'value' => [
                'servers' => [
                    'db' => [
                        'main' => [
                            'driver' => 'mysql',
                            'host' => 'localhost',
                            'username' => 'root',
                            'password' => '',
                            'dbname' => 'extended_tpltest',
                        ],
                    ],
                    'core' => [
                        'domain' => 'http://api.core.yii/',
                        'defaultVersion' => 1,
                    ],
                    'mail' => [
                        'host' => 'mail',
                        'port' => '25',
                        'username' => 'info@demo.com',
                        'password' => 'qwerty123',
                    ],
                    'static' => [
                        'publicPath' => '@frontend/web/',
                        'domain' => 'http://extended.tpltest/',
                        'driver' => 'local',
                        'connection' => [
                            'path' => '@frontend/web',
                        ],
                    ],
                ],
                'url' => [
                    'frontend' => 'http://extended.tpltest/',
                    'backend' => 'http://admin.extended.tpltest/',
                    'api' => 'http://api.extended.tpltest/',
                ],
                'mode' => [
                    'env' => YiiEnvEnum::DEV,
                    'debug' => false,
                ],
            ],
        ],
    ],
];

$commonConfig = include(realpath(__DIR__ . '/../snipet/commonFilters.php'));
$config['filters'] = array_merge($config['filters'], $commonConfig);

return $config;

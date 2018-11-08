<?php

use yii2lab\app\domain\enums\YiiEnvEnum;

$config = [
    'title' => 'Develop',
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
                            'dbname' => 'extended_tpl',
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
                        'domain' => 'http://extended.tpl/',
                        'driver' => 'local',
                        'connection' => [
                            'path' => '@frontend/web',
                        ],
                    ],
                ],
                'url' => [
                    'frontend' => 'http://extended.tpl/',
                    'backend' => 'http://admin.extended.tpl/',
                    'api' => 'http://api.extended.tpl/',
                ],
                'mode' => [
                    'env' => YiiEnvEnum::DEV,
                    'debug' => true,
                ],
            ],
        ],
    ],
];

$commonConfig = include(realpath(__DIR__ . '/../snipet/commonFilters.php'));
$config['filters'] = array_merge($config['filters'], $commonConfig);

return $config;

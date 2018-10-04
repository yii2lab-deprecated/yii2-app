<?php

use yii2lab\app\domain\commands\RunBootstrap;

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
            'yii2lab\app\domain\filters\config\NativeYiiTemplateConfig',
        ],
    ],
];

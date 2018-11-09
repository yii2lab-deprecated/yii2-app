<?php
return [
    'rAdministrator' => [
        'type' => 1,
        'description' => 'Администратор системы',
        'children' => [
            'rUser',
            'rGuest',
            'rUnknownUser',
            'rModerator',
            'rDeveloper',
            'oRestClientAll',
            'oGiiManage',
            'oLangManage',
            'oRbacManage',
            'oBackendAll',
        ],
    ],
    'rUser' => [
        'type' => 1,
        'description' => 'Идентифицированный пользователь',
    ],
    'rGuest' => [
        'type' => 1,
        'description' => 'Гость системы',
    ],
    'rUnknownUser' => [
        'type' => 1,
        'description' => 'Не идентифицированный пользователь',
    ],
    'rRoot' => [
        'type' => 1,
        'description' => 'Корневой администратор системы',
        'children' => [
            'oBackendAll',
        ],
    ],
    'rModerator' => [
        'type' => 1,
        'description' => 'Модератор системы',
        'children' => [
            'oLangManage',
            'oBackendAll',
        ],
    ],
    'rDeveloper' => [
        'type' => 1,
        'description' => 'Разработчик',
        'children' => [
            'oRestClientAll',
            'oGiiManage',
            'oRbacManage',
            'oBackendAll',
        ],
    ],
    'oRestClientAll' => [
        'type' => 2,
        'description' => 'Доступ к REST-клиенту',
    ],
    'oGiiManage' => [
        'type' => 2,
        'description' => 'Доступ к Yii генератору',
    ],
    'oLangManage' => [
        'type' => 2,
        'description' => 'Управление языками',
    ],
    'oRbacManage' => [
        'type' => 2,
        'description' => 'Управление RBAC',
    ],
    'oBackendAll' => [
        'type' => 2,
        'description' => 'Доступ в админ панель',
    ],
];

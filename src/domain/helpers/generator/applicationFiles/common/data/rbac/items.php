<?php
return [
	'rAdministrator' => [
		'type' => 1,
		'description' => 'Администратор системы',
		'children' => [
			'rUser',
			'rGuest',
			'oEncryptManage',
			'oVendorManage',
			'oGeoCityManage',
			'oGeoCountryManage',
			'oGeoCurrencyManage',
			'oGeoRegionManage',
			'rUnknownUser',
			'rModerator',
			'rDeveloper',
			'oArticlePostManage',
			'oRestClientAll',
			'oOfflineManage',
			'oLogreaderManage',
			'oGiiManage',
			'oLangManage',
			'oCleanerManage',
			'oNotifyManage',
			'oGuideModify',
			'oRbacManage',
			'oAppConfig',
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
	'oEncryptManage' => [
		'type' => 2,
		'description' => 'Шифрование данных',
	],
	'oVendorManage' => [
		'type' => 2,
		'description' => 'Управление композер-пакетами',
	],
	'rRoot' => [
		'type' => 1,
		'description' => 'Корневой администратор системы',
		'children' => [
			'oBackendAll',
		],
	],
	'oGeoCityManage' => [
		'type' => 2,
		'description' => 'Управление городами',
	],
	'oGeoCountryManage' => [
		'type' => 2,
		'description' => 'Управление странами',
	],
	'oGeoCurrencyManage' => [
		'type' => 2,
		'description' => 'Управление валютами',
	],
	'oGeoRegionManage' => [
		'type' => 2,
		'description' => 'Управление регионами',
	],
	'rModerator' => [
		'type' => 1,
		'description' => 'Модератор системы',
		'children' => [
			'oGeoCityManage',
			'oGeoCountryManage',
			'oGeoCurrencyManage',
			'oGeoRegionManage',
			'oArticlePostManage',
			'oLangManage',
			'oBackendAll',
		],
	],
	'rDeveloper' => [
		'type' => 1,
		'description' => 'Разработчик',
		'children' => [
			'oEncryptManage',
			'oVendorManage',
			'oRestClientAll',
			'oOfflineManage',
			'oLogreaderManage',
			'oGiiManage',
			'oCleanerManage',
			'oNotifyManage',
			'oGuideModify',
			'oRbacManage',
			'oAppConfig',
			'oBackendAll',
		],
	],
	'oArticlePostManage' => [
		'type' => 2,
		'description' => 'Управление статьями сайта',
	],
	'oArticlePostDelete' => [
		'type' => 2,
		'description' => 'Удаление статьи',
	],
	'oRestClientAll' => [
		'type' => 2,
		'description' => 'Доступ к REST-клиенту',
	],
	'oOfflineManage' => [
		'type' => 2,
		'description' => 'Управление статусом оффлайн',
	],
	'oLogreaderManage' => [
		'type' => 2,
		'description' => 'Управление логами',
	],
	'oGiiManage' => [
		'type' => 2,
		'description' => 'Доступ к Yii генератору',
	],
	'oLangManage' => [
		'type' => 2,
		'description' => 'Управление языками',
	],
	'oCleanerManage' => [
		'type' => 2,
		'description' => 'Управление чистильщиком',
	],
	'oNotifyManage' => [
		'type' => 2,
		'description' => 'Управление уведомлениями',
	],
	'oGuideModify' => [
		'type' => 2,
		'description' => 'Редактирование руководства',
		'ruleName' => 'isWritable',
	],
	'oRbacManage' => [
		'type' => 2,
		'description' => 'Управление RBAC',
	],
	'oAppConfig' => [
		'type' => 2,
		'description' => 'Вносить изменения в базовые конфигурации',
	],
	'oBackendAll' => [
		'type' => 2,
		'description' => 'Доступ в админ панель',
	],
];

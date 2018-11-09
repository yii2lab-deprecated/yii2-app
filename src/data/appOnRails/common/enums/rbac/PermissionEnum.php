<?php

namespace common\enums\rbac;

use yii2lab\extension\enum\base\BaseEnum;

/**
 * Class PermissionEnum
 *
 * Этот класс был сгенерирован автоматически.
 * Не вносите в данный файл изменения, они затрутся при очередной генерации.
 * Изменить набор констант можно через управление RBAC в админке.
 *
 * @package common\enums\rbac
 */
class PermissionEnum extends BaseEnum {
	
	// Шифрование данных
	const ENCRYPT_MANAGE = 'oEncryptManage';
	
	// Управление композер-пакетами
	const VENDOR_MANAGE = 'oVendorManage';
	
	// Управление городами
	const GEO_CITY_MANAGE = 'oGeoCityManage';
	
	// Управление странами
	const GEO_COUNTRY_MANAGE = 'oGeoCountryManage';
	
	// Управление валютами
	const GEO_CURRENCY_MANAGE = 'oGeoCurrencyManage';
	
	// Управление регионами
	const GEO_REGION_MANAGE = 'oGeoRegionManage';
	
	// Управление статьями сайта
	const ARTICLE_POST_MANAGE = 'oArticlePostManage';
	
	// Удаление статьи
	const ARTICLE_POST_DELETE = 'oArticlePostDelete';
	
	// Доступ к REST-клиенту
	const REST_CLIENT_ALL = 'oRestClientAll';
	
	// Управление статусом оффлайн
	const OFFLINE_MANAGE = 'oOfflineManage';
	
	// Управление логами
	const LOGREADER_MANAGE = 'oLogreaderManage';
	
	// Доступ к Yii генератору
	const GII_MANAGE = 'oGiiManage';
	
	// Управление языками
	const LANG_MANAGE = 'oLangManage';
	
	// Управление чистильщиком
	const CLEANER_MANAGE = 'oCleanerManage';
	
	// Управление уведомлениями
	const NOTIFY_MANAGE = 'oNotifyManage';
	
	// Редактирование руководства
	const GUIDE_MODIFY = 'oGuideModify';
	
	// Управление RBAC
	const RBAC_MANAGE = 'oRbacManage';
	
	// Вносить изменения в базовые конфигурации
	const APP_CONFIG = 'oAppConfig';
	
	// Доступ в админ панель
	const BACKEND_ALL = 'oBackendAll';
	
}
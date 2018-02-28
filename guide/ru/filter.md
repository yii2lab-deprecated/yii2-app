Фильтры
===

## yii2lab\app\domain\filters\config\LoadConfig

загрузчик конфигов.

Параметры:

* `class` - класс фильтра
* `app` - имя приложения, из которого брать конфиг
* `name` - имя конфига
* `withLocal` - грузить вместе с файлом `*-local.php`

## yii2lab\app\domain\filters\config\LoadModuleConfig

загрузчик конфига модулей

Основан на фильтре `yii2lab\app\domain\filters\config\LoadConfig`.

Параметры:

Те же, что у [LoadConfig](#yii2lab\app\domain\filters\config\loadconfig)

## yii2lab\app\domain\filters\config\SetControllerNamespace

устанавливает путь к контроллерам приложения, если не указано

## yii2lab\app\domain\filters\config\FixValidationKeyInTest

Фикс отсутствия ключей валидации куки при тестах

## yii2lab\app\domain\filters\config\SetAppId

Назначает ID приложения, если не указано

## yii2lab\app\domain\filters\config\SetPath

Назначает `basePath` и `vendorPath`, если не указано

## yii2lab\app\domain\filters\config\LoadRouteConfig

Загрузчик конфига роутов.
Назначает роуты в общий конфиг в `components.urlManager.rules`.

Может импортировать конфиги роутов из модулей.
Например, если надо хранить роуты в модуле,
то создаем в модуле папку `config` а в ней файл `routes.php` с подобным содержимым:

```php
return [
    'guide/search'=> 'guide/default/search',
    'guide/<project_id>/chapter/<id>'=> 'guide/chapter/view',
    'guide/<project_id>/<id>/update'=> 'guide/article/update',
    'guide/<project_id>/<id>/delete'=> 'guide/article/delete',
    'guide/<project_id>/<id>/code'=> 'guide/article/code',
    'guide/<project_id>/<id>'=> 'guide/article/view',
    'guide/<project_id>'=> 'guide/article',
];
```

Затем, в приложении, в конфиге роутов можете импортировать роуты из модуля:

```php
return [
	'' => 'welcome',
	[
		'class' => 'yii2lab\app\domain\filters\config\LoadRouteConfig',
		'modules' => [
			'frontend/modules/guide',
		],
	],
];
```

Фильтры
===

## Основное

У всех, представленных ниже фильтров неймспейс такой: `yii2lab\app\domain\filters\config\*`.

## Фильтры

### LoadConfig

загрузчик конфигов.

Параметры:

* `class` - класс фильтра
* `app` - имя приложения, из которого брать конфиг
* `name` - имя конфига
* `withLocal` - грузить вместе с файлом `*-local.php`

> Note: Если необходимо назначить конфиг, начиная с корня, 
то создаем сегмент `@config`, и в нем прописываем конфиг.

### LoadModuleConfig

загрузчик конфига модулей

Основан на фильтре `yii2lab\app\domain\filters\config\LoadConfig`.

Параметры:

Те же, что у [LoadConfig](#yii2lab\app\domain\filters\config\loadconfig)

### SetControllerNamespace

устанавливает путь к контроллерам приложения, если не указано

### FixValidationKeyInTest

Фикс отсутствия ключей валидации куки при тестах

### SetAppId

Назначает ID приложения, если не указано

### SetPath

Назначает `basePath` и `vendorPath`, если не указано

### LoadRouteConfig

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

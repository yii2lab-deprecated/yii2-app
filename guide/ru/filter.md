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

фикс отсутствия ключей валидации куки при тестах

## yii2lab\app\domain\filters\config\SetAppId

назначает ID приложения, если не указано

## yii2lab\app\domain\filters\config\SetPath

назначает `basePath` и `vendorPath`, если не указано

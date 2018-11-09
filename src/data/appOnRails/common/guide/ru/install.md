Установка
==============

## Проект

Создать проект из шаблона

```
composer create-project --prefer-dist yii2template/yii2-extended .
```

Или клонировать уже существующий

```
git clone ...
```

## Зависимости

Установить ``oauth-token`` от ``Github``

```
composer config -g github-oauth.github.com <токен>
```

Удалить плагин ``Composer`` для зависимостей ``bower`` и ``npm``

```
composer global remove "fxp/composer-asset-plugin"
```

Загрузить зависимости для разработки

```
composer install
```

Если разворачиваете на боевом сервере, то

```
composer install --no-dev
```

## Окружение

Создать БД:

* для разработки
* для тестирования

Инициализировать проект

```
php init
```

Выполнить миграции основной и тестовой БД

```
php yii migrate
```

```
php yii_test migrate
```

Выполнить иморт демо-данных в БД для разработки

```
php yii db/fixture
```

Назначить домены

* API - api/web
* админка - backend/web
* сайт - frontend/web

## Запуск

Данные для доступа:

* логин: **77771111111**
* пароль: **Wwwqqq111**

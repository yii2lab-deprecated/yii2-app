Установка
===

Устанавливаем зависимость:

```
composer require yii2lab/yii2-app
```

Во входных точках `index.php` пишем:

```php
<?php

$name = 'frontend';
$path = '../..';

@include_once(__DIR__ . '/' . $path . '/vendor/yii2lab/yii2-app/src/App.php');

if(!class_exists(App::class)) {
	die('Run composer install');
}

App::run($name);
```

В тестовых входных точках `index-test.php` пишем:

```php
<?php

$name = 'frontend';
$path = '../..';
defined('YII_ENV') || define('YII_ENV', 'test');

@include_once(__DIR__ . '/' . $path . '/vendor/yii2lab/yii2-app/src/App.php');

if(!class_exists(App::class)) {
	die('Run composer install');
}

App::run($name);
```

Для тестовой входной точки `frontend/tests/_bootstrap.php`:

```php
<?php

$name = 'frontend';
$path = '../..';
defined('YII_ENV') || define('YII_ENV', 'test');

@include_once(__DIR__ . '/' . $path . '/vendor/yii2lab/yii2-app/src/App.php');

if(!class_exists(App::class)) {
	die('Run composer install');
}

App::init($name);
```

Для консольной входной точки `yii`:

```php
#!/usr/bin/env php
<?php

$name = 'console';
$path = '.';

@include_once(__DIR__ . '/' . $path . '/vendor/yii2lab/yii2-app/src/App.php');

if(!class_exists(App::class)) {
	die('Run composer install');
}

App::run($name);
```

Для тестовой консольной входной точки `yii-test`:

```php
#!/usr/bin/env php
<?php

$name = 'console';
$path = '.';
defined('YII_ENV') || define('YII_ENV', 'test');

@include_once(__DIR__ . '/' . $path . '/vendor/yii2lab/yii2-app/src/App.php');

if(!class_exists(App::class)) {
	die('Run composer install');
}

App::run($name);
```

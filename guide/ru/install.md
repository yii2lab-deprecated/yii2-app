Установка
===

Устанавливаем зависимость:

```
composer require yii2lab/yii2-app
```

Во входных точках `index.php` пишем:

```php
<?php

use yii2lab\app\App;

$name = 'frontend';
$path = '../..';

require_once(__DIR__ . '/' . $path . '/vendor/yii2lab/yii2-app/src/App.php');

App::run($name);
```

В тестовых входных точках `index-test.php` пишем:

```php
<?php

use yii2lab\app\App;

$name = 'frontend';
$path = '../..';
defined('YII_ENV') || define('YII_ENV', 'test');

require_once(__DIR__ . '/' . $path . '/vendor/yii2lab/yii2-app/src/App.php');

App::run($name);
```

Для тестовой входной точки `frontend/tests/_bootstrap.php`:

```php
<?php

use yii2lab\app\App;

$name = 'frontend';
$path = '../..';
defined('YII_ENV') || define('YII_ENV', 'test');

require_once(__DIR__ . '/' . $path . '/vendor/yii2lab/yii2-app/src/App.php');

App::init($name);
```

Для консольной входной точки `yii`:

```php
#!/usr/bin/env php
<?php

use yii2lab\app\App;

$name = 'console';
$path = '.';

require_once(__DIR__ . '/' . $path . '/vendor/yii2lab/yii2-app/src/App.php');

App::run($name);
```

Для тестовой консольной входной точки `yii-test`:

```php
#!/usr/bin/env php
<?php

use yii2lab\app\App;

$name = 'console';
$path = '.';
defined('YII_ENV') || define('YII_ENV', 'test');

require_once(__DIR__ . '/' . $path . '/vendor/yii2lab/yii2-app/src/App.php');

App::run($name);
```

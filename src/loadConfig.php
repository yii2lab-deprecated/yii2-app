<?php

namespace yii2lab\app;

use yii2lab\app\domain\helpers\Config;
use yii2lab\app\domain\helpers\Env;

Env::init('vendor/yii2lab/yii2-app/tests/store/app/common/config');
$definition = Env::get('config');
return Config::load($definition);
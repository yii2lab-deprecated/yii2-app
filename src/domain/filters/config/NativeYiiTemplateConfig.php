<?php

namespace yii2lab\app\domain\filters\config;

use yii2lab\app\domain\enums\YiiEnvEnum;
use yii2lab\extension\scenario\base\BaseGroupScenario;

class NativeYiiTemplateConfig extends BaseGroupScenario {

    public $filters = [
	    [
		    'class' => LoadConfig::class,
		    'app' => COMMON,
		    'name' => 'main',
		    'withLocal' => true,
		    'isEnabled' => YII_ENV != YiiEnvEnum::TEST,
	    ],
	    [
		    'class' => LoadConfig::class,
		    'app' => APP,
		    'name' => 'main',
		    'withLocal' => true,
		    'isEnabled' => YII_ENV != YiiEnvEnum::TEST,
	    ],
	
	    [
		    'class' => LoadConfig::class,
		    'app' => COMMON,
		    'name' => 'test-local',
		    'withLocal' => false,
		    'isEnabled' => YII_ENV == YiiEnvEnum::TEST,
	    ],
	
	    [
		    'class' => LoadConfig::class,
		    'app' => APP,
		    'name' => 'test-local',
		    'withLocal' => false,
		    'isEnabled' => YII_ENV == YiiEnvEnum::TEST,
	    ],
    ];

}

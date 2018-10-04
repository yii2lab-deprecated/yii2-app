<?php

namespace yii2lab\app\domain\filters\config;

use yii2lab\extension\scenario\base\BaseGroupScenario;

class StandardConfigMutations extends BaseGroupScenario {

    public $filters = [
        'yii2lab\app\domain\filters\config\SetControllerNamespace',
        'yii2lab\app\domain\filters\config\FixValidationKeyInTest',
        'yii2lab\app\domain\filters\config\SetAppId',
        'yii2lab\app\domain\filters\config\SetPath',
    ];

}

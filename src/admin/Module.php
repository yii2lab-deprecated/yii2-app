<?php

namespace yii2lab\app\admin;

use yii\base\Module as YiiModule;
use yii2lab\app\domain\enums\AppPermissionEnum;
use yii2lab\extension\web\helpers\Behavior;

/**
 * dashboard module definition class
 */
class Module extends YiiModule
{

    public function behaviors()
    {
        return [
            'access' => Behavior::access(AppPermissionEnum::CONFIG),
        ];
    }
}

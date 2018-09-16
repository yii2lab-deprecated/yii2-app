<?php

namespace yii2lab\app\domain\filters\config;

use yii2lab\extension\scenario\base\BaseScenario;
use yii2lab\extension\scenario\helpers\ScenarioHelper;

class StandardConfigMutations extends BaseScenario {

    public $filters = [
        'yii2lab\app\domain\filters\config\SetControllerNamespace',
        'yii2lab\app\domain\filters\config\FixValidationKeyInTest',
        'yii2lab\app\domain\filters\config\SetAppId',
        'yii2lab\app\domain\filters\config\SetPath',
    ];

	public function run() {
        $config = $this->getData();
        $filterCollection = ScenarioHelper::forgeCollection($this->filters);
        $config = ScenarioHelper::runAll($filterCollection, $config);
        $this->setData($config);
	}
	
}

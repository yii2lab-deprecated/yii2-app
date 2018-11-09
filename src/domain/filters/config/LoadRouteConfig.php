<?php

namespace yii2lab\app\domain\filters\config;

use yii2lab\extension\common\helpers\ClassHelper;
use yii2lab\extension\yii\helpers\FileHelper;
use yii2mod\helpers\ArrayHelper;

class LoadRouteConfig extends LoadConfig {
	
	public $assignTo = 'components.urlManager.rules';
	
	public function run() {
		parent::run();
		$config = $this->getData();
		$rules = ArrayHelper::getValue($config, $this->assignTo);
		$newRules = [];
		foreach ($rules as $key => $value) {
			$valueNormalized = ClassHelper::normalizeComponentConfig($value);
			$isImport = $key == '@import';
			$isImportOld = isset($valueNormalized['class']) && $valueNormalized['class'] == static::class;
			if($isImport || $isImportOld) {
				if($isImportOld) {
					$value = $value['modules'];
				}
				$loadedRules = $this->load($value);
				$newRules = ArrayHelper::merge($newRules, $loadedRules);
			} else {
				$newRules[$key] = $value;
			}
		}
		ArrayHelper::setValue($config, $this->assignTo, $newRules);
		$this->setData($config);
	}
	
    private function load($modules) {
        $newRules = [];
        foreach ($modules as $path) {
            if(is_string($path)) {
	            $dir = FileHelper::getAlias($path);
	            $file = $dir . DS . 'config/routes.php';
                $loadedRules = @include($file);
                if(!empty($loadedRules)) {
                    $newRules = ArrayHelper::merge($newRules, $loadedRules);
                }
            }
        }
        return $newRules;
    }
}

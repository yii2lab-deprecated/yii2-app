<?php

namespace yii2lab\app\admin\forms;

use yii2lab\domain\base\Model;

class ModeForm extends Model {

	public $debug;
	public $env;
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'debug' => t('app/mode', 'debug'),
			'env' => t('app/mode', 'env'),
		];
	}
}
<?php

namespace yii2lab\app\admin\forms;

use Yii;
use yii2lab\domain\base\Model;
use yii2lab\misc\enums\YiiEnvEnum;

class ModeForm extends Model {

	public $debug;
	public $env;
	
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['env'], 'required'],
			['debug', 'boolean'],
			['env', 'in', 'range' => YiiEnvEnum::values()],
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'debug' => Yii::t('app/mode', 'debug'),
			'env' => Yii::t('app/mode', 'env'),
		];
	}
}
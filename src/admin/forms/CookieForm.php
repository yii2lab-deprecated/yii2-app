<?php

namespace yii2lab\app\admin\forms;

use Yii;
use yii2lab\domain\base\Model;

class CookieForm extends Model {

	public $frontend;
	public $backend;
	public $frontend_gen;
	public $backend_gen;

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'frontend' => Yii::t('app/cookie', 'frontend'),
			'backend' => Yii::t('app/cookie', 'backend'),
			'frontend_gen' => Yii::t('app/cookie', 'frontend_gen'),
			'backend_gen' => Yii::t('app/cookie', 'backend_gen'),
		];
	}
}
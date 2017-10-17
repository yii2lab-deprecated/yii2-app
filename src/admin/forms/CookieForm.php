<?php

namespace yii2lab\app\admin\forms;

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
			'frontend' => t('app/cookie', 'frontend'),
			'backend' => t('app/cookie', 'backend'),
			'frontend_gen' => t('app/cookie', 'frontend_gen'),
			'backend_gen' => t('app/cookie', 'backend_gen'),
		];
	}
}
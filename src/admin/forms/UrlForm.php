<?php

namespace yii2lab\app\admin\forms;

use yii2lab\domain\base\Model;

class UrlForm extends Model {

	public $frontend;
	public $backend;
	public $api;
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'frontend' => t('app/url', 'frontend'),
			'backend' => t('app/url', 'backend'),
			'api' => t('app/url', 'api'),
		];
	}
}
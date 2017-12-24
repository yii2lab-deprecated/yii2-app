<?php

namespace yii2lab\app\admin\forms;

use Yii;
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
			'frontend' => Yii::t('app/url', 'frontend'),
			'backend' => Yii::t('app/url', 'backend'),
			'api' => Yii::t('app/url', 'api'),
		];
	}
}
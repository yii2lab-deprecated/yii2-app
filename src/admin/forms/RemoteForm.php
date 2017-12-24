<?php

namespace yii2lab\app\admin\forms;

use Yii;
use yii2lab\domain\base\Model;

class RemoteForm extends Model {

	public $driver;
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'driver' => Yii::t('app/remote', 'driver'),
		];
	}
}
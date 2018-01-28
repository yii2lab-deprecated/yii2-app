<?php

namespace yii2lab\app\admin\forms;

use Yii;
use yii2lab\domain\base\Model;
use yii2lab\misc\enums\DbDriverEnum;

class ConnectionForm extends Model {

	public $driver;
	public $host;
	public $username;
	public $password;
	public $dbname;
	public $defaultSchema;
	
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['driver', 'host', 'username', 'password', 'dbname'], 'required'],
			['driver', 'in', 'range' => DbDriverEnum::values()],
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'driver' => Yii::t('app/connection', 'driver'),
			'host' => Yii::t('app/connection', 'host'),
			'username' => Yii::t('app/connection', 'username'),
			'password' => Yii::t('app/connection', 'password'),
			'dbname' => Yii::t('app/connection', 'dbname'),
			'defaultSchema' => Yii::t('app/connection', 'defaultSchema'),
		];
	}
	
}

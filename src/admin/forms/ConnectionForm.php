<?php

namespace yii2lab\app\admin\forms;

use yii2lab\domain\base\Model;

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
	public function attributeLabels()
	{
		return [
			'driver' => t('app/connection', 'driver'),
			'host' => t('app/connection', 'host'),
			'username' => t('app/connection', 'username'),
			'password' => t('app/connection', 'password'),
			'dbname' => t('app/connection', 'dbname'),
			'defaultSchema' => t('app/connection', 'defaultSchema'),
		];
	}
}
<?php

namespace yii2lab\app\domain\entities;

use Yii;
use yii2lab\app\domain\validators\ConnectionValidator;
use yii2lab\domain\BaseEntity;

class ConnectionEntity extends BaseEntity {

	const DRIVER_MYSQL = 'mysql';
	const DRIVER_PGSQL = 'pgsql';

	protected $driver;
	protected $host;
	protected $username;
	protected $password;
	protected $dbname;
	protected $defaultSchema;

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		$drivers = $this->getConstantEnum('driver');
		return [
			[['driver', 'host', 'username', 'dbname'], 'required'],
			['driver', 'in', 'range' => $drivers],
		];
	}

	public function validate()
	{
		parent::validate();
		$validator = Yii::createObject(ConnectionValidator::className());
		$validator->validateAttribute($this, null);
	}
}

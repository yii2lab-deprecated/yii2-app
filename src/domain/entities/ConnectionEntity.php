<?php

namespace yii2lab\app\domain\entities;

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
}

<?php

namespace yii2lab\app\domain\entities;

use Yii;
use yii2lab\app\domain\validators\ConnectionValidator;
use yii2lab\domain\BaseEntity;
use yii2lab\db\domain\enums\DbDriverEnum;

class ConnectionEntity extends BaseEntity {

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
		return [
			[['driver', 'host', 'username', 'dbname'], 'required'],
			['driver', 'in', 'range' => DbDriverEnum::values()],
		];
	}

	public function validate()
	{
		parent::validate();
		$validator = Yii::createObject(ConnectionValidator::class);
		$validator->validateAttribute($this, null);
	}
}

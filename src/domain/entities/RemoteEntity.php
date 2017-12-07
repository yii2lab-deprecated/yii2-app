<?php

namespace yii2lab\app\domain\entities;

use yii2lab\domain\enums\Driver;
use yii2lab\domain\BaseEntity;

class RemoteEntity extends BaseEntity {

	const DRIVER_TPS = Driver::TPS;
	const DRIVER_CORE = Driver::CORE;
	const DRIVER_DISC = Driver::DISC;

	protected $driver;

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		$drivers = $this->getConstantEnum('driver');
		return [
			['driver', 'required'],
			['driver', 'in', 'range' => $drivers],
		];
	}
}

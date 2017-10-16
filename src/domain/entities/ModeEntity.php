<?php

namespace yii2lab\app\domain\entities;

use yii2lab\domain\BaseEntity;

class ModeEntity extends BaseEntity {

	const ENV_PROD = 'prod';
	const ENV_DEV = 'dev';
	const ENV_TEST = 'test';

	protected $debug;
	protected $env;

	public function fieldType() {
		return [
			'debug' => 'boolean',
		];
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		$envs = $this->getConstantEnum('env');
		return [
			[['debug', 'env'], 'required'],
			['debug', 'boolean'],
			['env', 'in', 'range' => $envs],
		];
	}
}

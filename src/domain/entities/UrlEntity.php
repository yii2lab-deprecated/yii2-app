<?php

namespace yii2lab\app\domain\entities;

use yii2lab\domain\BaseEntity;

class UrlEntity extends BaseEntity {

	protected $frontend;
	protected $backend;
	protected $api;

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['frontend', 'backend', 'api'], 'required'],
			[['frontend', 'backend', 'api'], 'url'],
		];
	}
}

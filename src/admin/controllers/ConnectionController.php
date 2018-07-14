<?php

namespace yii2lab\app\admin\controllers;

use Yii;
use yii2lab\domain\web\ActiveController;

class ConnectionController extends ActiveController
{

	const ACTION_UPDATE = 'yii2lab\app\admin\actions\UpdateAction';

	public $defaultAction = 'main';
	public $service = 'app.connection';
	public $formClass = 'yii2lab\app\admin\forms\ConnectionForm';

	public function actions() {
		return [
			'main' => [
				'class' => self::ACTION_UPDATE,
				'render' => self::RENDER_UPDATE,
			],
			'test' => [
				'class' => self::ACTION_UPDATE,
				'render' => self::RENDER_UPDATE,
			],
		];
	}

}

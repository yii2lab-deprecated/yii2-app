<?php

namespace yii2lab\app\admin\controllers;

use Yii;
use yii2lab\domain\web\ActiveController;

class CookieController extends ActiveController
{

	const ACTION_UPDATE = 'yii2lab\app\admin\actions\UpdateAction';

	public $defaultAction = 'update';
	public $service = 'app.cookie';
	public $formClass = 'yii2lab\app\admin\forms\CookieForm';

	public function actions() {
		return [
			'update' => [
				'class' => self::ACTION_UPDATE,
				'render' => self::RENDER_UPDATE,
				'serviceMethod' => 'generate',
			],
		];
	}

}

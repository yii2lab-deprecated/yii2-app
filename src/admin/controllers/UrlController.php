<?php

namespace yii2lab\app\admin\controllers;

use Yii;
use yii2lab\domain\web\ActiveController;

class UrlController extends ActiveController
{

	const ACTION_UPDATE = 'yii2lab\app\admin\actions\UpdateAction';

	public $defaultAction = 'update';
	public $service = 'app.url';
	public $formClass = 'yii2lab\app\admin\forms\UrlForm';

	public function actions() {
		return [
			'update' => [
				'class' => self::ACTION_UPDATE,
				'render' => self::RENDER_UPDATE,
			],
		];
	}

}

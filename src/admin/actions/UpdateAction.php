<?php

namespace yii2lab\app\admin\actions;

use yii2lab\domain\exceptions\UnprocessableEntityHttpException;
use yii2lab\navigation\domain\widgets\Alert;
use Yii;
use yii2lab\domain\base\Action;

class UpdateAction extends Action {
	
	public $serviceMethod = 'save';
	public $serviceMethodOne = 'load';
	public $redirectAction;
	
	public function run() {
		$this->view->title = Yii::t('main', 'update_title');
		$methodOne = $this->serviceMethodOne;
		$entity = $this->service->$methodOne();
		$model = $this->createForm($entity->toArray());
		if(Yii::$app->request->isPost && !$model->hasErrors()) {
			try{
				$method = $this->serviceMethod;
				$this->service->$method($model->toArray());
				\App::$domain->navigation->alert->create(['main', 'update_success'], Alert::TYPE_SUCCESS);
				$redirectAction = isset($this->redirectAction) ? $this->redirectAction : $this->id;
				return $this->redirect(['/' . $this->baseUrl . $redirectAction]);
			} catch (UnprocessableEntityHttpException $e){
				$model->addErrorsFromException($e);
			}
		}
		return $this->render($this->render, compact('model'));
	}
}

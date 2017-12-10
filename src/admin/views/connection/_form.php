<?php
/**
 * @var $this yii\web\View
 * @var $model yii\base\Model
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii2lab\app\domain\entities\ConnectionEntity;
use yii2lab\widgets\Tabs;

$action = $this->context->action->id;

?>

<?= Tabs::widget([
	'id' => 'connection_navigation',
	'current' => $action,
	'actions' => [
		'main',
		'test',
	],
	'baseLang' => 'app/connection',
	//'isCompact' => true,
]) ?>

<br/>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'driver')->dropDownList([
	ConnectionEntity::DRIVER_MYSQL => t('app/connection', 'driver_mysql'),
	ConnectionEntity::DRIVER_PGSQL => t('app/connection', 'driver_pgsql'),
]); ?>

<?= $form->field($model, 'host')->textInput(); ?>

<?= $form->field($model, 'username')->textInput(); ?>

<?= $form->field($model, 'password')->passwordInput(); ?>

<?= $form->field($model, 'dbname')->textInput(); ?>

<?= $form->field($model, 'defaultSchema')->textInput(); ?>

<div class="form-group">
	<?= Html::submitButton(t('action', 'save'), ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

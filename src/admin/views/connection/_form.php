<?php
/**
 * @var $this yii\web\View
 * @var $model yii\base\Model
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii2lab\app\domain\entities\ConnectionEntity;

?>

<br/>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'driver')->dropDownList([
	ConnectionEntity::DRIVER_MYSQL => Yii::t('app/connection', 'driver_mysql'),
	ConnectionEntity::DRIVER_PGSQL => Yii::t('app/connection', 'driver_pgsql'),
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

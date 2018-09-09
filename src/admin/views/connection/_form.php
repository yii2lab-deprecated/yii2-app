<?php
/**
 * @var $this yii\web\View
 * @var $model yii\base\Model
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii2lab\db\domain\enums\DbDriverEnum;

?>

<br/>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'driver')->dropDownList([
	DbDriverEnum::MYSQL => Yii::t('app/connection', 'driver_mysql'),
	DbDriverEnum::PGSQL => Yii::t('app/connection', 'driver_pgsql'),
]); ?>

<?= $form->field($model, 'host')->textInput(); ?>

<?= $form->field($model, 'username')->textInput(); ?>

<?= $form->field($model, 'password')->passwordInput(); ?>

<?= $form->field($model, 'dbname')->textInput(); ?>

<?= $form->field($model, 'defaultSchema')->textInput(); ?>

<div class="form-group">
	<?= Html::submitButton(Yii::t('action', 'save'), ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

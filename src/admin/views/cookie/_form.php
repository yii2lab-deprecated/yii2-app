<?php
/**
 * @var $this yii\web\View
 * @var $model yii\base\Model
 */

use kartik\widgets\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii2lab\helpers\StringHelper;

?>

<?php $form = ActiveForm::begin(); ?>

<?php
$pluginOptions = [
	'pluginOptions' => [
		'handleWidth' => 50,
		'onText' => t('yii', 'Yes'),
		'offText' => t('yii', 'No'),
		'onColor' => 'success',
		'offColor' => 'danger',
	]
];

if(!$model->hasErrors()) {
	echo $form->field($model, 'frontend')->render(t('app/cookie', 'frontend') . ': ' . StringHelper::mask($model->frontend));
	echo $form->field($model, 'backend')->render(t('app/cookie', 'backend') . ': ' . StringHelper::mask($model->backend));
}
?>

<?= $form->field($model, 'frontend_gen')->widget(SwitchInput::classname(), $pluginOptions) ?>

<?= $form->field($model, 'backend_gen')->widget(SwitchInput::classname(), $pluginOptions) ?>

<div class="form-group">
	<?= Html::submitButton(t('action', 'save'), ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

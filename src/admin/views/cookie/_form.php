<?php
/**
 * @var $this yii\web\View
 * @var $model yii\base\Model
 */

use kartik\widgets\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii2lab\extension\common\helpers\StringHelper;

?>

<?php $form = ActiveForm::begin(); ?>

<?php
$pluginOptions = [
	'pluginOptions' => [
		'handleWidth' => 50,
		'onText' => Yii::t('yii', 'Yes'),
		'offText' => Yii::t('yii', 'No'),
		'onColor' => 'success',
		'offColor' => 'danger',
	]
];

if(!$model->hasErrors()) {
	echo $form->field($model, 'frontend')->render(Yii::t('app/cookie', 'frontend') . ': ' . StringHelper::mask($model->frontend));
	echo $form->field($model, 'backend')->render(Yii::t('app/cookie', 'backend') . ': ' . StringHelper::mask($model->backend));
}
?>

<?= $form->field($model, 'frontend_gen')->widget(SwitchInput::class, $pluginOptions) ?>

<?= $form->field($model, 'backend_gen')->widget(SwitchInput::class, $pluginOptions) ?>

<div class="form-group">
	<?= Html::submitButton(Yii::t('action', 'save'), ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

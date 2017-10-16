<?php
/**
 * @var $this yii\web\View
 * @var $model yii\base\Model
 */

use kartik\widgets\SwitchInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii2lab\app\domain\entities\ModeEntity;

?>

<?php $form = ActiveForm::begin(); ?>

<?php
$pluginOptions = [
	'pluginOptions' => [
		'handleWidth' => 80,
		'onText' => t('main', 'STATUS_ON'),
		'offText' => t('main', 'STATUS_OFF'),
		'onColor' => 'success',
		'offColor' => 'danger',
	]
];
?>

<?= $form->field($model, 'debug')->widget(SwitchInput::classname(), $pluginOptions);?>

<?= $form->field($model, 'env')->dropDownList([
	ModeEntity::ENV_DEV => t('app/mode', 'env_dev'),
	ModeEntity::ENV_PROD => t('app/mode', 'env_prod'),
	ModeEntity::ENV_TEST => t('app/mode', 'env_test'),
]); ?>

<div class="form-group">
	<?= Html::submitButton(t('action', 'SAVE'), ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

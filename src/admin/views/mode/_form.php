<?php
/**
 * @var $this yii\web\View
 * @var $model yii\base\Model
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii2lab\app\domain\entities\ModeEntity;
use yii2lab\widgets\SwitchInput;

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'debug')->widget(SwitchInput::classname(), SwitchInput::yesNoConfig());?>

<?= $form->field($model, 'env')->dropDownList([
	ModeEntity::ENV_DEV => t('app/mode', 'env_dev'),
	ModeEntity::ENV_PROD => t('app/mode', 'env_prod'),
	ModeEntity::ENV_TEST => t('app/mode', 'env_test'),
]); ?>

<div class="form-group">
	<?= Html::submitButton(t('action', 'save'), ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

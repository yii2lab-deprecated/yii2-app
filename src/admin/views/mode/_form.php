<?php
/**
 * @var $this yii\web\View
 * @var $model yii\base\Model
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii2lab\app\domain\entities\ModeEntity;
use yii2lab\extension\widget\SwitchInput;

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'debug')->widget(SwitchInput::class, SwitchInput::yesNoConfig());?>

<?= $form->field($model, 'env')->dropDownList([
	ModeEntity::ENV_DEV => Yii::t('app/mode', 'env_dev'),
	ModeEntity::ENV_PROD => Yii::t('app/mode', 'env_prod'),
	ModeEntity::ENV_TEST => Yii::t('app/mode', 'env_test'),
]); ?>

<div class="form-group">
	<?= Html::submitButton(Yii::t('action', 'save'), ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

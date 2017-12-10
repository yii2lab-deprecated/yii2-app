<?php
/**
 * @var $this yii\web\View
 * @var $model yii\base\Model
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii2lab\app\domain\entities\RemoteEntity;

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'driver')->dropDownList([
	RemoteEntity::DRIVER_TPS => t('app/remote', 'driver_tps'),
	RemoteEntity::DRIVER_CORE => t('app/remote', 'driver_core'),
	RemoteEntity::DRIVER_DISC => t('app/remote', 'driver_disc'),
]); ?>

<div class="form-group">
	<?= Html::submitButton(t('action', 'save'), ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii2lab\extension\web\helpers\Page;

$this->registerJs('window.print()', $this::POS_END);
?>

<?php Page::beginDraw() ?>

<?= $content ?>

<?php Page::endDraw() ?>

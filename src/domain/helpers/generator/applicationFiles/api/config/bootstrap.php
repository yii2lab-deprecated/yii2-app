<?php

// todo: пойти более правильным путем

Yii::$container->set('yii\data\Pagination', [
	'pageSizeLimit' => [10, 50],
]);

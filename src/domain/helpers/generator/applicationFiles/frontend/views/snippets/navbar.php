<?php

/* @var $this \yii\web\View */
/* @var $content string */
/* @var $isFixedTop boolean */

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii2lab\app\domain\helpers\EnvService;
use yii2lab\extension\menu\helpers\MenuHelper;

$isFixedTop = !empty($isFixedTop);

if($isFixedTop) {
	$css = '
	.wrap > .container {
		padding-top: 70px;
	}';
	$this->registerCss($css);
}
$fixedTopClass = $isFixedTop ? 'navbar-fixed-top' : '';

NavBar::begin([
	'brandLabel' => Yii::$app->name,
	'brandUrl' => EnvService::getUrl(FRONTEND),
	'options' => [
		'class' => 'navbar-inverse ' . $fixedTopClass,
	],
]);

$menu['rightMenu'] = MenuHelper::load('menu/navbar_frontend', 'rightMenu');
$menu['mainMenu'] = MenuHelper::load('menu/navbar_frontend', 'mainMenu');

echo Nav::widget([
	'options' => ['class' => 'navbar-nav navbar-right'],
	'items' => MenuHelper::gen($menu['rightMenu']),
]);

echo Nav::widget([
	'options' => ['class' => 'navbar-nav navbar-left'],
	'items' => MenuHelper::gen($menu['mainMenu']),
]);

NavBar::end();
?>

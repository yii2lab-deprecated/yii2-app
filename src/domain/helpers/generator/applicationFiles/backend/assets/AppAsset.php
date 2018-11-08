<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle {
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
		'css/main.css',
	];
	public $depends = [
		'yii2lab\applicationTemplate\common\assets\main\MainAsset',
		'yii2lab\ubuntu_font\assets\UbuntuAsset',
		'yii2lab\applicationTemplate\backend\assets\adminLte\AdminLteAsset',
	];
}

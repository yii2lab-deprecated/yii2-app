<?php

namespace yii2lab\app\domain\commands;

use yii\helpers\ArrayHelper;
use yii2lab\misc\interfaces\CommandInterface;
use yii2module\vendor\domain\commands\Base;

class CheckIp extends Base implements CommandInterface {

	public $env = [];
	
	public function run() {
		$allowedIPs = ArrayHelper::getValue($this->env, 'allowedIPs');
		self::checkIp($allowedIPs);
	}
	
	private static function checkIp($allowedIPs)
	{
		if (YII_ENV != 'test' || empty($allowedIPs)) {
			return;
		}
		if ( ! in_array(@$_SERVER['REMOTE_ADDR'], $allowedIPs)) {
			die('You are not allowed to access this file.');
		}
	}
	
}

<?php

namespace yii2lab\app\domain\commands;

use yii\helpers\ArrayHelper;
use yii2lab\misc\interfaces\CommandInterface;
use yii2module\vendor\domain\commands\Base;

class Cors extends Base implements CommandInterface {

	public $env = [];
	
	public function run() {
		if(APP != API) {
			return;
		}
		$cors = ArrayHelper::getValue($this->env, 'cors');
		if(!empty($cors)) {
			$this->initCors($cors);
		}
	}
	
	public function initCors($cors)
	{
		$cors = $this->initCorsConfig($cors);
		$headersArray = array_merge($cors['allow-headers'], $cors['expose-headers']);
		$cors['allow-headers'] = $headersArray;
		$cors['expose-headers'] = $headersArray;
		foreach($cors as $name => $value) {
			if(!empty($value)) {
				$value = implode(' , ', $value);
				header("Access-Control-{$name}: {$value}");
			}
		}
		if(!empty($_SERVER['REQUEST_METHOD']) && strtolower($_SERVER['REQUEST_METHOD']) == 'options') {
			header("HTTP/1.0 200 Ok");
			exit();
		}
	}
	
	private function initCorsConfig($cors)
	{
		if(empty($cors['allow-origin'])) {
			$cors['allow-origin'] = ['*'];
		}
		if(empty($cors['allow-methods'])) {
			$cors['allow-methods'] = ['get', 'post', 'put', 'delete', 'options'];
		}
		if(empty($cors['allow-headers'])) {
			$cors['allow-headers'] = [
				'content-type', 'x-requested-with',
				'authorization', 'registration-token'
			];
		}
		if(empty($cors['expose-headers'])) {
			$cors['expose-headers'] = [
				'link', 'access-token',
				'x-pagination-total-count', 'x-pagination-page-count',
				'x-pagination-current-page', 'x-pagination-per-page'
			];
		}
		return $cors;
	}
	
}

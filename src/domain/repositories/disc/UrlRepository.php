<?php

namespace yii2lab\app\domain\repositories\disc;

class UrlRepository extends BaseConfigRepository {

	public $file = '@common/config/env.php';
	public $key = 'url';

}
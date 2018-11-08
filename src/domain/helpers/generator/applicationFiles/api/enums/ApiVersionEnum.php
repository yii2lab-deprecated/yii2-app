<?php

namespace api\enums;

use yii2lab\rest\domain\enums\BaseApiVersionEnum;

class ApiVersionEnum extends BaseApiVersionEnum {

	const VERSION_1 = 'v1';
	const VERSION_DEFAULT = self::VERSION_1;
	
}

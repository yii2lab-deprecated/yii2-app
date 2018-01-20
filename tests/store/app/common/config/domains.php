<?php

use yii2lab\domain\Domain;
use yii2lab\domain\enums\Driver;

$remoteServiceDriver = Driver::primary() == Driver::CORE ? Driver::CORE : null;

// todo: написать фильтр на уровне сбора конфигов для конвертации конфига

return [
	'vendor' => [
		'class' => Domain::class,
		'path' => 'yii2module\vendor\domain',
		'repositories' => [
			'info' => Driver::FILE,
			'package' => Driver::FILE,
			'generator' => Driver::FILE,
			'git' => Driver::FILE,
		],
		'services' => [
			'info' => [
				'ignore' => [
					'yii2module/yii2-test',
					'yii2module/yii2-environments',
				],
			],
			'package',
			'git',
			'generator' => [
				'author' => 'Yamshikov Vitaliy, WOOPPAY LLC',
				'email' => 'theyamshikov@yandex.ru',
				'owners' => [
					'yii2lab',
					'yii2module',
					'yii2woop',
					'yii2guide',
				],
			],
		],
	],
	'tool' => [
		'class' => Domain::class,
		'path' => 'yii2module\tool\domain',
		'repositories' => [
			'password',
		],
		'services' => [
			'password' => [
				'length' => 9,
				'characters' => '123456789abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ',
				'count' => 20,
			],
		],
	],
	'encrypt' => [
		'class' => 'yii2module\encrypt\domain\Domain',
	],
	/*'active' => [
		'class' => Domain::class,
		'path' => 'domain\v4\active',
		'repositories' => [
			'active' => Driver::ACTIVE_RECORD,
			'field' => Driver::ACTIVE_RECORD,
			'category' => Driver::ACTIVE_RECORD,
			'provider' => Driver::ACTIVE_RECORD,
			'picture' => Driver::UPLOAD,
			'type' => Driver::ACTIVE_RECORD,
			'option' => Driver::ACTIVE_RECORD,
			'validation' => Driver::ACTIVE_RECORD,
			'handler' => Driver::DISC,
		],
		'services' => [
			'active',
			'field',
			'category',
			'provider',
			'type',
			'option',
			'validation',
			'handler',
			'picture'
		],
	],*/
	'account' => [
		'class' => Domain::class,
		'path' => 'yii2woop\account\domain',
		'translations' => [
			'account/merchant' => [
				'basePath' => '@domain/v4/account/messages',
				'fileMap' => [
					'account/merchant' => 'merchant.php',
				],
			],
		    
		    'account/manager' => [
		        'basePath' => '@domain/v4/account/messages',
		        'fileMap' => [
		            'account/manager' => 'manager.php',
		        ],
		    ],

		    'account/cashier' => [
		        'basePath' => '@domain/v4/account/messages',
		        'fileMap' => [
		            'account/cashier' => 'cashier.php',
		        ],
		    ],
		],
		'repositories' => [
			'auth' => Driver::primary(),
			'login' => Driver::primary(),
			'authClient' => 'domain\v4\account\repositories\ar\AuthClientRepository',
			'authCashier' => 'domain\v4\account\repositories\ar\AuthCashierRepository',
			'point' => 'domain\v4\account\repositories\ar\PointRepository',
			'registration' => Driver::primary(),
			'temp' => Driver::ACTIVE_RECORD,
			'restorePassword' => Driver::primary(),
			'security' => Driver::primary(),
			'test' => Driver::DISC,
			'balance' => Driver::primary(),
			'rbac' => Driver::MEMORY,
			'confirm' => Driver::ACTIVE_RECORD,
			'assignment' => Driver::primary(),
		    'merchant' => 'domain\v4\account\repositories\ar\MerchantRepository',
		    'cashier' => 'domain\v4\account\repositories\ar\CashierRepository',
		    'manager' => 'domain\v4\account\repositories\ar\ManagerRepository',
		    'partner' => 'domain\v4\account\repositories\ar\PartnerRepository',
		    'merchantAuth' => 'domain\v4\account\repositories\ar\MerchantAuthRepository',
		],
		'services' => [
		    'merchant' => [
		        'class' => 'domain\v4\account\services\MerchantService',
		    ],
		    'cashier' => [
		        'class' => 'domain\v4\account\services\CashierService',
		    ],
		    'manager' => [
		        'class' => 'domain\v4\account\services\ManagerService',
		    ],
		    'partner' => [
		        'class' => 'domain\v4\account\services\PartnerService',
		    ],
		    'merchantAuth' => [
		        'class' => 'domain\v4\account\services\MerchantAuthService',
		    ],
			'auth',
			'authClient' => [
				'class' => 'domain\v4\account\services\AuthClientService',
				'smsCodeExpire' => 300,
			],
            'authCashier' => [
				'class' => 'domain\v4\account\services\AuthCashierService',
			],
			'point' =>  'domain\v4\account\services\PointService',
			'login' => [
				'relations' => [
					/*'profile' => 'profile.profile',
					'address' => 'profile.address',*/
				],
				'prefixList' => ['B', 'BS', 'R', 'QRS'],
				'defaultRole' => null,
				'defaultStatus' => 1,
			    'forbiddenStatusList' => [0],
			],
			'registration' => $remoteServiceDriver,
			'temp',
			'restorePassword' => $remoteServiceDriver,
			'security',
			'test',
			'balance',
			'rbac',
			'confirm',
			'assignment',
		],
	],
	'pts' => [
		'class' => Domain::class,
		'path' => 'domain\v4\pts',
		'repositories' => [
			'point',
			'userPoint',
			'cashDesk',
		],
		'services' => [
			'point',
			'userPoint',
			'cashDesk',
		],
	],
    'legal' => [
        'class' => 'yii2lab\domain\Domain',
        'path' => 'domain\v4\legal',
        'repositories' => [
            'mcc' => 'domain\v4\legal\repositories\ar\MccRepository',
        ],
        'services' => [
            'mcc' => [
                'class' => 'domain\v4\legal\services\MccService',
            ],
        ],
    ],
	'profile' => [
		'class' => Domain::class,
		'path' => 'yii2woop\profile\domain',
		'repositories' => [
			'profile' => Driver::ACTIVE_RECORD,
			'address' => Driver::ACTIVE_RECORD,
			'car' => Driver::ACTIVE_RECORD,
			'avatar' => [
				'driver' => Driver::UPLOAD,
				//'quality' => 90,
				'format' => 'png',
				'defaultName' => 'images/icon/avatar.png',
				'size' => 256,
			],
			'qr' => Driver::FILE,
			'iin' => Driver::primary(),
			'active' => Driver::ACTIVE_RECORD,
		],
		'services' => [
			'profile',
			'address',
			'car',
			'avatar',
			'iin',
			'qr',
			'active',
		],
	],
	'summary' => [
		'class' => Domain::class,
		'path' => 'domain\v4\summary',
		'repositories' => [
			'summary',
		],
		'services' => [
			'summary',
		],
	],
	/*'personal' => [
		'class' => Domain::class,
		'path' => 'domain\v4\personal',
		'repositories' => [
			'bonus' => Driver::TPS,
		],
		'services' => [
			'bonus',
		],
	],
	'bank' => [
		'class' => Domain::class,
		'path' => 'yii2woop\bank\domain\v1',
		'repositories' => [
			'banking'=> Driver::TPS,
			'bin' => Driver::ACTIVE_RECORD,
			'bank' => Driver::TPS,
			'card' => Driver::primary(true),
		],
		'services' => [
			'banking',
			'bin',
			'bank',
			'card',
		],
	],*/
	'transaction' => [
		'class' => Domain::class,
		'path' => 'domain\v4\transaction',
		'repositories' => [
			'payment' => [
				'driver' => Driver::WSDL,
			],
			'history',
			'card',
			'historyRemote' => [
				'driver' => Driver::WSDL,
			],
		    'paymentSystem' => 'domain\v4\transaction\repositories\ar\PaymentSystemRepository',
		    'paymentService' => 'domain\v4\transaction\repositories\ar\PaymentServiceRepository',
		    'serviceComission' => 'domain\v4\transaction\repositories\ar\ServiceComissionRepository',
		    'serviceComissionMap' => 'domain\v4\transaction\repositories\ar\ServiceComissionMapRepository',
		],
		'services' => [
			'payment',
			'history',
			'card',
			'historyRemote',
		    'paymentSystem' => [
		        'class' => 'domain\v4\transaction\services\PaymentSystemService',
		    ],
		    'paymentService' => [
		        'class' => 'domain\v4\transaction\services\PaymentServiceService',
		    ],
		    'serviceComission' => [
		        'class' => 'domain\v4\transaction\services\ServiceComissionService',
		    ],
		    'serviceComissionMap' => [
		        'class' => 'domain\v4\transaction\services\ServiceComissionMapService',
		    ],
		],
	],
	'pdf' => [
		'class' => Domain::class,
		'path' => 'domain\v4\pdf',
		'repositories' => [
			'ETcPdf',
		],
		'services' => [
			'CommandService',
		],
	],
	/*'convertation' => [
		'class' => Domain::class,
		'path' => 'api\v4\modules\convertation',
		'defaultDriver' => Driver::TPS,
		'repositories' => [
			'convertation',
		],
		'services' => [
			'convertation',
		],
	],*/
	'notify' => 'yii2lab\notify\domain\Domain',
	'geo' => 'yii2lab\geo\domain\Domain',
	'service' => 'yii2woop\service\domain\v1\Domain',
	'serviceV5' => 'yii2woop\service\domain\v2\Domain',
	'qr' => 'yii2lab\qr\domain\Domain',
	'article' => 'yii2module\article\domain\Domain',
	'core' => 'yii2lab\core\domain\Domain',
	'navigation' => 'yii2lab\navigation\domain\Domain',
	'app' => 'yii2lab\app\domain\Domain',
	'guide' => 'yii2module\guide\domain\Domain',
	'rbac' => 'yii2lab\rbac\domain\Domain',
	'lang' => 'yii2module\lang\domain\Domain',
];

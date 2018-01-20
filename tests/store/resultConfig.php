<?php 

return [
	'name' => 'Qrpay',
	'language' => 'ru-RU',
	'sourceLanguage' => 'xx-XX',
	'bootstrap' => [
		'log',
		'language',
		'queue',
	],
	'timeZone' => 'UTC',
	'aliases' => [
		'@bower' => '@vendor/bower-asset',
		'@npm' => '@vendor/npm-asset',
	],
	'components' => [
		'language' => 'yii2module\\lang\\domain\\components\\Language',
		'user' => [
			'class' => 'yii2woop\\account\\domain\\web\\User',
			'enableSession' => false,
		],
		'httpClient' => [
			'class' => 'yii\\httpclient\\Client',
		],
		'log' => [
			'targets' => [
				[
					'class' => 'yii\\log\\FileTarget',
					'except' => [
						'yii\\web\\HttpException:*',
						'yii2module\\lang\\domain\\i18n\\PhpMessageSource::loadMessages',
					],
				],
			],
			'traceLevel' => 3,
		],
		'authManager' => [
			'class' => 'yii2lab\\rbac\\rbac\\PhpManager',
			'itemFile' => '@common/data/rbac/items.php',
			'ruleFile' => '@common/data/rbac/rules.php',
			'defaultRoles' => [
				'rGuest',
			],
		],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'rules' => [],
		],
		'cache' => [
			'class' => 'yii\\caching\\FileCache',
			'cachePath' => '@common/runtime/cache',
		],
		'i18n' => [
			'class' => 'yii2module\\lang\\domain\\i18n\\I18N',
			'translations' => [
				'*' => [
					'class' => 'yii2module\\lang\\domain\\i18n\\PhpMessageSource',
					'basePath' => '@common/messages',
					'on missingTranslation' => [
						'yii2module\\lang\\domain\\handlers\\TranslationEventHandler',
						'handleMissingTranslation',
					],
				],
			],
		],
		'db' => [
			'class' => 'yii\\db\\Connection',
			'charset' => 'utf8',
			'enableSchemaCache' => false,
		],
		'mailer' => [
			'class' => 'yii\\swiftmailer\\Mailer',
			'viewPath' => '@common/mail',
			'htmlLayout' => '@yii2lab/notify/domain/mail/layouts/html',
			'textLayout' => '@yii2lab/notify/domain/mail/layouts/text',
			'useFileTransport' => true,
			'fileTransportPath' => '@common/runtime/mail',
			'transport' => [
				'class' => 'Swift_SmtpTransport',
				'host' => null,
				'username' => null,
				'password' => null,
				'port' => 25,
			],
		],
		'queue' => [
			'class' => 'yii\\queue\\file\\Queue',
			'path' => '@common/runtime/queue',
		],
		'security' => 'domain\\v4\\account\\base\\Security',
		'vendor' => [
			'class' => 'yii2lab\\domain\\Domain',
			'path' => 'yii2module\\vendor\\domain',
			'repositories' => [
				'info' => 'file',
				'package' => 'file',
				'generator' => 'file',
				'git' => 'file',
			],
			'services' => [
				'info' => [
					'ignore' => [
						'yii2module/yii2-test',
						'yii2module/yii2-environments',
					],
				],
				'package' => [],
				'git' => [],
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
			'id' => 'vendor',
		],
		'tool' => [
			'class' => 'yii2lab\\domain\\Domain',
			'path' => 'yii2module\\tool\\domain',
			'repositories' => [
				'password' => [],
			],
			'services' => [
				'password' => [
					'length' => 9,
					'characters' => '123456789abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ',
					'count' => 20,
				],
			],
			'id' => 'tool',
		],
		'encrypt' => [
			'class' => 'yii2module\\encrypt\\domain\\Domain',
			'id' => 'encrypt',
			'services' => [
				'coder' => [
					'profiles' => [
						'default' => [
							'password' => 'qwerty123',
							'iv' => 'ZZZZZZZZZZZZZZZZ',
						],
					],
				],
			],
		],
		'account' => [
			'class' => 'yii2lab\\domain\\Domain',
			'path' => 'yii2woop\\account\\domain',
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
				'auth' => 'disc',
				'login' => 'disc',
				'authClient' => 'domain\\v4\\account\\repositories\\ar\\AuthClientRepository',
				'authCashier' => 'domain\\v4\\account\\repositories\\ar\\AuthCashierRepository',
				'point' => 'domain\\v4\\account\\repositories\\ar\\PointRepository',
				'registration' => 'disc',
				'temp' => 'ar',
				'restorePassword' => 'disc',
				'security' => 'disc',
				'test' => 'disc',
				'balance' => 'disc',
				'rbac' => 'memory',
				'confirm' => 'ar',
				'assignment' => 'disc',
				'merchant' => 'domain\\v4\\account\\repositories\\ar\\MerchantRepository',
				'cashier' => 'domain\\v4\\account\\repositories\\ar\\CashierRepository',
				'manager' => 'domain\\v4\\account\\repositories\\ar\\ManagerRepository',
				'partner' => 'domain\\v4\\account\\repositories\\ar\\PartnerRepository',
				'merchantAuth' => 'domain\\v4\\account\\repositories\\ar\\MerchantAuthRepository',
			],
			'services' => [
				'merchant' => [
					'class' => 'domain\\v4\\account\\services\\MerchantService',
				],
				'cashier' => [
					'class' => 'domain\\v4\\account\\services\\CashierService',
				],
				'manager' => [
					'class' => 'domain\\v4\\account\\services\\ManagerService',
				],
				'partner' => [
					'class' => 'domain\\v4\\account\\services\\PartnerService',
				],
				'merchantAuth' => [
					'class' => 'domain\\v4\\account\\services\\MerchantAuthService',
				],
				'auth' => [],
				'authClient' => [
					'class' => 'domain\\v4\\account\\services\\AuthClientService',
					'smsCodeExpire' => 300,
				],
				'authCashier' => [
					'class' => 'domain\\v4\\account\\services\\AuthCashierService',
				],
				'point' => 'domain\\v4\\account\\services\\PointService',
				'login' => [
					'relations' => [],
					'prefixList' => [
						'B',
						'BS',
						'R',
						'QRS',
					],
					'defaultRole' => null,
					'defaultStatus' => 1,
					'forbiddenStatusList' => [
						0,
					],
				],
				'registration' => null,
				'temp' => [],
				'restorePassword' => null,
				'security' => [],
				'test' => [],
				'balance' => [],
				'rbac' => [],
				'confirm' => [],
				'assignment' => [],
			],
			'id' => 'account',
		],
		'pts' => [
			'class' => 'yii2lab\\domain\\Domain',
			'path' => 'domain\\v4\\pts',
			'repositories' => [
				'point' => [],
				'userPoint' => [],
				'cashDesk' => [],
			],
			'services' => [
				'point' => [],
				'userPoint' => [],
				'cashDesk' => [],
			],
			'id' => 'pts',
		],
		'legal' => [
			'class' => 'yii2lab\\domain\\Domain',
			'path' => 'domain\\v4\\legal',
			'repositories' => [
				'mcc' => 'domain\\v4\\legal\\repositories\\ar\\MccRepository',
			],
			'services' => [
				'mcc' => [
					'class' => 'domain\\v4\\legal\\services\\MccService',
				],
			],
			'id' => 'legal',
		],
		'profile' => [
			'class' => 'yii2lab\\domain\\Domain',
			'path' => 'yii2woop\\profile\\domain',
			'repositories' => [
				'profile' => 'ar',
				'address' => 'ar',
				'car' => 'ar',
				'avatar' => [
					'driver' => 'upload',
					'format' => 'png',
					'defaultName' => 'images/icon/avatar.png',
					'size' => 256,
				],
				'qr' => 'file',
				'iin' => 'disc',
				'active' => 'ar',
			],
			'services' => [
				'profile' => [],
				'address' => [],
				'car' => [],
				'avatar' => [],
				'iin' => [],
				'qr' => [],
				'active' => [],
			],
			'id' => 'profile',
		],
		'summary' => [
			'class' => 'yii2lab\\domain\\Domain',
			'path' => 'domain\\v4\\summary',
			'repositories' => [
				'summary' => [],
			],
			'services' => [
				'summary' => [],
			],
			'id' => 'summary',
		],
		'transaction' => [
			'class' => 'yii2lab\\domain\\Domain',
			'path' => 'domain\\v4\\transaction',
			'repositories' => [
				'payment' => [
					'driver' => 'wsdl',
				],
				'history' => [],
				'card' => [],
				'historyRemote' => [
					'driver' => 'wsdl',
				],
				'paymentSystem' => 'domain\\v4\\transaction\\repositories\\ar\\PaymentSystemRepository',
				'paymentService' => 'domain\\v4\\transaction\\repositories\\ar\\PaymentServiceRepository',
				'serviceComission' => 'domain\\v4\\transaction\\repositories\\ar\\ServiceComissionRepository',
				'serviceComissionMap' => 'domain\\v4\\transaction\\repositories\\ar\\ServiceComissionMapRepository',
			],
			'services' => [
				'payment' => [],
				'history' => [],
				'card' => [],
				'historyRemote' => [],
				'paymentSystem' => [
					'class' => 'domain\\v4\\transaction\\services\\PaymentSystemService',
				],
				'paymentService' => [
					'class' => 'domain\\v4\\transaction\\services\\PaymentServiceService',
				],
				'serviceComission' => [
					'class' => 'domain\\v4\\transaction\\services\\ServiceComissionService',
				],
				'serviceComissionMap' => [
					'class' => 'domain\\v4\\transaction\\services\\ServiceComissionMapService',
				],
			],
			'id' => 'transaction',
		],
		'pdf' => [
			'class' => 'yii2lab\\domain\\Domain',
			'path' => 'domain\\v4\\pdf',
			'repositories' => [
				'ETcPdf' => [],
			],
			'services' => [
				'CommandService' => [],
			],
			'id' => 'pdf',
		],
		'notify' => [
			'class' => 'yii2lab\\notify\\domain\\Domain',
			'id' => 'notify',
			'repositories' => [
				'transport' => [],
				'email' => 'yii',
				'sms' => 'mock',
				'flash' => 'session',
			],
			'services' => [
				'transport' => [],
				'email' => [],
				'sms' => [],
				'flash' => [],
			],
		],
		'geo' => [
			'class' => 'yii2lab\\geo\\domain\\Domain',
			'id' => 'geo',
			'repositories' => [
				'region' => [],
				'city' => [],
				'country' => [],
				'currency' => [],
			],
			'services' => [
				'region' => [],
				'city' => [],
				'country' => [],
				'currency' => [],
			],
		],
		'service' => [
			'class' => 'yii2woop\\service\\domain\\v1\\Domain',
			'id' => 'service',
			'repositories' => [
				'service' => [],
				'field' => [],
				'category' => [],
				'favorite' => [],
			],
			'services' => [
				'service' => [],
				'field' => [],
				'category' => [],
				'favorite' => [],
			],
		],
		'serviceV5' => [
			'class' => 'yii2woop\\service\\domain\\v2\\Domain',
			'id' => 'serviceV5',
			'repositories' => [
				'service' => [],
				'field' => [],
				'category' => [],
				'favorite' => [],
			],
			'services' => [
				'service' => [],
				'field' => [],
				'category' => [],
				'favorite' => [],
			],
		],
		'qr' => [
			'class' => 'yii2lab\\qr\\domain\\Domain',
			'id' => 'qr',
			'services' => [
				'generator' => [],
			],
			'repositories' => [
				'generator' => 'file',
				'cache' => 'ar',
			],
		],
		'article' => [
			'class' => 'yii2module\\article\\domain\\Domain',
			'id' => 'article',
			'repositories' => [
				'article' => 'disc',
				'category' => 'disc',
				'categories' => 'disc',
			],
			'services' => [
				'article' => [],
			],
		],
		'core' => [
			'class' => 'yii2lab\\core\\domain\\Domain',
			'id' => 'core',
			'repositories' => [
				'client' => 'rest',
			],
			'services' => [
				'client' => [],
			],
		],
		'navigation' => [
			'class' => 'yii2lab\\navigation\\domain\\Domain',
			'id' => 'navigation',
			'repositories' => [
				'breadcrumbs' => 'memory',
			],
			'services' => [
				'breadcrumbs' => [],
			],
		],
		'app' => [
			'class' => 'yii2lab\\app\\domain\\Domain',
			'id' => 'app',
			'repositories' => [
				'mode' => 'disc',
				'url' => 'disc',
				'remote' => 'disc',
				'connection' => 'disc',
				'cookie' => 'disc',
			],
			'services' => [
				'mode' => [],
				'url' => [],
				'remote' => [],
				'connection' => [],
				'cookie' => [],
			],
		],
		'guide' => [
			'class' => 'yii2module\\guide\\domain\\Domain',
			'id' => 'guide',
			'repositories' => [
				'project' => [
					'driver' => 'file',
					'owners' => [
						'yii2lab',
						'yii2module',
						'yii2woop',
						'yii2guide',
					],
				],
				'article' => 'file',
				'chapter' => 'file',
			],
			'services' => [
				'project' => 'yii2lab\\domain\\services\\ActiveBaseService',
				'article' => [],
				'chapter' => [],
			],
		],
		'rbac' => [
			'class' => 'yii2lab\\rbac\\domain\\Domain',
			'id' => 'rbac',
			'repositories' => [
				'rule' => 'file',
				'const' => 'file',
			],
			'services' => [
				'rule' => [],
				'const' => [],
			],
		],
		'lang' => [
			'class' => 'yii2module\\lang\\domain\\Domain',
			'id' => 'lang',
			'repositories' => [
				'language' => 'disc',
				'store' => 'cookie',
			],
			'services' => [
				'language' => [
					'translationEventHandler' => [
						'yii2module\\lang\\domain\\handlers\\TranslationEventHandler',
						'handleMissingTranslation',
					],
				],
			],
		],
	],
	'controllerMap' => [
		'migrate' => [
			'class' => 'dee\\console\\MigrateController',
			'migrationPath' => '@console/migrations',
			'generatorTemplateFiles' => [
				'create_table' => '@yii2lab/migration/yii/views/createTableMigration.php',
			],
		],
	],
	'modules' => [
		'offline' => [
			'class' => 'yii2module\\offline\\console\\Module',
		],
		'lang' => [
			'class' => 'yii2module\\lang\\module\\Module',
		],
		'vendor' => [
			'class' => 'yii2module\\vendor\\console\\Module',
		],
		'tool' => [
			'class' => 'yii2module\\tool\\console\\Module',
		],
		'encrypt' => [
			'class' => 'yii2module\\encrypt\\console\\Module',
		],
		'rbac' => [
			'class' => 'yii2lab\\rbac\\console\\Module',
		],
		'cleaner' => [
			'class' => 'yii2module\\cleaner\\console\\Module',
		],
		'environments' => [
			'class' => 'yii2lab\\init\\console\\Module',
		],
		'fixtures' => [
			'class' => 'yii2module\\fixture\\Module',
		],
		'test' => [
			'class' => 'yii2module\\test\\console\\Module',
		],
		'db' => [
			'class' => 'yii2lab\\db\\console\\Module',
			'actions' => [
				'ImportFixture' => [
					'tableList' => [
						'user',
						'user_assignment',
						'rest',
					],
				],
				0 => 'common\\init\\db\\Subject2user',
				1 => 'common\\init\\db\\AuthAssignment2userAssignment',
				2 => 'common\\init\\db\\AuthAssignment2userPoint',
				'SetGrant' => [
					'grantUser' => 'logging',
				],
				'SetSequence' => [
					'tableList' => [
						'user' => 'user_id_seq',
					],
				],
			],
		],
	],
	'params' => [
		'MaintenanceMode' => false,
		'pageSize' => 25,
		'user.passwordResetTokenExpire' => 60,
		'user.registration.tempLoginExpire' => 1200,
		'user.auth.rememberExpire' => 2592000,
		'user.login.mask' => '+9 (999) 999-99-99',
		'url' => [
			'frontend' => 'http:///',
			'backend' => 'http://admin./',
			'api' => 'http://api./',
		],
		'adminEmail' => 'admin@example.com',
		'fixture' => [
			'dir' => '@common/fixtures',
			'exclude' => [
				'migration',
			],
		],
		'offline' => [
			'exclude' => [
				'console',
				'backend',
			],
		],
		'navbar' => [
			'exclude' => [
				'error',
				'offline',
				'user',
				'debug',
				'gii',
				'welcome',
				'lang',
			],
		],
		'static' => [
			'path' => [
				'avatar' => 'images/avatars',
				'provider' => 'images/provider',
				'qr' => 'images/qr',
			],
		],
		'servers' => null,
		'MRP' => 2121,
		'EPAY_PERCENT' => 2,
		'EpayPath' => 'C:\\OpenServer\\domains\\qr.yii\\vendor\\yii2lab\\yii2-app\\tests\\store\\app\\common\\config/../../../epay_test/',
		'CnpPath' => 'C:\\OpenServer\\domains\\qr.yii\\vendor\\yii2lab\\yii2-app\\tests\\store\\app\\common\\config/../../../cnp_test/',
		'WooppayPath' => 'C:\\OpenServer\\domains\\qr.yii\\vendor\\yii2lab\\yii2-app\\tests\\store\\app\\common\\config/../../../wp_test/',
		'AcquiringTest' => true,
		'AcquiringType' => 'wooppay',
		'AcquiringAccess' => 70,
		'CardLinkingAccess' => true,
		'CardLinkingType' => 'wooppay',
		'WithdrawalType' => 'wooppay',
		'SPP_ORDER_NOTIFICATION' => 'support@wooppay.com',
		'SECURITY_EMAIL' => 'security@wooppay.com',
		'article' => [
			'links' => [
				'about',
				'contact',
			],
		],
		'fcm' => [
			'apiKey' => 'AAAAx7bGf2w:APA91bFkHGVD845jtCcaMcdKciyuTujzL8I_kAm9pbFm-tkB_8zV55qhCmuELzBfeqLDt78pURm9yZdtSVc1XD4CGQ-sYuyBH0fOKxWE5SWrdylrMdPlVLzz47OigOxoguKbpHJQHXPI',
		],
		'smsc' => [
			'login' => 'qrpay',
			'password' => 'AdfG!7e3',
		],
		'wooppay_api' => [
			'wsdl_url' => 'http://www.test.wooppay.com/api/wsdl',
			'qr_merchant_login' => 'QRPayMerchant',
			'qr_merchant_password' => 'A12345678a',
			'qr_spec_login' => 'QRPaySub',
			'qr_spec_password' => 'A12345678a',
			'payment_hash' => 'Q8nFbQeU236zYQmHDq5vHVqeQBgjNmu9sTCVtEP7hL7p6kKC2vJc66pUGbrAhD3G',
		],
		'supportEmail' => 'support@example.com',
		'robotEmail' => 'robot@example.com',
		'acquiring' => [
			'HBPAY' => 'kkbsub_regular',
			'LINKED' => 'wpsub_regular',
		],
	],
	'controllerNamespace' => 'console\\controllers',
	'id' => 'app-console',
	'basePath' => 'C:\\OpenServer\\domains\\qr.yii\\console',
	'vendorPath' => 'C:\\OpenServer\\domains\\qr.yii\\vendor\\',
];
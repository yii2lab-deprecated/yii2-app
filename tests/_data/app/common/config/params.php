<?php

return [
	'MaintenanceMode' => false,
	'pageSize' => 25,
	'user.passwordResetTokenExpire' => 60,
	'user.registration.tempLoginExpire' => 20 * 60,
	'user.auth.rememberExpire' => 3600 * 24 * 30,
	'user.login.mask' => '+9 (999) 999-99-99',
	'url' => env('url'),
    'adminEmail' => 'info@qrp.kz',
	'fixture' => [
		'dir' => '@common/fixtures',
		'exclude' => [
			'migration',
		],
	],
	'offline' => [
		'exclude' => [
			CONSOLE,
			BACKEND,
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
	'servers' => env('servers'),
	'MRP' => 2121,
	'EPAY_PERCENT' => 2,
	'EpayPath' => dirname(__FILE__) . '/../../../epay_test/',
	'CnpPath' => dirname(__FILE__) . '/../../../cnp_test/',
	'WooppayPath' => dirname(__FILE__) . '/../../../wp_test/',
	'AcquiringTest' => true,
	'AcquiringType' => 'wooppay',
	'AcquiringAccess' => 70,//epay,cnp,wooppay
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
];
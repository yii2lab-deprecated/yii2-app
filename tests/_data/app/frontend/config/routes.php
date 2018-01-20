<?php

return [
	''=> 'welcome',
	
	// ----------------- Card module -----------------
	
	['class' => 'yii\rest\UrlRule', 'controller' => ['card' => 'bank/card']],
	'card/<action>' => 'bank/card/<action>',
	'card/attach/step/<step>/linkType/<linkType>/reference/<reference>' => 'bank/card/attach',
	'card/approve/reference/<reference>/amount/<amount>' => 'bank/card/approve',
	'card/attach/step/<step>/linkType/<linkType>' => 'bank/card/attach',
	'card/attach/step/<step>/' => 'bank/card/attach',
	'card/delete/<id>' => 'bank/card/delete',
	
	['class' => 'yii\rest\UrlRule', 'controller' => ['banking' => 'bank/banking']],
	'banking/<action>' => 'bank/banking/<action>',
	
	// ----------------- Account module -----------------
	
	['class' => 'yii\rest\UrlRule', 'controller' => ['account' => 'account/main']],

	
	'account/<action>' => 'account/main/<action>',

	// ----------------- Convertation module -----------------
	
	['class' => 'yii\rest\UrlRule', 'controller' => ['convertation' => 'convertation/default']],
	'convertation/<action:(step|change_scenario|commission)>' => 'convertation/default/<action>',
	
	// ----------------- transaction module -----------------
	
	['class' => 'yii\rest\UrlRule', 'controller' => ['convertation' => 'convertation/default']],
	'transaction/payment/search' => 'transaction/payment/search',
	
	// ----------------- article module -----------------

	'article/<id>'=> 'article/page/view',

	// ----------------- guide module -----------------
	
	'guide/search'=> 'guide/default/search',
	'guide/<project_id>/chapter/<id>'=> 'guide/chapter/view',
	'guide/<project_id>/<id>/update'=> 'guide/article/update',
	'guide/<project_id>/<id>/delete'=> 'guide/article/delete',
	'guide/<project_id>/<id>/code'=> 'guide/article/code',
	'guide/<project_id>/<id>'=> 'guide/article/view',
	'guide/<project_id>'=> 'guide/article',
	
	'cabinet/sign-in' => 'cabinet/auth/login',
	'cabinet/sign-out' => 'cabinet/auth/sign-out',
	'cabinet/main' => 'cabinet/main/index',
	'cabinet/merchant/sign-up' => 'cabinet/merchants/sign-up',
	'cabinet/merchant/manage/<id>' => 'cabinet/merchants/manage',
	'cabinet/merchant/<merchId>/points/create' => 'cabinet/points/create',
	'cabinet/merchant/<merchId>/cash-desks/point/<pointId>/create' => 'cabinet/cash-desks/create',
	'cabinet/merchant/cash-desks/<deskId>' => 'cabinet/cash-desks/get-qr',
	'cabinet/merchant/<merchId>/cashiers/sign-up' => 'cabinet/cashiers/create',
	'cabinet/merchant/manage/<merchId>/point/<pointId>/attach-cashier' => 'cabinet/cashiers/attach',
	'cabinet/sign-up' => 'cabinet/auth/sign-up',
	'cabinet/merchant/manage/<merchId>/get-form' => 'cabinet/merchants/get-form',
	'cabinet/merchant/sign-up/get-percent-of-rate/<knpId>' => '/cabinet/merchants/get-percent-of-rate',
];

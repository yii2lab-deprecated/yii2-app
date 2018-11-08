<?php

namespace common\locators;

use yii2lab\domain\base\BaseDomainLocator;

/**
 * @property-read \yii2lab\notify\domain\Domain $notify
 * @property-read \yii2lab\navigation\domain\Domain $navigation
 * @property-read \yii2lab\rbac\domain\Domain $rbac
 * @property-read \yii2lab\app\domain\Domain $app
 * @property-read \yii2lab\geo\domain\Domain $geo
 * @property-read \yii2lab\rest\domain\Domain $rest
 * @property-read \yii2module\account\domain\v2\Domain $account
 * @property-read \yii2module\profile\domain\v2\Domain $profile
 * @property-read \yii2module\lang\domain\Domain $lang
 * @property-read \yii2module\vendor\domain\Domain $vendor
 * @property-read \yii2module\tool\domain\Domain $tool
 * @property-read \yii2module\encrypt\domain\Domain $encrypt
 * @property-read \yii2module\article\domain\Domain $article
 * @property-read \yii2module\guide\domain\Domain $guide
 * @property-read \yii2module\summary\domain\Domain $summary
 * @property-read \yii2lab\extension\jwt\Domain $jwt
 */
class DomainLocator extends BaseDomainLocator {}

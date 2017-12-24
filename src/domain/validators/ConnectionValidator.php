<?php

namespace yii2lab\app\domain\validators;

use Yii;
use yii\db\Connection;
use yii\validators\Validator;
use yii2lab\app\domain\helpers\Db;
use yii2lab\domain\exceptions\UnprocessableEntityHttpException;
use yii2lab\domain\helpers\ErrorCollection;

class ConnectionValidator extends Validator {

	public function validateAttribute($model, $attribute) {
		$config = $model->toArray();
		$config = Db::normalizeConfig($config);
		$config = Db::schemaMap($config);
		$connection = Yii::createObject(Connection::className());
		$connection->dsn = $config['dsn'];
		$connection->username = $config['username'];
		$connection->password = $config['password'];
		try {
			$connection->open();
		} catch(\yii\db\Exception $e) {
			$message = $e->getMessage();
			$message = trim($message);
			$error = new ErrorCollection();
			$previous2 = $e->getPrevious()->getPrevious();
			if($previous2 != null && preg_match('~getaddrinfo failed~', $previous2->getMessage())) {
				$error->add('host', t('app/connection', 'bad_host'));
			}
			if(preg_match('~Unknown database~', $message)) {
				$error->add('dbname', t('app/connection', 'bad_dbname'));
			}
			if(preg_match('~Access denied for user~', $message)) {
				$error->add('username', t('app/connection', 'bad_username'));
				$error->add('password', t('app/connection', 'bad_password'));
			}
			throw new UnprocessableEntityHttpException($error);
		}
	}

}

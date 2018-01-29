<?php

namespace yii2lab\app\domain\helpers;

use Yii;
use yii\db\Exception;
use yii\db\Connection;
use yii2lab\domain\exceptions\UnprocessableEntityHttpException;
use yii2lab\domain\helpers\ErrorCollection;

class ConnectionHelper extends BaseConfig {
	
	public static function test(array $config) {
		$config = Db::normalizeConfig($config);
		$config = Db::schemaMap($config);
		$connection = Yii::createObject(Connection::className());
		$connection->dsn = $config['dsn'];
		$connection->username = $config['username'];
		$connection->password = $config['password'];
		try {
			$connection->open();
		} catch(Exception $e) {
			$message = $e->getMessage();
			$message = trim($message);
			$error = new ErrorCollection();
			$previous2 = $e->getPrevious()->getPrevious();
			if($previous2 != null && preg_match('~getaddrinfo failed~', $previous2->getMessage())) {
				$error->add('host', Yii::t('app/connection', 'bad_host'));
			}
			if(preg_match('~Unknown database~', $message)) {
				$error->add('dbname', Yii::t('app/connection', 'bad_dbname'));
			}
			if(preg_match('~Access denied for user~', $message)) {
				$error->add('username', Yii::t('app/connection', 'bad_username'));
				$error->add('password', Yii::t('app/connection', 'bad_password'));
			}
			throw new UnprocessableEntityHttpException($error);
		}
	}
	
}

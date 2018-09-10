<?php

namespace yii2lab\app\domain\helpers;

use yii2lab\extension\store\StoreFile;

class CacheHelper {

    private static $enabled = null;

    public static function forge($key, $callback) {
        if(!self::isEnable()) {
            return call_user_func_array($callback, []);
        }
        $value = self::get($key);
        if($value === null) {
            $value = call_user_func_array($callback, []);
            self::set($key, $value);
        }
        return $value;
    }

    public static function get($key, $default = null) {
        if(!self::isEnable()) {
            return null;
        }
        $store = self::getStoreInstance($key);
        return $store->load();
    }

    public static function set($key, $value) {
        if(!self::isEnable()) {
            return null;
        }
        $store = self::getStoreInstance($key);
        return $store->save($value);
    }

    private static function getFileName($name) {
        $dir = \Yii::getAlias('@common/runtime/cache/app');
        $file = $name . '.bin';
        return $dir . DS . $file;
    }

    private static function getStoreInstance($name) {
        $fileName = self::getFileName($name);
        $store = new StoreFile($fileName, 'serialize');
        return $store;
    }

    private static function isEnable() {
        if(self::$enabled === null) {
            self::$enabled = EnvService::get('cache.enable', false);
        }
        return self::$enabled;
    }

}

<?php


namespace App\services\database;

class Database {
    static $db=null;

    public static function connexionDb() {
        if (null !== self::$db) {
            return self::$db;
        }

        try {
            self::$db = new \PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME, DB_USER ,DB_PASSWORD);
            self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new \Exception($e);
        }

        return self::$db;
    }
}
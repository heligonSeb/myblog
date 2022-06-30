<?php


namespace App\services\database;

class Database {
    public static function connexionDb() {
        try {
            $db = new \PDO('mysql:host='. DB_HOST .';dbname='. DB_NAME, DB_USER ,DB_PASSWORD);
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new \Exception($e);
        }

        return $db;
    }
}
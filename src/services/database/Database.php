<?php

namespace App\services\database;

class Database
{
    private static $db = null;

    /**
     * Connect to the database only if not already connected.
     *
     * @return \PDO
     */
    public static function connexionDb()
    {
        if (null !== self::$db) {
            return self::$db;
        }

        try {
            self::$db = new \PDO('mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
            self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new \Exception($e);
        }

        return self::$db;
    }
}

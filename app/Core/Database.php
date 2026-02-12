<?php

class Database
{
    private static ?mysqli $connection = null;

    public static function connection(): mysqli
    {
        if (self::$connection instanceof mysqli) {
            return self::$connection;
        }

        $host = getenv('DB_HOST') ?: '127.0.0.1';
        $port = (int)(getenv('DB_PORT') ?: 3306);
        $database = getenv('DB_NAME') ?: 'veterinaria';
        $username = getenv('DB_USER') ?: 'root';
        $password = getenv('DB_PASS') ?: '';

        $mysqli = new mysqli($host, $username, $password, $database, $port);
        if ($mysqli->connect_errno) {
            throw new RuntimeException('No se pudo conectar a MySQL: ' . $mysqli->connect_error);
        }

        $mysqli->set_charset('utf8mb4');
        self::$connection = $mysqli;

        return self::$connection;
    }
}

<?php
namespace App\Config;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $host = Config::get('DB_HOST');
        $port = Config::get('DB_PORT', '3306'); // <-- Agregado: Detecta el puerto de Railway o por defecto 3306
        $db = Config::get('DB_NAME');
        $user = Config::get('DB_USER');
        $pass = Config::get('DB_PASS');
        $charset = Config::get('DB_CHARSET', 'utf8mb4');

        // Se incluye el port=$port en el DSN para portabilidad absoluta
        $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->connection = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            // REGISTRA EL ERROR EN EL SERVIDOR
            error_log("Database Error: " . $e->getMessage());

            // CAMBIA ESTA LÍNEA TEMPORALMENTE PARA VER EL ERROR REAL:
            die("Error de PDO: " . $e->getMessage());
        }
    }

    public static function getConnection()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->connection;
    }
}
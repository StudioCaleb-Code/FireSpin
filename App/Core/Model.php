<?php
namespace App\Core;

use App\Config\Database;

class Model
{
    protected $db;

    public function __construct()
    {
        // Obtenemos la conexión única (Singleton) de nuestra clase Database
        $this->db = Database::getConnection();
    }
}
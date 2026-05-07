<?php
namespace App\Models;

use App\Config\Database;
use App\Core\Model;
use PDO;

class Usuario extends Model
{
    // private $db;

    public function __construct()
    {
        parent::__construct();
    }

    public function buscarPorEmail($email)
    {
        // $this->db ya está disponible porque la heredaste de Model
        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
<?php
namespace App\Models;

use App\Config\Database;
use PDO;

class Premio
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    /**
     * Registra un premio, le asocia sus imágenes y lo vincula al evento actual
     */
    public function createPremioConEvento($id_evento, $dataPremio, $galeriaImagenes = [])
    {
        try {
            // Iniciar transacción para asegurar que todo se guarde junto
            $this->db->beginTransaction();

            // 1. Insertar en la tabla 'premios'
            $sqlPremio = "INSERT INTO premios (nombre, descripcion, id_galeria) VALUES (:nombre, :descripcion, null)";
            $stmt = $this->db->prepare($sqlPremio);
            $stmt->execute([
                ':nombre' => $dataPremio['nombre'],
                ':descripcion' => $dataPremio['descripcion']
            ]);

            $id_premio = $this->db->lastInsertId();

            // 2. Insertar en la tabla pivote 'evento_premio'
            $sqlPivot = "INSERT INTO evento_premio (id_evento, id_premio, cantidad) VALUES (:id_evento, :id_premio, :cantidad)";
            $stmtPivot = $this->db->prepare($sqlPivot);
            $stmtPivot->execute([
                ':id_evento' => $id_evento,
                ':id_premio' => $id_premio,
                ':cantidad' => $dataPremio['cantidad']
            ]);

            // 3. Insertar las imágenes (Tanto la principal como las múltiples van a 'premio_imagen')
            if (!empty($galeriaImagenes)) {
                $sqlImg = "INSERT INTO premio_imagen (id_premio, ruta) VALUES (:id_premio, :ruta)";
                $stmtImg = $this->db->prepare($sqlImg);
                foreach ($galeriaImagenes as $ruta) {
                    $stmtImg->execute([
                        ':id_premio' => $id_premio,
                        ':ruta' => $ruta
                    ]);
                }
            }

            $this->db->commit();
            return true;
        } catch (\Exception $e) {
            $this->db->rollBack();
            error_log("Error al crear premio: " . $e->getMessage());
            return false;
        }
    }
}
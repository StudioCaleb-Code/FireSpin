<?php
namespace App\Models;

use App\Config\Database;
use PDO;

class Evento
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    /**
     * Obtener todos los eventos con el nombre de su estado
     */
    public function getAll()
    {
        $sql = "SELECT e.*, est.nombre as estado_nombre 
                FROM eventos e 
                LEFT JOIN estados est ON e.id_estado = est.id_estado 
                ORDER BY e.created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Obtener un evento específico por su ID
     */
    public function getById($id)
    {
        $sql = "SELECT * FROM eventos WHERE id_evento = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * Verificar si un slug ya existe (para evitar duplicados en URLs dinámicas)
     */
    public function existsSlug($slug, $excludeId = 0)
    {
        $sql = "SELECT COUNT(*) FROM eventos WHERE slug = :slug AND id_evento != :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':slug', $slug, PDO::PARAM_STR);
        $stmt->bindValue(':id', $excludeId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    /**
     * Insertar un nuevo evento en la base de datos
     */
    public function create($data)
    {
        $sql = "INSERT INTO eventos (nombre, slug, descripcion, fecha_inicio, fecha_fin, imagen, diseno, id_estado) 
                VALUES (:nombre, :slug, :descripcion, :fecha_inicio, :fecha_fin, :imagen, :diseno, :id_estado)";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':nombre', $data['nombre'], PDO::PARAM_STR);
        $stmt->bindValue(':slug', $data['slug'], PDO::PARAM_STR);
        $stmt->bindValue(':descripcion', $data['descripcion'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':fecha_inicio', $data['fecha_inicio'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':fecha_fin', $data['fecha_fin'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':imagen', $data['imagen'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':diseno', $data['diseno'] ?? null, PDO::PARAM_STR);
        $stmt->bindValue(':id_estado', $data['id_estado'] ?? null, PDO::PARAM_INT);

        return $stmt->execute();
    }

    /**
     * Elimina un evento y sus vinculaciones de premios de forma segura
     */
    public function deleteEvento($id_evento)
    {
        try {
            $db = \App\Config\Database::getConnection();
            $db->beginTransaction();

            // 1. Romper la relación en la tabla pivote primero
            $sqlPivot = "DELETE FROM evento_premio WHERE id_evento = :id_evento";
            $stmtPivot = $db->prepare($sqlPivot);
            $stmtPivot->execute([':id_evento' => $id_evento]);

            // 2. Eliminar el evento de la tabla 'eventos'
            $sqlEvento = "DELETE FROM eventos WHERE id_evento = :id_evento";
            $stmtEvento = $db->prepare($sqlEvento);
            $stmtEvento->execute([':id_evento' => $id_evento]);

            $db->commit();
            return true;
        } catch (\Exception $e) {
            $db->rollBack();
            error_log("Error al eliminar evento: " . $e->getMessage());
            return false;
        }
    }
}
<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Evento;

class RuletaController extends Controller
{
    private $eventoModel;

    public function __construct()
    {
        $this->eventoModel = new Evento();
    }

    /**
     * Muestra el formulario de registro al participante basado en el slug de la URL
     */
    public function detalle($slug = null)
    {
        if (!$slug) {
            die("Enlace de evento no válido.");
        }

        // Buscar el evento usando el slug único
        $db = \App\Config\Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM eventos WHERE slug = :slug AND id_estado = 4 LIMIT 1");
        $stmt->execute([':slug' => $slug]);
        $evento = $stmt->fetch();

        // Si el evento no existe o no está activo (id_estado = 4)
        if (!$evento) {
            die("Lo sentimos, este evento no existe o ya ha finalizado.");
        }

        // --- SOLUCIÓN DIRECTA PARA EL ERROR DE RENDER ---
        // Asignamos la variable que tu vista "registro.php" espera leer: $Evento
        $Evento = $evento;

        // Construimos la ruta física exacta hacia la vista usando tus constantes de entorno
        $vistaPath = APP_PATH . 'views' . DIRECTORY_SEPARATOR . 'Ruleta' . DIRECTORY_SEPARATOR . 'registro.php';

        if (file_exists($vistaPath)) {
            require_once $vistaPath;
        } else {
            die("Error: No se encontró el archivo físico de la vista en la ruta esperada: <br> " . $vistaPath);
        }
    }
}
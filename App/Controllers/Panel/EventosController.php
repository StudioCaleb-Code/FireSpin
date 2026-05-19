<?php
namespace App\Controllers\Panel;

use App\Models\Evento;
use App\Models\Premio;

class EventosController extends PanelController
{
    private $eventoModel;
    private $premioModel;

    public function __construct()
    {
        // Asegurar que la sesión esté iniciada para rastrear el flujo
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->eventoModel = new Evento();
        $this->premioModel = new Premio();
    }

    public function index()
    {
        $eventos = $this->eventoModel->getAll();

        $this->renderPanel('Panel/Eventos/index', [
            'extra_css' => ['panel/eventos', 'panel/navegador'],
            'extra_js' => ['panel/eventoLink', 'panel/navActive'],
            'view_tab' => 'CardEvento',
            'Eventos' => $eventos
        ]);
    }

    public function formEvento()
    {
        $this->renderPanel('Panel/Eventos/Form', [
            'extra_css' => ['panel/eventos', 'panel/navegador', 'panel/fromEvento'],
            'extra_js' => ['panel/eventos', 'panel/navActive', 'panel/fromEvento'],
            'view_tab' => 'Form',
            'Eventos' => []
        ]);
    }

    /**
     * PASO 1: Procesar formulario de creación de Evento
     */
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            $descripcion = trim($_POST['descripcion'] ?? '');
            $fecha_inicio = !empty($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : null;
            $fecha_fin = !empty($_POST['fecha_fin']) ? $_POST['fecha_fin'] : null;

            // Requerimientos del usuario: Estado por defecto id = 4
            $id_estado = 4;
            $diseno = 'default';

            // Generar slug
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $nombre), '-'));
            if ($this->eventoModel->existsSlug($slug)) {
                $slug .= '-' . time();
            }

            // Procesar la imagen de portada del evento
            $nombreImagen = null;
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $fileExtension = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
                if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'webp'])) {
                    $nombreImagen = 'portada_' . uniqid() . '.' . $fileExtension;
                    // Se guarda en uploads/portada/ como indica tu árbol
                    $dest_path = UPLOAD_PATH . 'portada' . DIRECTORY_SEPARATOR . $nombreImagen;
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $dest_path);
                }
            }

            $dataEvento = [
                'nombre' => $nombre,
                'slug' => $slug,
                'descripcion' => $descripcion,
                'fecha_inicio' => $fecha_inicio,
                'fecha_fin' => $fecha_fin,
                'imagen' => $nombreImagen,
                'diseno' => $diseno,
                'id_estado' => $id_estado
            ];

            // Insertar usando el objeto PDO persistido
            $db = \App\Config\Database::getConnection();
            $sql = "INSERT INTO eventos (nombre, slug, descripcion, fecha_inicio, fecha_fin, imagen, diseno, id_estado) 
                    VALUES (:nombre, :slug, :descripcion, :fecha_inicio, :fecha_fin, :imagen, :diseno, :id_estado)";

            $stmt = $db->prepare($sql);
            $success = $stmt->execute([
                ':nombre' => $dataEvento['nombre'],
                ':slug' => $dataEvento['slug'],
                ':descripcion' => $dataEvento['descripcion'],
                ':fecha_inicio' => $dataEvento['fecha_inicio'],
                ':fecha_fin' => $dataEvento['fecha_fin'],
                ':imagen' => $dataEvento['imagen'],
                ':diseno' => $dataEvento['diseno'],
                ':id_estado' => $dataEvento['id_estado']
            ]);

            if ($success) {
                // Guardar rastro en la sesión para el Paso 2
                $_SESSION['creando_evento_id'] = $db->lastInsertId();
                $_SESSION['creando_evento_nombre'] = $nombre;

                header('Location: ' . BASE_URL . 'panel/eventos/formEventoPremio');
                exit();
            } else {
                echo "Error al crear el evento.";
            }
        }
    }

    public function formEventoPremio()
    {
        // Si no hay un evento en sesión, regresarlo al paso 1
        if (!isset($_SESSION['creando_evento_id'])) {
            header('Location: ' . BASE_URL . 'panel/eventos/formEvento');
            exit();
        }

        $this->renderPanel('Panel/Eventos/FormPremio', [
            'extra_css' => ['panel/eventos', 'panel/navegador', 'panel/fromEvento'],
            'extra_js' => ['panel/eventos', 'panel/navActive', 'panel/fromEvento'],
            'view_tab' => 'FormPremio',
            'Eventos' => []
        ]);
    }

    /**
     * PASO 2: Procesar formulario de Premios asociados al Evento
     */
    public function storePremio()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['creando_evento_id'])) {
            $id_evento = $_SESSION['creando_evento_id'];
            $nombre = trim($_POST['nombre'] ?? '');
            $descripcion = trim($_POST['descripcion'] ?? '');
            $cantidad = !empty($_POST['cantidad']) ? intval($_POST['cantidad']) : 1; // 1 por defecto

            $imagenesSubidas = [];

            // 1. Procesar Portada del Premio
            if (isset($_FILES['foto_principal']) && $_FILES['foto_principal']['error'] === UPLOAD_ERR_OK) {
                $ext = strtolower(pathinfo($_FILES['foto_principal']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
                    $nomeImg = 'premio_' . uniqid() . '.' . $ext;
                    if (move_uploaded_file($_FILES['foto_principal']['tmp_name'], UPLOAD_PATH . 'premios' . DIRECTORY_SEPARATOR . $nomeImg)) {
                        $imagenesSubidas[] = $nomeImg;
                    }
                }
            }

            // 2. Procesar fotos referenciales (Múltiples)
            if (!empty($_FILES['fotos_referenciales']['name'][0])) {
                foreach ($_FILES['fotos_referenciales']['name'] as $key => $name) {
                    if ($_FILES['fotos_referenciales']['error'][$key] === UPLOAD_ERR_OK) {
                        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                        if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
                            $nomeImgRef = 'ref_' . uniqid() . '.' . $ext;
                            if (move_uploaded_file($_FILES['fotos_referenciales']['tmp_name'][$key], UPLOAD_PATH . 'galeria' . DIRECTORY_SEPARATOR . $nomeImgRef)) {
                                $imagenesSubidas[] = $nomeImgRef;
                            }
                        }
                    }
                }
            }

            $dataPremio = [
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'cantidad' => $cantidad
            ];

            if ($this->premioModel->createPremioConEvento($id_evento, $dataPremio, $imagenesSubidas)) {
                // Limpiar variables del flujo de creación
                unset($_SESSION['creando_evento_id']);
                unset($_SESSION['creando_evento_nombre']);

                // Redirigir al panel principal exitosamente
                header('Location: ' . BASE_URL . 'panel/eventos');
                exit();
            } else {
                echo "Error al registrar el premio.";
            }
        }
    }

    // Listar contenido detallado de un evento específico y sus premios vinculados
    public function infoEvento($id = null)
    {
        if (!$id) {
            header('Location: ' . BASE_URL . 'panel/eventos');
            exit();
        }

        // 1. Consultar datos del evento
        $evento = $this->eventoModel->getById($id);

        if (!$evento) {
            die("El evento solicitado no existe.");
        }

        // 2. Traer premios asociados a este evento desde la base de datos
        // Consolidamos la query directamente por rendimiento arquitectónico
        $db = \App\Config\Database::getConnection();
        $sqlPremios = "SELECT p.*, ep.cantidad, pi.ruta as imagen 
                       FROM premios p
                       INNER JOIN evento_premio ep ON p.id_premio = ep.id_premio
                       LEFT JOIN premio_imagen pi ON p.id_premio = pi.id_premio
                       WHERE ep.id_evento = :id_evento";

        $stmt = $db->prepare($sqlPremios);
        $stmt->execute([':id_evento' => $id]);
        $premios = $stmt->fetchAll();

        $this->renderPanel('Panel/Eventos/InfoEvento', [
            'extra_css' => [
                'panel/eventos',
                'panel/infoEvento'
            ],
            'view_tab' => 'InfoEvento',
            'Evento' => $evento,
            'Premios' => $premios
        ]);
    }

    public function selecEvento()
    {
        $this->renderPanel('Panel/Eventos/SelecEvento', [
            'extra_css' => ['panel/eventos', 'panel/infoEvento', 'panel/selecEvento', 'panel/navegador'],
            'extra_js' => ['panel/eventos', 'panel/eventoLink', 'panel/navActive'],
            'view_tab' => 'SelecEvento',
            'Eventos' => []
        ]);
    }

    /**
     * PASO 3: Eliminar un evento por su ID
     */
    public function delete($id = null)
    {
        if (!$id) {
            header('Location: ' . BASE_URL . 'panel/eventos');
            exit();
        }

        // Ejecutar la eliminación en la base de datos
        $success = $this->eventoModel->deleteEvento($id);

        if ($success) {
            // Redireccionar al listado limpio
            header('Location: ' . BASE_URL . 'panel/eventos');
            exit();
        } else {
            echo "Error: No se pudo eliminar el evento porque tiene dependencias activas.";
        }
    }
}
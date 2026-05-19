<?php
namespace App\Config;

class Config
{
    public static function init()
    {
        // 1. CARGAR VARIABLES DE ENTORNO (.env)
        // Soporte para archivos físicos (Local/cPanel). En Railway se ignorará y usará las del sistema.
        if (file_exists(__DIR__ . '/../../.env')) {
            $lines = file(__DIR__ . '/../../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos(trim($line), '#') === 0) {
                    continue;
                }
                $parts = explode('=', $line, 2);
                if (count($parts) === 2) {
                    $key = trim($parts[0]);
                    $value = trim($parts[1], '" ');

                    // Definir en ambas variables globales para máxima compatibilidad
                    putenv("$key=$value");
                    $_ENV[$key] = $value;
                }
            }
        }

        // 2. DEFINICIÓN DE RUTAS FÍSICAS (Para require, include, move_uploaded_file)
        if (!defined('ROOT_PATH')) {
            define('ROOT_PATH', dirname(__DIR__, 2) . DIRECTORY_SEPARATOR);
            define('APP_PATH', ROOT_PATH . 'app' . DIRECTORY_SEPARATOR); // En minúscula para coincidir con tu arquitectura
            define('VIEW_PATH', APP_PATH . 'views' . DIRECTORY_SEPARATOR);

            // Ruta para subir archivos (uploads)
            define('UPLOAD_PATH', ROOT_PATH . 'uploads' . DIRECTORY_SEPARATOR);
        }

        // 3. DEFINICIÓN DE RUTAS URL INTELIGENTES (Para href, src, action en el navegador)
        if (!defined('BASE_URL')) {
            // Detectar protocolo de manera segura (HTTP o HTTPS)
            $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || ($_SERVER['SERVER_PORT'] ?? 80) == 443) ? "https://" : "http://";

            // Obtener el Host actual de manera dinámica (IP local, localhost o dominio de producción)
            $host = $_SERVER['HTTP_HOST'] ?? 'localhost';

            // Detectar la subcarpeta automáticamente si existe (ej: /EMPRENDEMAS) o raíz (/)
            $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
            $dirName = dirname($scriptName);
            $folderPath = rtrim($dirName, '/\\');

            // Construir la URL base final garantizando el slash de cierre
            define('BASE_URL', $protocol . $host . $folderPath . '/');
        }

        // Rutas directas para Assets usando la BASE_URL calculada
        if (!defined('ASSETS_URL')) {
            define('ASSETS_URL', BASE_URL . 'assets/');
            define('CSS_URL', ASSETS_URL . 'css/');
            define('JS_URL', ASSETS_URL . 'js/');
            define('IMG_URL', ASSETS_URL . 'img/');
        }

        // Ruta URL para archivos subidos (Para etiquetas <img src="...">)
        if (!defined('UPLOAD_URL')) {
            define('UPLOAD_URL', BASE_URL . 'uploads/');
        }
    }

    /**
     * Obtiene una variable de entorno de forma segura e inteligente.
     * Prioriza $_ENV, luego getenv() (usado en contenedores/Railway), y finalmente el valor por defecto.
     */
    public static function get($key, $default = null)
    {
        return $_ENV[$key] ?? getenv($key) ?? $default;
    }

    // Helper para generar URLs rápidas
    public static function baseUrl($path = '')
    {
        return BASE_URL . ltrim($path, '/');
    }

    // Helper para obtener la ruta de un asset específico
    public static function asset($path = '')
    {
        return ASSETS_URL . ltrim($path, '/');
    }
}

// Inicializar la configuración de forma automática al requerir el archivo
Config::init();
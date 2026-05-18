<?php
namespace App\Config;

class Config
{
    public static function init()
    {
        // 1. Cargar variables de entorno (.env)
        if (file_exists(__DIR__ . '/../../.env')) {
            $lines = file(__DIR__ . '/../../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos(trim($line), '#') === 0)
                    continue;
                $parts = explode('=', $line, 2);
                if (count($parts) === 2) {
                    $_ENV[trim($parts[0])] = trim($parts[1], '" ');
                }
            }
        }

        // --- DEFINICIÓN DE RUTAS FÍSICAS (Para require, include, move_uploaded_file) ---
        if (!defined('ROOT_PATH')) {
            define('ROOT_PATH', dirname(__DIR__, 2) . DIRECTORY_SEPARATOR);
            define('APP_PATH', ROOT_PATH . 'App' . DIRECTORY_SEPARATOR); // Con Mayúscula inicial
            define('VIEW_PATH', APP_PATH . 'Views' . DIRECTORY_SEPARATOR);

            // Ruta para subir archivos (uploads)
            define('UPLOAD_PATH', ROOT_PATH . 'uploads' . DIRECTORY_SEPARATOR);
        }

        // --- DEFINICIÓN DE RUTAS URL (Para el Navegador: href, src, action) ---
        if (!defined('BASE_URL')) {
            define('BASE_URL', rtrim(self::get('APP_URL', 'http://192.168.1.68/EMPRENDEMAS'), '/') . '/');
        }

        // Rutas directas para Assets (CSS, JS, IMG)
        if (!defined('ASSETS_URL')) {
            define('ASSETS_URL', BASE_URL . 'assets/');
            define('CSS_URL', ASSETS_URL . 'css/');
            define('JS_URL', ASSETS_URL . 'js/');
            define('IMG_URL', ASSETS_URL . 'img/');
        }

        // Ruta URL para archivos subidos (Para mostrar las fotos en el HTML)
        if (!defined('UPLOAD_URL')) {
            define('UPLOAD_URL', BASE_URL . 'uploads/');
        }
    }

    public static function get($key, $default = null)
    {
        return $_ENV[$key] ?? $default;
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

// Inicializar la configuración
Config::init();
<?php

session_start();
require_once 'app/config/Config.php';

// Autoloader sencillo si no usas Composer
spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $path = __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
    // Ajuste de mayúscula 'App' a carpeta 'app'
    $path = str_replace('App' . DIRECTORY_SEPARATOR, 'app' . DIRECTORY_SEPARATOR, $path);

    if (file_exists($path)) {
        require_once $path;
    }
});

use App\Core\Router;

// Esto dispara toda la magia
$app = new Router();
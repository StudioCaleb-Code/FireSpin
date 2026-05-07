<?php
namespace App\Core;

// Importar el namespace de la clase Config
use App\Config\Config;

class Controller
{

    protected function view($path, $data = [])
    {
        View::render($path, $data);
    }

    protected function redirect($url)
    {
        // Ahora Config::baseUrl($url) ya existe en Config.php
        header("Location: " . Config::baseUrl($url));
        exit;
    }
}
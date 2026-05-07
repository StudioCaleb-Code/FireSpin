<?php
namespace App\Core;

use App\Config\Config;

class View
{
    /**
     * @param string $path Nombre de la vista (ej: 'panel/dashboard/index')
     * @param array $data Datos que se extraerán para ser usados en la vista
     */
    public static function render($path, $data = [])
    {
        // Extrae el array asociativo en variables individuales
        // ['titulo' => 'Hola'] se convierte en $titulo = 'Hola';
        extract($data);

        $file = VIEW_PATH . $path . '.php';

        if (file_exists($file)) {
            require_once $file;
        } else {
            // Podrías redirigir a tu vista de error 404
            require_once VIEW_PATH . 'errors/404.php';
        }
    }
}
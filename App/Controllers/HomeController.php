<?php
namespace App\Controllers;

use App\Config\Config;
use App\Core\Controller;

class HomeController extends Controller
{
    /**
     * Página principal del sistema
     */
    public function index()
    {
        $nombreApp = Config::get('APP_NAME', 'Emprende Más');

        $data = [
            'titulo' => 'Bienvenido a ' . $nombreApp,
            'descripcion' => 'La plataforma ideal para gestionar tus sorteos y premios de manera transparente.',
            'url_login' => Config::baseUrl('auth/login')
        ];

        $this->view('public/home', $data);
    }

    /**
     * Ejemplo de otra página (Sobre Nosotros)
     */
    public function sobreNosotros()
    {
        $data = [
            'titulo' => 'Sobre Nosotros - Emprende Más'
        ];

        $this->view('public/sobreNosotros', $data);
    }
}
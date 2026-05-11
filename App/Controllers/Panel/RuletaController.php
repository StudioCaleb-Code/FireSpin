<?php
namespace App\Controllers\Panel;

use App\Core\Controller;
use App\Core\View;
use App\Middlewares\AuthMiddleware; // IMPORTANTE

abstract class RuletaController extends Controller
{
    public function __construct()
    {
        // Esto protege a TODOS los controladores que hereden de aquí
        AuthMiddleware::check(); 
    }

    protected function index()
    {
        View::render('Panel/Ruleta');
    }
}
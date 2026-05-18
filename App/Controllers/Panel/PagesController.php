<?php
namespace App\Controllers\Panel;

// Si PanelController está en la misma carpeta, no necesitas 'use'
// Pero para estar seguros de que PHP lo encuentre:
class PagesController extends PanelController
{
    // funcion para llamar al index
    public function index()
    {
        $this->renderPanel('Panel/Pages/index');
    }

    // funcion para entrar detalles 
    public function hero()
    {
        $this->renderPanel('Panel/Pages/Hero');
    }
}
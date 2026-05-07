<?php
namespace App\Controllers\Panel;

// Si PanelController está en la misma carpeta, no necesitas 'use'
// Pero para estar seguros de que PHP lo encuentre:
class DashboardController extends PanelController
{
    // funcion para llamar al index
    public function index()
    {
        $this->renderPanel('Panel/Dashboard/index', [
            'titulo' => 'Inicio - FairSpin'
        ]);
    }

    // funcion para entrar detalles 
    public function detalles()
    {
        $this->renderPanel('Panel/Dashboard/detalles', [
            'titulo' => 'Más información del Dashboard'
        ]);
    }
}
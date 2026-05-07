<?php
namespace App\Controllers\Panel;

class HistorialController extends PanelController
{
    public function index()
    {
        $this->renderPanel('Panel/Historial/index', [
            'titulo' => 'Historial de Giros y Premios'
        ]);
    }
}
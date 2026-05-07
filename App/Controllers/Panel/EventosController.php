<?php
namespace App\Controllers\Panel;

class EventosController extends PanelController
{
    public function index()
    {
        $this->renderPanel('Panel/Evento/index', [
            'titulo' => 'Calendario de Eventos',
            'extra_css' => ['panel/eventos-estilos'],
            'eventos' => [] 
        ]);
    }
}
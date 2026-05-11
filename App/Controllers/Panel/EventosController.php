<?php
namespace App\Controllers\Panel;

class EventosController extends PanelController
{
    public function index()
    {
        $this->renderPanel('Panel/Eventos/index', [
            'extra_css' => ['panel/eventos'],
            'extra_js' => ['panel/eventoLink'],
            'view_tab' => 'CardEvento', 
            'Eventos' => [] 
        ]);
    }

    public function formEvento()
    {
        $this->renderPanel('Panel/Eventos/index', [
            'extra_css' => ['panel/eventos'],
            'extra_js' => ['panel/eventos'],
            'view_tab' => 'Form', 
            'Eventos' => []
        ]);
    }

    // listar contenido del evento
    public function infoEvento()
    {
        $this->renderPanel('Panel/Eventos/InfoEvento', [
            'extra_css' => [
                'panel/eventos',
                'panel/infoEvento'
            ],
            'extra_js' => ['panel/eventos'],
            'view_tab' => 'InfoEvento', 
            'Eventos' => []
        ]);
    }
}
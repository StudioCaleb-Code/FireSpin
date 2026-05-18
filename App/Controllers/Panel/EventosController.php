<?php
namespace App\Controllers\Panel;

class EventosController extends PanelController
{
    public function index()
    {
        $this->renderPanel('Panel/Eventos/index', [
            'extra_css' => [
                'panel/eventos',
                'panel/navegador'
            ],
            'extra_js' => [
                'panel/eventoLink',
                'panel/navActive'
            ],
            'view_tab' => 'CardEvento',
            'Eventos' => []
        ]);
    }

    public function formEvento()
    {
        $this->renderPanel('Panel/Eventos/Form', [
            'extra_css' => [
                'panel/eventos',
                'panel/navegador',
                'panel/fromEvento'
            ],
            'extra_js' => [
                'panel/eventos',
                'panel/navActive',
                'panel/fromEvento'
            ],
            'view_tab' => 'Form',
            'Eventos' => []
        ]);
    }

    public function formEventoPremio()
    {
        $this->renderPanel('Panel/Eventos/FormPremio', [
            'extra_css' => [
                'panel/eventos',
                'panel/navegador',
                'panel/fromEvento'
            ],
            'extra_js' => [
                'panel/eventos',
                'panel/navActive',
                'panel/fromEvento'
            ],
            'view_tab' => 'FormPremio',
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
            // 'extra_js' => ['panel/eventos'],
            'view_tab' => 'InfoEvento',
            'Eventos' => []
        ]);
    }

    // lugar para selccionar general
    public function selecEvento()
    {
        $this->renderPanel('Panel/Eventos/SelecEvento', [
            'extra_css' => [
                'panel/eventos',
                'panel/infoEvento',
                'panel/selecEvento',
                'panel/navegador'
            ],
            'extra_js' => [
                'panel/eventos',
                'panel/eventoLink',
                'panel/navActive'
            ],
            'view_tab' => 'SelecEvento',
            'Eventos' => []
        ]);
    }
}
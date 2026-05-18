<?php
namespace App\Controllers\Panel;

class UsuariosController extends PanelController
{
    /**
     * 1. Pestaña: Participantes (Por defecto)
     */
    public function index()
    {
        $this->renderPanel('Panel/Usuario/index', [
            'extra_css' => [
                'panel/usuarios',
                'panel/navegador'
                ],
            'extra_js' => [
                'panel/usuarios',
                'panel/navActive'
                ],
            'view_tab' => 'TablaUsuario', // Carga TablaUsuario.php
            'usuarios' => [] // Aquí mandarías los datos de la DB
        ]);
    }

    /**
     * 2. Pestaña: Ganadores
     */
    public function ganadores()
    {
        $this->renderPanel('Panel/Usuario/index', [
            'extra_css' => [
                'panel/usuarios',
                'panel/navegador'
                ],
            'extra_js' => [
                'panel/usuarios',
                'panel/navActive'
                ],
            'view_tab' => 'TablaGanadores', // Carga TablaGanadores.php
            'usuarios' => []
        ]);
    }

    /**
     * 3. Pestaña: Lista Negra
     */
    public function listaNegra()
    {
        $this->renderPanel('Panel/Usuario/index', [
            'extra_css' => [
                'panel/usuarios',
                'panel/navegador'
                ],
            'extra_js' => [
                'panel/usuarios',
                'panel/navActive'
                ],
            'view_tab' => 'TablaListaNegra',
            'usuarios' => []
        ]);
    }

    /**
     * 4. Pestaña: para registrar nuevo participante
     */
    public function formNuevo()
    {
        $this->renderPanel('Panel/Usuario/index', [
            'extra_css' => [
                'panel/usuarios',
                'panel/navegador'
                ],
            'extra_js' => [
                'panel/usuarios',
                'panel/navActive'
                ],
            'view_tab' => 'FormNuevo', // Carga TablaAdministrativos.php
            'usuarios' => []
        ]);
    }
}
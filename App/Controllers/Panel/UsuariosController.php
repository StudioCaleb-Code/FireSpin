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
            'extra_css' => ['panel/usuarios'],
            'extra_js' => ['panel/usuarios'],
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
            'extra_css' => ['panel/usuarios'],
            'extra_js' => ['panel/usuarios'],
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
            'extra_css' => ['panel/usuarios'],
            'extra_js' => ['panel/usuarios'],
            'view_tab' => 'TablaListaNegra', // Carga TablaListaNegra.php
            'usuarios' => []
        ]);
    }

    /**
     * 4. Pestaña: Administrativos (Usuarios del sistema)
     */
    public function administrativos()
    {
        $this->renderPanel('Panel/Usuario/index', [
            'extra_css' => ['panel/usuarios'],
            'extra_js' => ['panel/usuarios'],
            'view_tab' => 'TablaAdministrativos', // Carga TablaAdministrativos.php
            'usuarios' => []
        ]);
    }
}
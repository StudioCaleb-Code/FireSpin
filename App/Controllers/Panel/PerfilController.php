<?php
namespace App\Controllers\Panel;

class PerfilController extends PanelController
{
    public function index()
    {
        $this->renderPanel('Panel/Perfil/index', [
            'titulo' => 'Mi Perfil'
        ]);
    }
}
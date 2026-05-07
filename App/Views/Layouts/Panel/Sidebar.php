<!-- <aside class="sidebar"> -->

<!-- LOGO -->
<div class="logoSidebar">
    <i class="bi bi-dice-5"></i>
    <h2>FairSpin</h2>
</div>

<hr class="hr-sidebar">

<!-- NAVEGACIÓN -->
<nav class="menu">
    <ul class="menuBox">
        <li class="listaMenu">
            <a href="<?= BASE_URL ?>/Panel/dashboard" class="menuLink">
                <i class="bi bi-columns-gap"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="listaMenu">
            <a href="<?= BASE_URL ?>/Panel/usuarios" class="menuLink">
                <i class="bi bi-people"></i>
                <span>Participantes</span>
            </a>
        </li>
        <li class="listaMenu">
            <a href="<?= BASE_URL ?>/Panel/eventos" class="menuLink">
                <i class="bi bi-calendar3"></i>
                <span>Eventos</span>
            </a>
        </li>
        <li class="listaMenu">
            <a href="<?= BASE_URL ?>/Panel/historial" class="menuLink">
                <i class="bi bi-folder"></i>
                <span>Historial</span>
            </a>
        </li>
        <li class="listaMenu">
            <!-- Este abre tu página principal en otra pestaña -->
            <a href="<?= BASE_URL ?>" target="_blank" class="menuLink">
                <i class="bi bi-browser-chrome"></i>
                <span>Ver página</span>
            </a>
        </li>
        <li class="listaMenu">
            <!-- Ruta al método logout del AuthController -->
            <a href="<?= BASE_URL ?>/Auth/logout" class="menuLink logout">
                <i class="bi bi-power"></i>
                <span>Cerrar sesión</span>
            </a>
        </li>
    </ul>
</nav>
<!-- </aside> -->
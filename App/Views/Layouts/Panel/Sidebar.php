<!-- <aside class="sidebar"> -->

<!-- LOGO -->
<div class="logoSidebar">
    <i class="bi bi-dice-5"></i>
    <h2>FairSpin</h2>
    <!-- <hr class="hr-sidebar"> -->
</div>


<!-- NAVEGACIÓN -->
<nav class="menu">
    <ul class="menuBox">
        <li class="listaMenu">
            <a href="<?= BASE_URL ?>/Panel/dashboard" class="menuLink">
                <i class="bi bi-columns-gap"></i>
                <span class="spanMenu">Dashboard</span>
            </a>
        </li>
        <li class="listaMenu">
            <a href="<?= BASE_URL ?>/Panel/usuarios" class="menuLink">
                <i class="bi bi-people"></i>
                <span class="spanMenu">Participantes</span>
            </a>
        </li>
        <li class="listaMenu">
            <a href="<?= BASE_URL ?>/Panel/eventos" class="menuLink">
                <i class="bi bi-calendar3"></i>
                <span class="spanMenu">Eventos</span>
            </a>
        </li>
        <li class="listaMenu">
            <a href="<?= BASE_URL ?>/Panel/historial" class="menuLink">
                <i class="bi bi-folder"></i>
                <span class="spanMenu">Historial</span>
            </a>
        </li>
        <li class="listaMenu">
            <!-- Este abre tu página principal en otra pestaña -->
            <a href="<?= BASE_URL ?>" target="_blank" class="menuLink">
                <i class="bi bi-browser-chrome"></i>
                <span class="spanMenu">Ver página</span>
            </a>
        </li>
        <li class="listaMenu">
            <!-- Ruta al método logout del AuthController -->
            <a href="<?= BASE_URL ?>/Auth/logout" class="menuLink logout">
                <i class="bi bi-power"></i>
                <span class="spanMenu">Cerrar sesión</span>
            </a>
        </li>
    </ul>
</nav>
<!-- </aside> -->
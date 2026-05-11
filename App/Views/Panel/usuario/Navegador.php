<nav class="MenuUsuario">
    <ul class="MenuUsBox">
        <li class="listaUsM">
            <!-- Apunta al método index() -->
            <a href="<?= BASE_URL ?>/Panel/Usuarios" class="linkUsM">
                <i class="bi bi-people"></i>
                <span>Participantes</span>
            </a>
        </li>
        <li class="listaUsM">
            <!-- Apunta al método ganadores() -->
            <a href="<?= BASE_URL ?>/Panel/Usuarios/ganadores" class="linkUsM">
                <i class="bi bi-fire"></i>
                <span>Ganadores</span>
            </a>
        </li>
        <li class="listaUsM">
            <!-- Apunta al método listaNegra() -->
            <a href="<?= BASE_URL ?>/Panel/Usuarios/listaNegra" class="linkUsM">
                <i class="bi bi-person-slash"></i>
                <span>Lista Negra</span>
            </a>
        </li>
        <li class="listaUsM">
            <!-- Apunta al método administrativos() o como lo llames -->
            <a href="<?= BASE_URL ?>/Panel/Usuarios/administrativos" class="linkUsM">
                <i class="bi bi-person-rolodex"></i>
                <span>Usuarios</span>
            </a>
        </li>
        <li class="listaUsM">
            <!-- Apunta al método administrativos() o como lo llames -->
            <a href="<?= BASE_URL ?>/Panel/Usuarios/administrativos" class="linkUsM">
                <i class="bi bi-plus-lg"></i>
                <span>Regitara</span>
            </a>
        </li>
    </ul>
</nav>
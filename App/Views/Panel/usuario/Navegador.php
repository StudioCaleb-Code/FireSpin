<nav class="navegador">
    <ul class="menuNav">
        <li class="listaNav">
            <!-- Apunta al método index() -->
            <a href="<?= BASE_URL ?>/Panel/Usuarios" class="linkNav">
                <i class="bi bi-people"></i>
                <span>Participantes</span>
            </a>
        </li>
        <li class="listaNav">
            <!-- Apunta al método ganadores() -->
            <a href="<?= BASE_URL ?>/Panel/Usuarios/ganadores" class="linkNav">
                <i class="bi bi-fire"></i>
                <span>Ganadores</span>
            </a>
        </li>
        <li class="listaNav">
            <!-- Apunta al método listaNegra() -->
            <a href="<?= BASE_URL ?>/Panel/Usuarios/listaNegra" class="linkNav">
                <i class="bi bi-person-slash"></i>
                <span>Lista Negra</span>
            </a>
        </li>
        <!-- <li class="listaNav">
            <a href="<?= BASE_URL ?>/Panel/Usuarios/administrativos" class="linkNav">
                <i class="bi bi-person-rolodex"></i>
                <span>Usuarios</span>
            </a>    
        </li> -->
        <li class="listaNav">       
            <!-- Apunta al método administrativos() o como lo llames -->
            <a href="<?= BASE_URL ?>/Panel/Usuarios/FormNuevo" class="linkNav">
                <i class="bi bi-plus-lg"></i>
                <span>Registrar</span>
            </a>
        </li>
    </ul>
</nav>
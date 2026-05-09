<!-- <header class="header"> -->
<button class="menu-toggle">
    <!-- <i class="bi bi-chevron-left"></i> -->
    <!-- <i class="bi bi-chevron-right"></i> -->
    <i class="bi bi-list"></i>
</button>

<div class="perfilHeader">
    <!-- Enlace al perfil del usuario logueado -->
    <a href="<?= BASE_URL ?>/Panel/perfil" class="perfilLink">
        <i class="bi bi-person"></i>
        <!-- <span style="font-size: 0.8rem; margin-left: 5px;"><?= $_SESSION['username'] ?></span> -->
    </a>

    <button type="button" class="theme" id="theme-toggle">
        <i class="bi bi-moon"></i>
        <i class="bi bi-sun"></i>
    </button>
</div>
<!-- </header> -->
<!-- El navegador siempre está arriba -->
<?php include 'Navegador.php'; ?>

<section class="seccionEvn content-tab">
    <?php
    // Si view_tab no existe por alguna razón, cargamos la tabla por defecto
    $tab = $view_tab ?? 'CardEvento';
    include $tab . '.php';
    ?>
</section>
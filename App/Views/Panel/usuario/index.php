<!-- El navegador siempre está arriba -->
<?php include 'Navegador.php'; ?>

<section class="seccionUsuario content-tab">
    <?php
    // Si view_tab no existe por alguna razón, cargamos la tabla por defecto
    $tab = $view_tab ?? 'TablaUsuario';
    include $tab . '.php';
    ?>
    <!-- Contenedor de la tabla dinámica
    <div class="content-tab">

    </div> -->
</section>
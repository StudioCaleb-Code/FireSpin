<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'Panel - Administración' ?></title>

    <!-- Usamos las constantes de CSS_URL definidas en Config.php -->
    <link rel="stylesheet" href="<?= CSS_URL ?>bootstrap-icons.css">
    <link rel="stylesheet" href="<?= CSS_URL ?>panel/sidebar.css">
    <link rel="stylesheet" href="<?= CSS_URL ?>panel/main.css"> <!-- Por si tienes estilos generales del panel -->

    <!-- Si necesitas agregar CSS extra desde un controlador -->
    <?php if (isset($extra_css)):
        foreach ($extra_css as $css): ?>
            <link rel="stylesheet" href="<?= CSS_URL . $css ?>.css">
        <?php endforeach; endif; ?>
</head>

<body>
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <?php include VIEW_PATH . 'Layouts' . DIRECTORY_SEPARATOR . 'Panel' . DIRECTORY_SEPARATOR . 'Sidebar.php'; ?>
    </aside>

    <!-- HEADER / NAVBAR -->
    <header class="header">
        <?php include VIEW_PATH . 'Layouts' . DIRECTORY_SEPARATOR . 'Panel' . DIRECTORY_SEPARATOR . 'Header.php'; ?>
    </header>

    <!-- CONTENIDO DINÁMICO -->
    <main class="main">
        <div class="subMain">
            <?php
            if (isset($subview)) {
                // El subview ya debe venir con la ruta interna, ej: 'Panel/Dashboard/index'
                $file = VIEW_PATH . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $subview) . '.php';

                if (file_exists($file)) {
                    include $file;
                } else {
                    echo "<div class='error'>Error: No se encontró la vista <b>{$subview}</b></div>";
                }
            } else {
                // Vista por defecto si no se pasa subview
                echo "<h1>Bienvenido de nuevo, " . htmlspecialchars($_SESSION['username'] ?? 'Usuario') . "</h1>";
                echo "<p>Selecciona una opción en el menú para comenzar.</p>";
            }
            ?>
        </div>
    </main>

    <!-- SCRIPTS GLOBALES -->
    <script src="<?= JS_URL ?>panel/main.js"></script>

    <!-- Scripts específicos de cada módulo -->
    <?php if (isset($extra_js)):
        foreach ($extra_js as $js): ?>
            <script src="<?= JS_URL . $js ?>.js"></script>
        <?php endforeach; endif; ?>
</body>

</html>
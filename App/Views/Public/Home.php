<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title><?php echo $titulo; ?></title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/bootstrap-icons.css">
</head>

<body>
    <h1><?php echo $titulo; ?></h1>
    <p><?php echo $descripcion; ?></p>

    <a href="<?= \App\Config\Config::baseUrl('auth/login') ?>">Ir al Login</a>
</body>

</html>
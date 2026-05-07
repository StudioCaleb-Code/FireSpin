<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Usamos la constante definida en Config.php -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/bootstrap-icons.css">
    <title>Login - Intranet</title>
</head>

<body>
    <div class="container">
        <h1>EMPRENDE <i class="bi bi-plus-lg"></i></h1>
        <hr>

        <!-- ERROR DINÁMICO Y CONTADOR DE INTENTOS -->
        <div id="errorBox" class="errorCredenciales" style="<?= isset($error) ? 'display: flex;' : 'display: none;' ?>">
            <i class="bi bi-exclamation-triangle"></i>
            <div>
                <p class="mesageError" id="errorMessage"><?= $error ?? '' ?></p>
                <?php if (isset($attempts)): ?>
                    <p class="mesageError">
                        <span id="intentosCount"><?= 3 - $attempts ?></span> intentos disponibles
                    </p>
                <?php endif; ?>
            </div>
        </div>

        <!-- La acción apunta al método login del controlador AuthController -->
        <form id="loginForm" action="<?= \App\Config\Config::baseUrl('auth/login') ?>" method="POST">

            <div class="input-group">
                <label for="emailUser">Correo</label>
                <div class="input-icon">
                    <i class="bi bi-at"></i>
                    <input type="email" name="emailUser" id="emailUser" placeholder="admin@gmail.com" required>
                </div>
            </div>

            <div class="input-group">
                <label for="passwordUser">Contraseña</label>
                <div class="input-icon">
                    <i class="bi bi-lock"></i>
                    <input type="password" name="passwordUser" id="passwordUser" placeholder="••••••••" required>
                </div>
            </div>

            <hr>

            <div class="btnBox">
                <a href="<?= \App\Config\Config::baseUrl('') ?>" class="bx btnRegresar">
                    <i class="bi bi-arrow-left"></i>
                    <span>Regresar</span>
                </a>

                <button class="bx btnIngresar" type="submit" id="btnSubmit">
                    <span>Ingresar</span>
                    <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </form>
    </div>

    <script src="<?= \App\Config\Config::baseUrl('assets/js/login.js') ?>"></script>
</body>

</html>
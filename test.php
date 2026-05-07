<?php
// Incluimos la configuración para usar la base de datos
// Ajusta estas rutas si es necesario según tu estructura
require_once 'app/config/Config.php';
require_once 'app/config/Database.php';

use App\Config\Database;

$mensaje = "";
$tipo = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $user  = $_POST['username'];
    $pass  = $_POST['password'];
    
    // Encriptamos la contraseña para que sea compatible con el login
    $passHash = password_hash($pass, PASSWORD_BCRYPT);

    try {
        $db = Database::getConnection();
        
        // Insertamos el usuario con id_rol = 1 (admin) e id_estado = 1 (activo)
        $sql = "INSERT INTO usuarios (id_rol, email, username, password, id_estado) 
                VALUES (1, :email, :user, :pass, 1)";
        
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':email' => $email,
            ':user'  => $user,
            ':pass'  => $passHash
        ]);

        $mensaje = "¡Administrador registrado con éxito! Ya puedes borrar este archivo.";
        $tipo = "success";
    } catch (Exception $e) {
        $mensaje = "Error: " . $e->getMessage();
        $tipo = "danger";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Creador de Admin - Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f7f6; height: 100vh; display: flex; align-items: center; justify-content: center; }
        .card { width: 400px; border: none; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .btn-primary { background: #007bff; border: none; border-radius: 8px; padding: 10px; }
    </style>
</head>
<body>

<div class="card p-4">
    <h3 class="text-center mb-4">Registrar Administrador</h3>
    
    <?php if($mensaje): ?>
        <div class="alert alert-<?= $tipo ?>"><?= $mensaje ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Email del Admin</label>
            <input type="email" name="email" class="form-control" placeholder="admin@gmail.com" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nombre de Usuario</label>
            <input type="text" name="username" class="form-control" placeholder="admin" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Crear Usuario Admin</button>
    </form>
    
    <div class="mt-3 text-center">
        <small class="text-muted">Esto insertará un usuario con ROL 1 en la tabla 'usuarios'.</small>
    </div>
</div>

</body>
</html>
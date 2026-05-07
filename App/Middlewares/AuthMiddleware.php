<?php
namespace App\Middlewares;

class AuthMiddleware
{
    public static function check()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Si no existe la sesión, patada y al login
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: " . BASE_URL . "/auth/login");
            exit;
        }

        // Opcional: Expulsar tras 30 min de inactividad
        if (time() - $_SESSION['last_activity'] > 1800) {
            session_unset();
            session_destroy();
            header("Location: " . BASE_URL . "/auth/login?msg=timeout");
            exit;
        }
        $_SESSION['last_activity'] = time();
    }
}
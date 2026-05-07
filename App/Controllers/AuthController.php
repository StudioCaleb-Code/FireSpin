<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Models\Usuario;

class AuthController extends Controller
{
    public function login()
    {
        // 1. Si ya tiene sesión, al panel de una
        if (isset($_SESSION['usuario_id'])) {
            header("Location: " . BASE_URL . "/panel");
            exit;
        }

        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'emailUser', FILTER_SANITIZE_EMAIL);
            $password = $_POST['passwordUser'] ?? '';

            if ($email && $password) {
                $userModel = new Usuario();
                $user = $userModel->buscarPorEmail($email);

                if ($user && password_verify($password, $user['password'])) {
                    // Regenerar ID de sesión para evitar fijación de sesiones (SEGURIDAD)
                    session_regenerate_id(true);

                    $_SESSION['usuario_id'] = $user['id_usuario'];
                    $_SESSION['username']   = $user['username'];
                    $_SESSION['id_rol']     = $user['id_rol'];
                    $_SESSION['last_activity'] = time(); // Para control de tiempo

                    header("Location: " . BASE_URL . "/panel");
                    exit;
                } else {
                    $error = "E-mail o contraseña incorrectos.";
                }
            } else {
                $error = "Todos los campos son obligatorios.";
            }
        }

        return View::render('auth/Login', ['error' => $error]);
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();
        header("Location: " . BASE_URL . "/auth/login");
        exit;
    }
}
<?php
class Controller {
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Método para obligar a que el usuario esté logueado.
     * Si no lo está, lo manda al login.
     */
    protected function requireAuth() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login.php');
            exit();
        }
    }

    /**
     * Método útil para saber si el usuario es Admin desde cualquier sitio.
     */
    protected function isAdmin() {
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }
}
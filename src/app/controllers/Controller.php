<?php
class Controller {
    
    public function __construct() {
        // Arrancamos la sesión siempre que se instancie un controlador
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Redirección al Login
     * Si el usuario NO esta logueado
     */
    protected function requireAuth() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }
    }

    /**
     * Redirección al index
     * Si el usuario esta logueado
     */
    protected function requireGuest() {
        if (isset($_SESSION['user_id'])) {
            header('Location: /index');
            exit();
        }
    }
}

?>
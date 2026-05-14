<?php
require_once __DIR__ . '/Controller.php';

class AuthController extends Controller
{

    public function showLogin()
    {
        if (isset($_SESSION['user_id'])) {
            header('Location: /index.php');
            exit();
        }
        require_once __DIR__ . '/../views/auth/view_login.php';
    }

    public function showRegister()
    {
        if (isset($_SESSION['user_id'])) {
            header('Location: /index');
            exit();
        }
        require_once __DIR__ . '/../views/auth/view_register.php';
    }

    // Insertamos desde firebase el usuario a supabase
    public function registerUserFromFirebase()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $uid = $data['uid'] ?? null;
        $username = $data['username'] ?? null;
        $email = $data['email'] ?? null;

        if ($uid && $username && $email) {
            require_once __DIR__ . '/../config/database.php';

            try {
                // Insertamos el usuario en Supabase (PostgreSQL)
                $stmt = $pdo->prepare("INSERT INTO users (id, username, email, role) VALUES (:id, :username, :email, 'user')");
                $stmt->execute([
                    'id' => $uid,
                    'username' => $username,
                    'email' => $email
                ]);

                // Iniciamos la sesión
                $_SESSION['user_id'] = $uid;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 'user';

                echo json_encode(['success' => true]);
                exit;
            } catch (PDOException $e) {
                error_log("Error BBDD: " . $e->getMessage());
                echo json_encode(['success' => false, 'message' => 'Error de BBDD']);
                exit;
            }
        }

        echo json_encode(['success' => false, 'message' => 'Faltan datos en el servidor']);
    }

    /**
     * Recibe el UID de Firebase vía fetch(JS), comprueba Supabase y crea la sesión PHP
     */
    public function setSessionFromFirebase()
    {
        // Leemos el JSON que nos manda el fetch de JS
        $data = json_decode(file_get_contents('php://input'), true);
        $uid = $data['uid'] ?? null;

        if ($uid) {
            // Traemos la conexión a la base de datos (Supabase)
            require_once __DIR__ . '/../config/database.php';

            try {
                // Buscamos el rol y nombre del usuario
                $stmt = $pdo->prepare("SELECT username, role FROM users WHERE id = :id");
                $stmt->execute(['id' => $uid]);
                $usuario = $stmt->fetch();

                if ($usuario) {
                    // ¡Creamos la sesión de servidor!
                    $_SESSION['user_id'] = $uid;
                    $_SESSION['username'] = $usuario['username'];
                    $_SESSION['role'] = $usuario['role']; // 'admin' o 'user'

                    // Devolvemos respuesta a JS de que todo fue bien
                    echo json_encode(['success' => true]);
                    exit;
                }
            } catch (PDOException $e) {
                // Si hay error en BBDD, fallamos silenciosamente para el frontend y lo registramos
                error_log("Error en BBDD: " . $e->getMessage());
            }
        }

        // Si no hay UID o no existe el usuario, devolvemos false
        echo json_encode(['success' => false]);
    }

    public function logout()
    {
        // Aseguramos que la sesión está arrancada para poder destruirla
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_destroy();

        // Borrar cookie de recuérdame si existe
        if (isset($_COOKIE['remember_token'])) {
            setcookie('remember_token', '', time() - 3600, '/');
        }

        header('Location: /login.php');
        exit();
    }
}

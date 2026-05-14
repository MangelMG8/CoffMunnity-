<?php
require_once __DIR__ . '/Controller.php';

class AuthController extends Controller
{

    public function showLogin()
    {
        // Si cuenta con sesión se inicia
        $this->requireGuest();

        // Sin sesión pero con cookie se inicia
        if (isset($_COOKIE['remember_me'])) {
            require_once __DIR__ . '/../config/database.php';
            $token = $_COOKIE['remember_me'];

            try {
                $stmt = $pdo->prepare("SELECT id, username, role FROM users WHERE remember_token = :token");
                $stmt->execute(['token' => $token]);
                $usuario = $stmt->fetch();

                if ($usuario) {
                    $_SESSION['user_id'] = $usuario['id'];
                    $_SESSION['username'] = $usuario['username'];
                    $_SESSION['role'] = $usuario['role'];

                    header('Location: /index');
                    exit();
                }
            } catch (PDOException $e) {
                error_log("Error al comprobar la cookie: " . $e->getMessage());
            }
        }

        // Sin cookie ni sesión se muestar el login
        require_once __DIR__ . '/../views/auth/view_login.php';
    }

    public function showRegister()
    {
        $this->requireGuest();

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
        $remember  = $data['remember'] ?? false;

        if ($uid) {
            // Traemos la conexión a la base de datos (Supabase)
            require_once __DIR__ . '/../config/database.php';

            try {
                // Buscamos el rol y nombre del usuario
                $stmt = $pdo->prepare("SELECT username, role FROM users WHERE id = :id");
                $stmt->execute(['id' => $uid]);
                $usuario = $stmt->fetch();

                if ($usuario) {
                    $_SESSION['user_id'] = $uid;
                    $_SESSION['username'] = $usuario['username'];
                    $_SESSION['role'] = $usuario['role'];

                    if ($remember) {
                        // Generamos un token aleatorio seguro
                        $token = bin2hex(random_bytes(32));

                        // Y lo guardamos en la table de users
                        $upd = $pdo->prepare("UPDATE users SET remember_token = :token WHERE id = :id");
                        $upd->execute(['token' => $token, 'id' => $uid]);

                        setcookie('remember_me', $token, time() + 2592000, "/", "", false, true);
                    }
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

        header('Location: /login');
        exit();
    }
}

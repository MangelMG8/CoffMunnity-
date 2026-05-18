<?php
require_once __DIR__ . '/Controller.php';

class EditProfileController extends Controller
{

    public function showEditProfile()
    {
        $this->requireAuth();

        require_once __DIR__ . '/../config/database.php';
        $userId = $_SESSION['user_id'];
        $userData = [];

        try {
            // AÑADIDOS LOS NUEVOS CAMPOS AQUÍ:
            $stmt = $pdo->prepare("SELECT username, email, bio, favorite_coffee, first_name, last_name, birth_date, profile_pic FROM users WHERE id = :id");
            $stmt->execute(['id' => $userId]);
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error al cargar perfil para editar: " . $e->getMessage());
        }

        require_once __DIR__ . '/../views/profile/view_edit_profile.php';
    }

    public function updateProfileApi()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'No autorizado']);
            exit;
        }

        // Recogemos los textos directamente de $_POST
        $userId         = $_SESSION['user_id'];
        $bio            = trim($_POST['bio'] ?? '');
        $favoriteCoffee = trim($_POST['favorite_coffee'] ?? '');
        $firstName      = trim($_POST['first_name'] ?? '');
        $lastName       = trim($_POST['last_name'] ?? '');
        $birthDate      = !empty($_POST['birth_date']) ? $_POST['birth_date'] : null;

        $profilePicPath = null;

        // LÓGICA DE SUBIDA DE IMAGEN
        // Verificamos si llegó un archivo y si no hubo errores en la subida
        if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../public/assets/img/users/';

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $fileTmpPath = $_FILES['profile_pic']['tmp_name'];
            $fileName    = $_FILES['profile_pic']['name'];
            $fileSize    = $_FILES['profile_pic']['size'];
            $fileExt     = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            // Validaciones de seguridad
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
            if (!in_array($fileExt, $allowedExtensions)) {
                echo json_encode(['success' => false, 'message' => 'Formato de imagen no permitido (solo JPG, PNG, WEBP).']);
                exit;
            }


            // Ponemos un limite a la imagen
            if ($fileSize > 5 * 1024 * 1024) {
                echo json_encode(['success' => false, 'message' => 'La imagen es demasiado grande. Máximo 5MB.']);
                exit;
            }

            // Generamos un nombre único para que no se llamen igual
            $newFileName = 'user_' . $userId . '_' . time() . '.' . $fileExt;
            $destination = $uploadDir . $newFileName;

            // Movemos el archivo de la memoria temporal del servidor a la carpeta final
            if (move_uploaded_file($fileTmpPath, $destination)) {
                $profilePicPath = '/assets/img/users/' . $newFileName;
            } else {
                echo json_encode(['success' => false, 'message' => 'Error al guardar la imagen en el disco.']);
                exit;
            }
        }

        require_once __DIR__ . '/../config/database.php';

        try {
            $sql = "UPDATE users SET 
                        bio = :bio, 
                        favorite_coffee = :favorite_coffee,
                        first_name = :first_name, 
                        last_name = :last_name, 
                        birth_date = :birth_date";

            $params = [
                'bio'             => $bio,
                'favorite_coffee' => $favoriteCoffee,
                'first_name'      => $firstName,
                'last_name'       => $lastName,
                'birth_date'      => $birthDate,
                'id'              => $userId
            ];

            if ($profilePicPath !== null) {
                $sql .= ", profile_pic = :profile_pic";
                $params['profile_pic'] = $profilePicPath;
            }

            $sql .= " WHERE id = :id";

            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);

            if ($profilePicPath !== null) {
                $_SESSION['profile_pic'] = $profilePicPath;
            }

            echo json_encode(['success' => true]);
            exit;
        } catch (PDOException $e) {
            error_log("Error API Perfil: " . $e->getMessage());
            echo json_encode(['success' => false, 'message' => 'Error en la base de datos al guardar los datos.']);
            exit;
        }
    }
}

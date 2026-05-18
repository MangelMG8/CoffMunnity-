<?php
// src/app/controllers/ProfileController.php
require_once __DIR__ . '/Controller.php';

class ProfileController extends Controller
{
    public function showProfile()
    {
        $this->requireAuth();
        require_once __DIR__ . '/../config/database.php';

        $loggedInUserId = $_SESSION['user_id'];
        $profileId = isset($_GET['id']) ? (int)$_GET['id'] : $loggedInUserId;
        
        // Detectamos si es el perfil de que esta visitando
        $isOwnProfile = ($profileId === $loggedInUserId);

        try {
            $stmt = $pdo->prepare("SELECT username, first_name, last_name, profile_pic, bio, favorite_coffee, created_at FROM users WHERE id = :id");
            $stmt->execute(['id' => $profileId]);
            $profileData = $stmt->fetch(PDO::FETCH_ASSOC);

            // Si no existe el perfil
            if (!$profileData) {
                header("Location: /index.php");
                exit;
            }
        } catch (PDOException $e) {
            error_log("Error al cargar perfil público: " . $e->getMessage());
            header("Location: /index.php");
            exit;
        }

        // Estadísticas simuladas (Cambiar en el futuro)
        $stats = [
            'posts' => 14,
            'followers' => 128,
            'following' => 85
        ];

        require_once __DIR__ . '/../views/profile/view_profile.php';
    }
}
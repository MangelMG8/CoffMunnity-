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
        
        $profileId = isset($_GET['id']) ? $_GET['id'] : $loggedInUserId;
        $isOwnProfile = ($profileId === $loggedInUserId);

        try {
            $stmt = $pdo->prepare("SELECT username, first_name, last_name, profile_pic, bio, favorite_coffee, created_at FROM users WHERE id = :id");
            $stmt->execute(['id' => $profileId]);
            $profileData = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$profileData) {
                header("Location: /index.php");
                exit;
            }

            $stats = ['posts' => 0, 'followers' => 0, 'following' => 0];

            $stmtPosts = $pdo->prepare("SELECT COUNT(*) FROM posts WHERE user_id = :id");
            $stmtPosts->execute(['id' => $profileId]);
            $stats['posts'] = $stmtPosts->fetchColumn();

            $stmtFollowers = $pdo->prepare("SELECT COUNT(*) FROM follows WHERE following_id = :id");
            $stmtFollowers->execute(['id' => $profileId]);
            $stats['followers'] = $stmtFollowers->fetchColumn();

            $stmtFollowing = $pdo->prepare("SELECT COUNT(*) FROM follows WHERE follower_id = :id");
            $stmtFollowing->execute(['id' => $profileId]);
            $stats['following'] = $stmtFollowing->fetchColumn();

            $isFollowing = false;
            if (!$isOwnProfile) {
                $stmtCheck = $pdo->prepare("SELECT 1 FROM follows WHERE follower_id = :me AND following_id = :them");
                $stmtCheck->execute(['me' => $loggedInUserId, 'them' => $profileId]);
                $isFollowing = (bool)$stmtCheck->fetchColumn();
            }

        } catch (PDOException $e) {
            error_log("Error al cargar perfil público: " . $e->getMessage());
            header("Location: /index.php");
            exit;
        }

        require_once __DIR__ . '/../views/profile/view_profile.php';
    }
}
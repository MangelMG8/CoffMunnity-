<?php
// src/app/controllers/FollowController.php
require_once __DIR__ . '/Controller.php';

class FollowController extends Controller
{
    public function toggleFollow()
    {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        header('Content-Type: application/json');

        // Protegemos el endpoint
        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'No autorizado']);
            exit;
        }

        // Recibimos los datos del fetch
        $input = json_decode(file_get_contents('php://input'), true);
        $targetId = $input['target_id'] ?? null;
        $myId = $_SESSION['user_id'];

        if (!$targetId || $targetId === $myId) {
            echo json_encode(['success' => false, 'message' => 'Petición inválida']);
            exit;
        }

        require_once __DIR__ . '/../config/database.php';

        try {
            // Comprobamos si ya lo sigo
            $stmt = $pdo->prepare("SELECT 1 FROM follows WHERE follower_id = :me AND following_id = :them");
            $stmt->execute(['me' => $myId, 'them' => $targetId]);
            $isFollowing = $stmt->fetchColumn();

            if ($isFollowing) {
                // Dejar de seguir
                $stmtDel = $pdo->prepare("DELETE FROM follows WHERE follower_id = :me AND following_id = :them");
                $stmtDel->execute(['me' => $myId, 'them' => $targetId]);
                $action = 'unfollowed';
            } else {
                // Seguir
                $stmtIns = $pdo->prepare("INSERT INTO follows (follower_id, following_id) VALUES (:me, :them)");
                $stmtIns->execute(['me' => $myId, 'them' => $targetId]);
                $action = 'followed';
            }

            // Contamos cuántos seguidores tiene ahora el usuario
            $stmtCount = $pdo->prepare("SELECT COUNT(*) FROM follows WHERE following_id = :them");
            $stmtCount->execute(['them' => $targetId]);
            $newFollowers = $stmtCount->fetchColumn();

            echo json_encode([
                'success' => true, 
                'action' => $action, 
                'newFollowers' => $newFollowers
            ]);

        } catch (PDOException $e) {
            error_log("Error API Follow: " . $e->getMessage());
            echo json_encode(['success' => false, 'message' => 'Error de base de datos']);
        }
    }
}
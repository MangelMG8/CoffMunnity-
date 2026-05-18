<?php
session_start();

require_once __DIR__ . '/../app/config/database.php'; // Tu conexión PDO a Supabase

$user_id = "el_id_del_usuario_actual";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $rating = $_POST['rating'] ?? null;
    $prep_time = $_POST['prep_time_minutes'] ?? null;
    $read_time = $_POST['reading_time_minutes'] ?? null;
    $buy_link = $_POST['buy_link'] ?? null;

    try {
        $sql = "INSERT INTO posts (user_id, title, content, type, rating, prep_time_minutes, reading_time_minutes, buy_link) 
                VALUES (:user, :title, :content, :type, :rating, :prep, :read, :link) 
                RETURNING id";
                
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':user' => $user_id,
            ':title' => $title,
            ':content' => $content,
            ':type' => $type,
            ':rating' => $rating,
            ':prep' => $prep_time,
            ':read' => $read_time,
            ':link' => $buy_link
        ]);

        // Guardamos el ID del post
        $newPostId = $stmt->fetchColumn();

        if (!empty($_FILES['images']['name'][0])) {
            $total_images = count($_FILES['images']['name']);
            
            for ($i = 0; $i < $total_images; $i++) {
                $tmpFilePath = $_FILES['images']['tmp_name'][$i];
                
                if ($tmpFilePath != "") {
                    $filename = time() . '-' . basename($_FILES['images']['name'][$i]);
                    $dest_path = __DIR__ . '/../public/assets/img/posts/' . $filename;
                    
                    if(move_uploaded_file($tmpFilePath, $dest_path)) {
                        $image_url = '/assets/img/posts/' . $filename;
                        
                        $sqlImg = "INSERT INTO post_images (post_id, image_url, display_order) VALUES (?, ?, ?)";
                        $pdo->prepare($sqlImg)->execute([$newPostId, $image_url, $i]);
                    }
                }
            }
        }

        //header("Location: /post_detail.php?id=" . $newPostId);
        header("Location: /index");
        exit();

    } catch (PDOException $e) {
        die("Error al guardar: " . $e->getMessage());
    }
}
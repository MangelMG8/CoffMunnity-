<?php 
require_once __DIR__ . '/../app/config/database.php';
include_once __DIR__ . '/../app/includes/header.php'; 
?>

<main class="main-content">
    <div class="card">
        <h1>Bienvenido</h1>
        <p>Estás en el corazón de <strong>CoffMunnity</strong>.</p>
        
        <div class="status-badge">
            <?php echo $db_status; ?>
        </div>
    </div>
</main>

<?php 
include_once __DIR__ . '/../app/includes/footer.php'; 
?>
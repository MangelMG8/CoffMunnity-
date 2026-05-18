<?php
// Suponiendo que incluyes el header aquí
$extraCss   = '/assets/css/create-post.css';

require_once __DIR__ . '/../app/includes/header.php';
?>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<main class="create-post-main">
    <div class="create-post-container">
        <h1 class="create-post-title">☕ Crear Nueva Publicación</h1>
        <p class="create-post-subtitle">Comparte tu pasión por el café con la comunidad.</p>

        <form class="cp-form" id="createPostForm" action="/api/create_post_api.php" method="POST" enctype="multipart/form-data">

            <div class="cp-group">
                <label for="post_type" class="cp-label">¿Qué vas a compartir?</label>
                <select name="type" id="post_type" class="cp-input cp-select" required>
                    <option value="" disabled selected>Selecciona un tipo...</option>
                    <option value="story">Historia (Momentos cafeteros)</option>
                    <option value="review">Reseña (Cafeterías o granos)</option>
                    <option value="recipe">Receta (Preparaciones)</option>
                    <option value="article">Artículo (Recomendaciones / Compras)</option>
                </select>
            </div>

            <div class="cp-group">
                <label for="title" class="cp-label">Título</label>
                <input type="text" id="title" name="title" class="cp-input" placeholder="Ej: Mi mañana con un Espresso perfecto..." required>
            </div>
            <div class="cp-group">
                <label for="content" class="cp-label">Contenido</label>
                <div id="quill-editor" style="height: 250px; background: white; border-radius: 0 0 8px 8px;"></div>

                <input type="hidden" name="content" id="hidden_content" required>
            </div>
            <div class="cp-group">
                <label for="images" class="cp-label">Añadir Imágenes (Opcional)</label>
                <input type="file" id="images" name="images[]" class="cp-input cp-file" accept="image/png, image/jpeg, image/webp" multiple>
                <small class="cp-hint">Puedes subir varias imágenes a la vez.</small>
            </div>

            <div id="dynamic_review" class="cp-dynamic-section hidden">
                <div class="cp-group">
                    <label for="rating" class="cp-label">Puntuación (1 al 5)</label>
                    <input type="number" id="rating" name="rating" class="cp-input" min="1" max="5" placeholder="Ej: 5">
                </div>
            </div>

            <div id="dynamic_recipe" class="cp-dynamic-section hidden">
                <div class="cp-group">
                    <label for="prep_time_minutes" class="cp-label">Tiempo de Preparación (minutos)</label>
                    <input type="number" id="prep_time_minutes" name="prep_time_minutes" class="cp-input" min="1" placeholder="Ej: 15">
                </div>
            </div>

            <div id="dynamic_article" class="cp-dynamic-section hidden">
                <div class="cp-group">
                    <label for="reading_time_minutes" class="cp-label">Tiempo de Lectura (minutos)</label>
                    <input type="number" id="reading_time_minutes" name="reading_time_minutes" class="cp-input" min="1" placeholder="Ej: 5">
                </div>
                <div class="cp-group">
                    <label for="buy_link" class="cp-label">Enlace de Compra (Opcional)</label>
                    <input type="url" id="buy_link" name="buy_link" class="cp-input" placeholder="https://...">
                </div>
            </div>

            <button type="submit" class="cp-submit-btn">Publicar ahora</button>
        </form>
    </div>
</main>

<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script src="/assets/js/pages/create-post.js"></script>

<?php
require_once __DIR__ . '/../app/includes/footer.php';
?>
<?php

$profilePic = $profilePic ?? '/assets/img/user.png';

$pageTitle  = 'Zona Principal — CoffMunnity ☕';
$activePage = 'index';

include_once __DIR__ . '/../../includes/header.php';
?>

<div class="zona-header">
    <h1 class="zona-title">Zona Principal</h1>
</div>

<div class="search-wrap">
    <div class="search-box">
        <i class=\"fa-solid fa-magnifying-glass search-icon\"></i>
        <input type="text" class="search-input" placeholder="Filtro" id="searchInput">
        <button class="search-mic" aria-label="Búsqueda por voz">
            <i class="fa-solid fa-microphone"></i>
        </button>
    </div>
    <div class="filter-tags">
        <button class="filter-tag active">Todos</button>
        <button class="filter-tag">Reseñas</button>
        <button class="filter-tag">Historias</button>
        <button class="filter-tag">Recetas</button>
        <button class="filter-tag">Artículos</button>
    </div>
</div>

<div class="feed">

    <div class="post-card create-post-box" style="padding: 20px; background: var(--color-cream); border-radius: 12px; margin-bottom: 25px; box-shadow: var(--shadow-sm); display: flex; align-items: center; gap: 15px;">
        <div class="post-avatar" style="width: 45px; height: 45px; flex-shrink: 0;">
            <img src="<?= htmlspecialchars($profilePic) ?>" alt="Mi perfil" class="avatar-img" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover; border: 2px solid var(--color-caramel);">
        </div>
        <div style="flex: 1;">
            <input type="text" placeholder="¿Qué café estás extrayendo hoy, @<?= htmlspecialchars($_SESSION['username'] ?? 'barista') ?>?" style="width: 100%; padding: 12px 15px; border: 1.5px solid rgba(107,58,42,0.2); border-radius: 25px; background: #FFF; font-family: var(--font); font-size: 0.9rem; outline: none; box-sizing: border-box; cursor: pointer;" onclick="window.location.href='/create-post'">
        </div>
    </div>

    <article class="post-card" data-tipo="reseña">
        <div class="post-meta">
            <div class="post-titulo-col">
                <span class="post-label">Titulo</span>
                <span class="post-tipo tipo-resena">Reseña</span>
            </div>
            <div class="post-content-col">
                <p class="post-excerpt">Lorem ipsum dolor sit amet consectet adipiscing elit, sed do eiusmod tempor.</p>
                <div class="post-footer">
                    <span class="post-date">Hace 2 horas</span>
                    <div class="post-actions">
                        <button class="action-btn"><i class="fa-solid fa-heart"></i> 12</button>
                        <button class="action-btn"><i class="fa-solid fa-comment"></i> 4</button>
                    </div>
                </div>
            </div>
            <div class="post-avatar-col">
                <div class="post-avatar">
                    <img src="/assets/img/user.png" alt="Avatar usuario" class="avatar-img">
                </div>
            </div>
        </div>
    </article>

    <article class="post-card" data-tipo="articulo">
        <div class="post-meta">
            <div class="post-titulo-col">
                <span class="post-label">Titulo</span>
                <span class="post-tipo tipo-articulo">Articulo</span>
            </div>
            <div class="post-content-col">
                <p class="post-excerpt">Lorem ipsum dolor sit amet consectet adipiscing elit, sed do eiusmod tempor.</p>
                <div class="post-footer">
                    <span class="post-date">Hace 2 días</span>
                    <div class="post-actions">
                        <button class="action-btn"><i class="fa-solid fa-heart"></i> 7</button>
                        <button class="action-btn"><i class="fa-solid fa-comment"></i> 2</button>
                    </div>
                </div>
            </div>
            <div class="post-avatar-col">
                <div class="post-avatar">
                    <img src="/assets/img/user.png" alt="Avatar usuario" class="avatar-img">
                </div>
            </div>
        </div>
    </article>

</div>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
<?php
  require_once __DIR__ . '/../app/config/database.php';

  $pageTitle  = 'Zona Principal — CoffMunnity ☕';
  $activePage = 'menu1';

  include_once __DIR__ . '/../app/includes/header.php';
?>

      <div class="zona-header">
        <h1 class="zona-title">Zona Principal</h1>
      </div>

      <div class="search-wrap">
        <div class="search-box">
          <i class="fa-solid fa-magnifying-glass search-icon"></i>
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

        <article class="post-card" data-tipo="historia">
          <div class="post-meta">
            <div class="post-titulo-col">
              <span class="post-label">Titulo</span>
              <span class="post-tipo tipo-historia">Historia</span>
            </div>
            <div class="post-content-col">
              <p class="post-excerpt">Lorem ipsum dolor sit amet consectet adipiscing elit, sed do eiusmod tempor.</p>
              <div class="post-footer">
                <span class="post-date">Hace 5 horas</span>
                <div class="post-actions">
                  <button class="action-btn"><i class="fa-solid fa-heart"></i> 28</button>
                  <button class="action-btn"><i class="fa-solid fa-comment"></i> 9</button>
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

        <article class="post-card" data-tipo="receta">
          <div class="post-meta">
            <div class="post-titulo-col">
              <span class="post-label">Titulo</span>
              <span class="post-tipo tipo-receta">Receta</span>
            </div>
            <div class="post-content-col">
              <p class="post-excerpt">Lorem ipsum dolor sit amet consectet adipiscing elit, sed do eiusmod tempor.</p>
              <div class="post-footer">
                <span class="post-date">Ayer</span>
                <div class="post-actions">
                  <button class="action-btn"><i class="fa-solid fa-heart"></i> 41</button>
                  <button class="action-btn"><i class="fa-solid fa-comment"></i> 17</button>
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

<?php 
  include_once __DIR__ . '/../app/includes/footer.php'; 
?>
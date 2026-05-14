<?php
require_once __DIR__ . '/../../includes/header.php';
?>

<link rel="stylesheet" href="assets/css/profile.css" />

<main class="profile-page">

  <!-- ── HERO BANNER ── -->
  <div class="profile-hero">
    <div class="profile-hero__banner"></div>

    <div class="profile-hero__identity">
      <div class="profile-avatar">
        <img src="assets/img/user.png" alt="Avatar de MiguelCoffee" class="profile-avatar__img" />
        <span class="profile-avatar__badge" title="Barista certificado">☕</span>
      </div>

      <div class="profile-hero__info">
        <h1 class="profile-username">@miguelcoffee</h1>
        <p class="profile-displayname">Miguel Ángel Ruiz</p>

        <div class="profile-stats">
          <div class="profile-stats__item">
            <span class="profile-stats__num">142</span>
            <span class="profile-stats__label">publicaciones</span>
          </div>
          <div class="profile-stats__item">
            <span class="profile-stats__num">3.8k</span>
            <span class="profile-stats__label">seguidores</span>
          </div>
          <div class="profile-stats__item">
            <span class="profile-stats__num">210</span>
            <span class="profile-stats__label">siguiendo</span>
          </div>
        </div>
      </div>
    </div>

    <p class="profile-bio">
      Barista de tercera ola en Elche. Obsesionado con los orígenes etíopes y los fermentados.
      Comparto recetas, historias del sector y reseñas honestas de cada taza que me pasa por las manos. ☕🌍
    </p>

    <div class="profile-tags">
      <span class="profile-tag">Especialidad</span>
      <span class="profile-tag">Fermentados</span>
      <span class="profile-tag">Etiopía</span>
      <span class="profile-tag">Barismo</span>
    </div>
  </div>

  <!-- ── CONTENIDO: TABS + PUBLICACIONES ── -->
  <section class="profile-content">

    <nav class="profile-tabs" role="tablist" aria-label="Filtro de publicaciones">
      <button class="profile-tab profile-tab--active" data-tab="all" role="tab" aria-selected="true">Todo</button>
      <button class="profile-tab" data-tab="recipe" role="tab" aria-selected="false">Recetas</button>
      <button class="profile-tab" data-tab="review" role="tab" aria-selected="false">Reseñas</button>
      <button class="profile-tab" data-tab="story" role="tab" aria-selected="false">Historias</button>
      <button class="profile-tab" data-tab="article" role="tab" aria-selected="false">Articulo</button>
    </nav>

    <div class="profile-grid" id="profile-grid">
      <!-- RECETA -->
      <article class="pcard pcard--recipe" data-type="recipe">
        <div class="pcard__header">
          <span class="pcard__pill pcard__pill--recipe">Receta</span>
          <time class="pcard__date">19 mar 2025</time>
        </div>
        <h2 class="pcard__title">Cold brew concentrado en 12 horas</h2>
        <p class="pcard__excerpt">Sin calor, sin prisa. El método que uso para conseguir un concentrado sedoso para toda la semana.</p>
        <div class="pcard__meta">
          <span class="pcard__meta-item">⏱ 12 h</span>
          <span class="pcard__meta-item">❤️ 341</span>
          <span class="pcard__meta-item">💬 54</span>
        </div>
        <a href="post.php?id=4" class="pcard__link">Leer receta →</a>
      </article>

      <!-- RESEÑA -->
      <article class="pcard pcard--review" data-type="review">
        <div class="pcard__header">
          <span class="pcard__pill pcard__pill--review">Reseña</span>
          <time class="pcard__date">10 mar 2025</time>
        </div>
        <h2 class="pcard__title">Nomad Coffee – Espresso de Temporada</h2>
        <div class="pcard__stars" aria-label="5 de 5 estrellas">
          <span class="pcard__star pcard__star--on">★</span>
          <span class="pcard__star pcard__star--on">★</span>
          <span class="pcard__star pcard__star--on">★</span>
          <span class="pcard__star pcard__star--on">★</span>
          <span class="pcard__star pcard__star--on">★</span>
        </div>
        <p class="pcard__excerpt">Barceloneses con alma de viajero. Este blend de temporada es redondo, sin aristas y adictivo.</p>
        <div class="pcard__meta">
          <span class="pcard__meta-item">❤️ 278</span>
          <span class="pcard__meta-item">💬 33</span>
        </div>
        <a href="post.php?id=5" class="pcard__link">Leer reseña →</a>
      </article>

      <!-- HISTORIA -->
      <article class="pcard pcard--story" data-type="story">
        <div class="pcard__header">
          <span class="pcard__pill pcard__pill--story">Historia</span>
          <time class="pcard__date">1 mar 2025</time>
        </div>
        <h2 class="pcard__title">Mi primer campeonato de barismo: el fracaso que más me enseñó</h2>
        <p class="pcard__excerpt">Quedé penúltimo. Y fue la mejor experiencia formativa de mi carrera. Te cuento qué salió mal y por qué no me arrepiento.</p>
        <div class="pcard__meta">
          <span class="pcard__meta-item">📖 4 min lectura</span>
          <span class="pcard__meta-item">❤️ 423</span>
          <span class="pcard__meta-item">💬 71</span>
        </div>
        <a href="post.php?id=6" class="pcard__link">Leer historia →</a>
      </article>

    </div>
  </section>
<button id="btn-logout" style="padding: 10px; background: red; color: white; cursor: pointer;">Cerrar Sesión (Test)</button>
</main>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>

<script src="assets/js/pages/profile.js"></script>
<?php
$pageTitle = '@' . htmlspecialchars($profileData['username']) . ' — Coffmunnity ☕';
$activePage = 'perfil';
$extraCss = '/assets/css/profile.css';

require_once __DIR__ . '/../../includes/header.php';

$profilePic = !empty($profileData['profile_pic']) ? $profileData['profile_pic'] : '/assets/img/user.png';
$fullName = trim(($profileData['first_name'] ?? '') . ' ' . ($profileData['last_name'] ?? ''));
$bio = $profileData['bio'] ?? '';
$favoriteCoffee = $profileData['favorite_coffee'] ?? '';

$coffeeLabels = [
  'espresso' => 'Espresso',
  'cappuccino' => 'Cappuccino',
  'flat_white' => 'Flat White',
  'v60' => 'V60 / Filtrado',
  'chemex' => 'Chemex',
  'aeropress' => 'Aeropress',
  'moka' => 'Cafetera Italiana / Moka',
  'cold_brew' => 'Cold Brew',
  'latte' => 'Café Latte',
  'latte_art' => 'Café con Latte Art'
];
$coffeeDisplay = $coffeeLabels[$favoriteCoffee] ?? $favoriteCoffee;
?>

<div class="profile-page">

  <div class="profile-hero">
    <div class="profile-hero__banner"></div>

    <div class="profile-hero__identity">
      <div class="profile-avatar">
        <img src="<?= htmlspecialchars($profilePic) ?>" alt="Avatar" class="profile-avatar__img" />
        <span class="profile-avatar__badge">☕</span>
      </div>

      <div class="profile-hero__info">
        <div class="profile-header-row">
          <h1 class="profile-username">@<?= htmlspecialchars($profileData['username']) ?></h1>

          <div class="profile-actions">
            <?php if ($isOwnProfile): ?>
              <a href="/edit-profile" class="profile-action-btn edit-btn"><i class="fa-solid fa-user-gear"></i> Editar perfil</a>
            <?php else: ?>
              <button
                class="profile-action-btn follow-btn <?= $isFollowing ? 'following' : '' ?>"
                id="btn-follow"
                data-userid="<?= htmlspecialchars($profileId) ?>">
                <?php if ($isFollowing): ?>
                  <i class="fa-solid fa-user-check"></i> Siguiendo
                <?php else: ?>
                  <i class="fa-solid fa-user-plus"></i> Seguir
                <?php endif; ?>
              </button>
            <?php endif; ?>
          </div>
        </div>

        <?php if ($fullName): ?>
          <p class="profile-displayname"><?= htmlspecialchars($fullName) ?></p>
        <?php endif; ?>

        <div class="profile-stats">
          <div class="profile-stats__item">
            <span class="profile-stats__num"><?= $stats['posts'] ?></span>
            <span class="profile-stats__label">publicaciones</span>
          </div>
          <div class="profile-stats__item">
            <span class="profile-stats__num" id="followers-count"><?= $stats['followers'] ?></span>
            <span class="profile-stats__label">seguidores</span>
          </div>
          <div class="profile-stats__item">
            <span class="profile-stats__num"><?= $stats['following'] ?></span>
            <span class="profile-stats__label">siguiendo</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php if ($bio): ?>
    <p class="profile-bio"><?= nl2br(htmlspecialchars($bio)) ?></p>
  <?php else: ?>
    <?php if ($isOwnProfile): ?>
      <p class="profile-bio" style="color: var(--color-caramel); font-style: italic; opacity: 0.7;">Aún no has escrito una biografía. ¡Anímate a editar tu perfil!</p>
    <?php endif; ?>
  <?php endif; ?>

  <div class="profile-tags">
    <span class="profile-tag"><i class="fa-solid fa-calendar-days"></i> Miembro desde <?= date('M Y', strtotime($profileData['created_at'])) ?></span>
    <?php if ($coffeeDisplay): ?>
      <span class="profile-tag"><i class="fa-solid fa-mug-hot"></i> Favorito: <?= htmlspecialchars($coffeeDisplay) ?></span>
    <?php endif; ?>
  </div>
</div>

<div class="profile-filter-wrap">
  <div class="profile-filter-tabs">
    <button class="profile-filter-btn active" data-filter="all">Todos</button>
    <button class="profile-filter-btn" data-filter="review">Reseñas</button>
    <button class="profile-filter-btn" data-filter="story">Historias</button>
  </div>
</div>

<div class="profile-posts-grid">
  <article class="pcard pcard--review" data-type="review">
    <div class="pcard__header">
      <span class="pcard__pill pcard__pill--review">Reseña</span>
      <time class="pcard__date">Hace 2 días</time>
    </div>
    <h2 class="pcard__title">Nomad Coffee: Blend de temporada</h2>
    <div class="pcard__rating">
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
    <a href="#" class="pcard__link">Leer reseña →</a>
  </article>

  <article class="pcard pcard--story" data-type="story">
    <div class="pcard__header">
      <span class="pcard__pill pcard__pill--story">Historia</span>
      <time class="pcard__date">1 mar 2026</time>
    </div>
    <h2 class="pcard__title">Mi primer campeonato de barismo: el fracaso que más me enseñó</h2>
    <p class="pcard__excerpt">Quedé penúltimo. Y fue la mejor experiencia formativa de mi carrera. Te cuento qué salió mal y por qué no me arrepiento.</p>
    <div class="pcard__meta">
      <span class="pcard__meta-item">📖 4 min lectura</span>
      <span class="pcard__meta-item">❤️ 423</span>
      <span class="pcard__meta-item">💬 89</span>
    </div>
    <a href="#" class="pcard__link">Leer historia →</a>
  </article>
</div>

</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>
<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$lang = require_once __DIR__ . '/../lang/es.php';
$pageTitle  = $pageTitle  ?? 'CoffMunnity';
$activePage = $activePage ?? 'index';
$extraCss   = $extraCss   ?? null;

$sessionUser = $_SESSION['username'] ?? 'usuario';
$sessionAvatar = '/assets/img/user.png';

if (isset($_SESSION['user_id'])) {
  try {
    require_once __DIR__ . '/../config/database.php';

    $stmt = $pdo->prepare("SELECT profile_pic FROM users WHERE id = :id");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($userRow && !empty($userRow['profile_pic'])) {
      $sessionAvatar = $userRow['profile_pic'];
    }
  } catch (PDOException $e) {
    error_log("Error al cargar la foto de perfil en el Header: " . $e->getMessage());
  }
}

function isActive(string $page, string $current): string
{
  return $page === $current ? ' active' : '';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <link rel="icon" href="/assets/img/logo.svg" type="image/svg+xml">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <link rel="stylesheet" href="/assets/css/css.css">
  <link rel="stylesheet" href="/assets/css/index.css">
  <link rel="stylesheet" href="/assets/css/modals/modals.css">
  <link rel="stylesheet" href="/assets/css/modals/generic-modal.css" />
  <?php if ($extraCss): ?>
    <link rel="stylesheet" href="<?= htmlspecialchars($extraCss) ?>">
  <?php endif; ?>
</head>

<body>

  <header class="topbar">
    <div class="topbar-left">
      <button class="hamburger" id="hamburgerBtn" aria-label="Abrir menú">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a href="/index.php" class="brand">
        <span><?= htmlspecialchars($lang['global']['app_name'] ?? 'CoffMunnity') ?></span>
        <img src="/assets/img/logo.svg" alt="Logo" class="brand-logo" />
      </a>
    </div>

    <div class="topbar-right">
      <a href="/profile" class="topbar-profile-link" title="Ver mi perfil">
        <span class="topbar-username"><?= htmlspecialchars($sessionUser) ?></span>
        <div class="topbar-avatar-wrapper">
          <img src="<?= htmlspecialchars($sessionAvatar) ?>" alt="Mi Perfil" class="topbar-avatar-img">
        </div>
      </a>
    </div>
  </header>

  <div class="layout">
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <aside class="sidebar" id="sidebar">
      <nav class="sidebar-nav">
        <a href="/index.php" class="sidebar-link<?= isActive('index', $activePage) ?>">
          <span class="sidebar-link-inner">
            <i class="fa-solid fa-house sidebar-link-icon"></i>
            <span class="sidebar-link-text">Inicio</span>
          </span>
          <span class="sidebar-link-hover-bar"></span>
        </a>

        <a href="/coffe-map" class="sidebar-link<?= isActive('map', $activePage) ?>">
          <span class="sidebar-link-inner">
            <i class="fa-solid fa-location-dot sidebar-link-icon"></i>
            <span class="sidebar-link-text">Cafés cercanos</span>
          </span>
          <span class="sidebar-link-hover-bar"></span>
        </a>

        <a href="/menu3.php" class="sidebar-link<?= isActive('menu3', $activePage) ?>">
          <span class="sidebar-link-inner">
            <i class="fa-solid fa-compass sidebar-link-icon"></i>
            <span class="sidebar-link-text">Explorar</span>
          </span>
          <span class="sidebar-link-hover-bar"></span>
        </a>

        <a href="/settings.php" class="sidebar-link sidebar-link--settings <?= isActive('settings', $activePage) ?>">
          <span class="sidebar-link-inner">
            <i class="fa-solid fa-gear sidebar-link-icon"></i>
            <span class="sidebar-link-text">Ajustes</span>
          </span>
          <span class="sidebar-link-hover-bar"></span>
        </a>
      </nav>

      <div class="sidebar-bottom">
        <div class="sidebar-deco">☕</div>
        <a href="/logout.php" class="sidebar-logout">
          <i class="fa-solid fa-right-from-bracket"></i>
          <span>Cerrar sesión</span>
        </a>
      </div>
    </aside>

    <main class="main">
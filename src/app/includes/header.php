<?php
$pageTitle  = $pageTitle  ?? 'CoffMunnity ☕';
$activePage = $activePage ?? 'index';
$extraCss   = $extraCss   ?? null;

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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <link rel="stylesheet" href="/assets/css/css.css">
  <link rel="stylesheet" href="/assets/css/index.css">
  <link rel="stylesheet" href="/assets/css/modals.css">
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
        Coffe Communnity <span class="brand-icon">☕</span>
      </a>
    </div>
    <div class="topbar-right">
      <a href="/perfil.php" class="avatar-wrap" aria-label="Ver perfil">
        <img src="/assets/img/user.png" alt="Avatar usuario" class="avatar-img">
      </a>
    </div>
  </header>

  <div class="layout">

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

      </nav>

      <div class="sidebar-bottom">
        <div class="sidebar-deco">☕</div>
        <a href="/logout.php" class="sidebar-logout">
          <i class="fa-solid fa-right-from-bracket"></i>
          <span>Cerrar sesión</span>
        </a>
      </div>
    </aside>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <main class="main">
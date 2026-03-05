<?php
  $pageTitle  = $pageTitle  ?? 'CoffMunnity ☕';
  $activePage = $activePage ?? 'menu1';
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
  <link rel="stylesheet" href="/assets/css/css.css">
  <link rel="stylesheet" href="/assets/css/index.css">

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
      <button class="btn-perfil">
        Perfil <span class="dots">···</span>
      </button>
      <div class="avatar-wrap">
        <img src="/assets/img/user.png" alt="Avatar usuario" class="avatar-img">
      </div>
    </div>
  </header>

  <div class="layout">

    <aside class="sidebar" id="sidebar">
      <nav class="sidebar-nav">
        <a href="/menu1.php" class="sidebar-link<?= isActive('menu1', $activePage) ?>">
          <span class="sidebar-link-icon">◈</span> Menú 1
        </a>
        <a href="/menu2.php" class="sidebar-link<?= isActive('menu2', $activePage) ?>">
          <span class="sidebar-link-icon">◈</span> Menú 2
        </a>
        <a href="/menu3.php" class="sidebar-link<?= isActive('menu3', $activePage) ?>">
          <span class="sidebar-link-icon">◈</span> Menú 3
        </a>
      </nav>
      <div class="sidebar-footer">
        <a href="/logout.php" class="sidebar-logout">
          <i class="fa-solid fa-right-from-bracket"></i>
          Cerrar Sesión
        </a>
        <div class="sidebar-deco">☕</div>
      </div>
    </aside>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <main class="main">
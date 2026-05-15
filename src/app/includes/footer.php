</main>
</div> <nav class="bottom-nav">
    <a href="/index.php" class="bottom-nav-item active">
      <i class="fa-solid fa-house"></i>
      <span>Inicio</span>
    </a>
    <a href="/crear.php" class="bottom-nav-item bottom-nav-create" aria-label="Crear publicación">
      <i class="fa-solid fa-plus"></i>
    </a>
    <a href="/perfil.php" class="bottom-nav-item">
      <i class="fa-solid fa-user"></i>
      <span>Perfil</span>
    </a>
  </nav>

  <?php include __DIR__ . '/modals/cafe_info.php'; ?>

  <script type="module" src="/assets/js/auth/logout.js"></script>
  <script src="/assets/js/utils/layout.js"></script>
  <script src="/assets/js/components/modals.js"></script>
  <?php require_once __DIR__ . '/modals/generic_modal.php'; ?>

</body>
</html>
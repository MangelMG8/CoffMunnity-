</main>
  </div>

  <nav class="bottom-nav">
    <a href="/index.php" class="bottom-nav-item active">
      <i class="fa-solid fa-house"></i>
      <span>Inicio</span>
    </a>
    <a href="/buscar.php" class="bottom-nav-item">
      <i class="fa-solid fa-magnifying-glass"></i>
      <span>Buscar</span>
    </a>
    <a href="/crear.php" class="bottom-nav-item bottom-nav-create" aria-label="Crear publicación">
      <i class="fa-solid fa-plus"></i>
    </a>
    <a href="/comunidad.php" class="bottom-nav-item">
      <i class="fa-solid fa-users"></i>
      <span>Comunidad</span>
    </a>
    <a href="/perfil.php" class="bottom-nav-item">
      <i class="fa-solid fa-user"></i>
      <span>Perfil</span>
    </a>
  </nav>

  <script>
    const hamburgerBtn   = document.getElementById('hamburgerBtn');
    const sidebar        = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    hamburgerBtn.addEventListener('click', () => {
      sidebar.classList.toggle('open');
      sidebarOverlay.classList.toggle('visible');
      hamburgerBtn.classList.toggle('active');
    });

    sidebarOverlay.addEventListener('click', () => {
      sidebar.classList.remove('open');
      sidebarOverlay.classList.remove('visible');
      hamburgerBtn.classList.remove('active');
    });

    document.querySelectorAll('.filter-tag').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.filter-tag').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
      });
    });
  </script>

</body>
</html>
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

  <div id="modalGeneric" class="modal-overlay">
      <div class="modal-container">
          <div class="modal-header">
              <h2 id="genericTitle">Notificación</h2>
              <button class="btn-close-modal" onclick="closeModal('modalGeneric')">&times;</button>
          </div>
          <div class="modal-body">
              <p id="genericText">Este es un mensaje genérico.</p>
          </div>
      </div>
  </div>

  <?php include __DIR__ . '/modals/cafe_info.php'; ?>


  <script src="/assets/js/components/modals.js"></script>
  <script type="module" src="/assets/js/auth/logout.js"></script>
  <script src="/assets/js/utils/layout.js"></script>

</body>
</html>
document.getElementById('profile_pic_input').addEventListener('change', function() {
    const file = this.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => {
        document.getElementById('ep-avatar-preview').src = e.target.result;
    };
    reader.readAsDataURL(file);
});

function confirmDelete() {
    if (confirm('¿Seguro que quieres eliminar tu cuenta? Esta acción no tiene vuelta atrás.')) {
        window.location.href = '/app/controllers/ProfileController.php?action=delete';
    }
}

document.getElementById('ep-form').addEventListener('submit', function() {
    const btn = document.getElementById('ep-submit');
    btn.disabled = true;
    btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Guardando…';
});
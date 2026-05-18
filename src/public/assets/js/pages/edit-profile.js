document.addEventListener('DOMContentLoaded', () => {
    // PREVISUALIZACIÓN DE LA FOTO (Solo visual, aún no se sube)
    const avatarInput = document.getElementById('ep-avatar-input');
    const avatarImg = document.getElementById('ep-avatar-img');

    if (avatarInput && avatarImg) {
        avatarInput.addEventListener('change', function () {
            const file = this.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = e => {
                avatarImg.src = e.target.result;
            };
            reader.readAsDataURL(file);
        });
    }

    //FUNCIÓN PARA ELIMINAR CUENTA
    window.confirmDelete = function () {
        if (confirm('¿Seguro que quieres eliminar tu cuenta? Esta acción no tiene vuelta atrás.')) {
            alert("Función de eliminar cuenta en construcción.");
        }
    };

    const editForm = document.getElementById('edit-profile-form');

    if (editForm) {
        editForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const btn = document.getElementById('ep-submit');
            const originalBtnText = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Guardando…';

            // Usamos FormData en lugar de un objeto JSON crudo
            const formData = new FormData();

            // Añadimos los campos de texto
            formData.append('bio', document.getElementById('bio').value.trim());
            formData.append('favorite_coffee', document.getElementById('favorite_coffee').value);
            formData.append('first_name', document.getElementById('first_name').value.trim());
            formData.append('last_name', document.getElementById('last_name').value.trim());
            formData.append('birth_date', document.getElementById('birth_date').value);

            //Añadimos la imagen si el usuario seleccionó una nueva
            const avatarInput = document.getElementById('ep-avatar-input');
            if (avatarInput.files.length > 0) {
                formData.append('profile_pic', avatarInput.files[0]);
            }

            try {
                const response = await fetch('/api/profile_api.php', {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    window.showGenericModal(window.lang.profile_success_title || "¡Éxito!", window.lang.profile_success_text || "Guardado.", "success");
                    setTimeout(() => { window.location.href = "/profile"; }, 2000);
                } else {
                    window.showGenericModal(window.lang.profile_error_title || "Error", data.message || "Error al guardar.", "error");
                    btn.disabled = false;
                    btn.innerHTML = originalBtnText;
                }

            } catch (error) {
                console.error("Error al actualizar perfil:", error);
                window.showGenericModal("Error crítico", "El servidor falló. Revisa la consola.", "error");
                btn.disabled = false;
                btn.innerHTML = originalBtnText;
            }
        });
    }
});
import { auth } from "../config/firebase-config.js";

document.addEventListener('DOMContentLoaded', () => {
    const btnLogout = document.getElementById('btn-logout');

    if (btnLogout) {
        btnLogout.addEventListener('click', async () => {
            try {
                await auth.signOut();
                console.log("Sesión de Firebase cerrada.");

                window.location.href = '/logout';

            } catch (error) {
                console.error("Error al cerrar sesión en Firebase:", error);
                alert("Hubo un problema al cerrar la sesión.");
            }
        });
    }
});
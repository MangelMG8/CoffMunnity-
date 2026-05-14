import { createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/10.8.1/firebase-auth.js";
import { auth } from "../config/firebase-config.js";

document.addEventListener('DOMContentLoaded', () => {
    const registerForm = document.querySelector('.reg-form');
    
    if (registerForm) {
        registerForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const passwordConfirm = document.getElementById('password2').value;

            if (password !== passwordConfirm) {
                alert("Las contraseñas no coinciden.");
                return;
            }

            try {
                // Registramos en Firebase
                const userCredential = await createUserWithEmailAndPassword(auth, email, password);
                const user = userCredential.user;

                // Registramos en Supabase
                const response = await fetch('/api/register_api.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ 
                        uid: user.uid,
                        username: username,
                        email: email
                    })
                });

                const data = await response.json();

                if (data.success) {
                    alert("¡Registro completado con éxito!");
                    window.location.href = "/index.php";
                } else {
                    alert("Error al guardar en la base de datos: " + data.message);
                    await user.delete(); 
                }

            } catch (error) {
                console.error("Error en el registro:", error.code, error.message);
                alert("Hubo un error al registrarse. Revisa tus datos.");
            }
        });
    }
});
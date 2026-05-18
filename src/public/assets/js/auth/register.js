import { createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/10.8.1/firebase-auth.js";
import { auth } from "../config/firebase-config.js";

document.addEventListener('DOMContentLoaded', () => {
    const registerForm = document.querySelector('.reg-form');
    
    if (registerForm) {
        registerForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const username = document.getElementById('username').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const passwordConfirm = document.getElementById('password2').value;

            // EXPRESIONES REGULARES (REGEX)
            // ==========================================
            // Usuario entre 3 y 20 caracteres
            const regexUser = /^[a-zA-Z0-9_]{3,20}$/;
            
            // Estructura de correo
            const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            // Contraseña mínimo 6 carácteres y al menos 1 letra y 1 número
            const regexPass = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*?&._-]{6,}$/;


            // VALIDACIONES
            // ==========================================
            if (!regexUser.test(username)) {
                window.showGenericModal(window.lang.reg_error_title, window.lang.val_name, "warning");
                return;
            }

            if (!regexEmail.test(email)) {
                window.showGenericModal(window.lang.reg_error_title, window.lang.val_email, "warning");
                return;
            }

            if (!regexPass.test(password)) {
                window.showGenericModal(window.lang.reg_error_title, window.lang.val_pass, "warning");
                return;
            }

            if (password !== passwordConfirm) {
                window.showGenericModal(window.lang.reg_error_title, window.lang.val_pass_match, "warning");
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
                    window.showGenericModal(window.lang.reg_success_title, window.lang.reg_success_text, "success");
                    
                    setTimeout(() => {
                        window.location.href = "/index";
                    }, 2500);

                } else {
                    window.showGenericModal("Error", window.lang.db_error + data.message, "error");
                    await user.delete(); 
                }

            } catch (error) {
                console.error("Error en el registro:", error.code, error.message);
                window.showGenericModal("Error de Firebase", window.lang.firebase_error, "error");
            }
        });
    }
});

window.togglePass = function(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    
    if (input && icon) {
        if (input.type === 'password') {
            input.type = 'text';
            icon.textContent = '🙈';
        } else {
            input.type = 'password';
            icon.textContent = '👁';
        }
    }
};
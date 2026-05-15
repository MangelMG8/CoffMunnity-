import { signInWithEmailAndPassword, signInWithPopup } from "https://www.gstatic.com/firebasejs/10.8.1/firebase-auth.js";
import { auth, provider } from "../config/firebase-config.js";

document.addEventListener('DOMContentLoaded', () => {

    // ---CONTRASEÑA LOGIN ---
    const toggleBtn = document.querySelector('.login-field-eye');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eye-icon');

    if (toggleBtn && passwordInput && eyeIcon) {
        toggleBtn.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                eyeIcon.textContent = '👁';
            }
        });
    }

    //  FIREBASE AUTH 
    const loginForm = document.querySelector('.login-form');
    const btnGoogle = document.getElementById('btn-login-google');
    const emailInput = document.getElementById('email');

    if (loginForm) {
        loginForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const email = emailInput.value;
            const password = passwordInput.value;

            try {
                const userCredential = await signInWithEmailAndPassword(auth, email, password);
                console.log("¡Logueado exitosamente con Email!", userCredential.user.email);

                manejarLoginExitoso(userCredential.user);

            } catch (error) {
                console.error("Error en Email/Pass:", error.code, error.message);
                window.showGenericModal(window.lang.login_error_title, window.lang.login_error_text, "error");
            }
        });
    }

    if (btnGoogle) {
        btnGoogle.addEventListener('click', async () => {
            try {
                const result = await signInWithPopup(auth, provider);
                console.log("¡Logueado exitosamente con Google!", result.user.displayName);

                manejarLoginExitoso(result.user);

            } catch (error) {
                console.error("Error en Google Auth:", error.code, error.message);
                window.showGenericModal(window.lang.google_error_title, window.lang.google_error_text, "error");
            }
        });
    }

    const rememberInput = document.getElementById('remember');

    async function manejarLoginExitoso(user) {
        const rememberMe = rememberInput ? rememberInput.checked : false;

        try {
            const response = await fetch('/api/auth_api.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    uid: user.uid,
                    remember: rememberMe
                })
            });

            const data = await response.json();
            if (data.success) {
                window.location.href = "/index";
            } else {
                window.showGenericModal(window.lang.session_error_title, window.lang.session_error_text, "error");
                auth.signOut();
            }
        } catch (error) {
            console.error("Error al contactar con PHP:", error);
            window.showGenericModal(window.lang.server_error_title, window.lang.server_error_text, "error");
        }
    }
});

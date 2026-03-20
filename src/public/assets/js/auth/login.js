document.addEventListener('DOMContentLoaded', () => {
    
    const toggleBtn = document.querySelector('.login-field__eye');
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
});
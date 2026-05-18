<?php
return [
    'global' => [
        'app_name' => 'Coffmunnity',
        'version' => 'Versión actual - 1.0.0'
    ],
    'login' => [
        'page_title' => 'Acceso',
        'title' => 'Iniciar sesión',
        'placeholder_email' => 'Correo electrónico',
        'placeholder_pass' => 'Contraseña',
        'show_pass' => 'Mostrar contraseña',
        'remember_me' => 'Recuérdame',
        'btn_submit' => 'Acceder',
        'btn_google' => 'Entrar con Google',
        'forgot_pass' => '¿Olvidaste la contraseña?',
        'no_account' => '¿No tienes una cuenta?',
        'register' => 'Regístrate'
    ],
    'register' => [
        'page-title' => 'Crear cuenta',
        'headline' => 'Tu comunidad del café te espera',
        'sub' => 'Comparte recetas, reseñas e historias con miles de apasionados del café de especialidad.',
        'title' => 'Crear cuenta',
        'pills' => [
            '☕ Recetas',
            '⭐ Reseñas',
            '📖 Historias',
            '📝 Artículos'
        ],
        'placeholder-name' => 'Nombre de usuario',
        'placeholder-email' => 'Correo electrónico',
        'placeholder-pass' => 'Contraseña',
        'placeholder-pass2' => 'Repite la contraseña',
        'show-pass' => 'Mostrar contraseña',
        'terms-pre' => 'Acepto los',
        'terms-link' => 'términos y condiciones',
        'btn-submit' => 'Crear cuenta',
        'btn-google' => 'Registrarse con Google',
        'has-account' => '¿Ya tienes cuenta?',
        'login' => 'Inicia sesión'
    ],
    'js_messages' => [
        'login_error_title' => 'Error de acceso',
        'login_error_text'  => 'El correo o la contraseña no son correctos. Por favor, inténtalo de nuevo.',
        'google_error_title' => 'Error de Google',
        'google_error_text' => 'Hubo un problema al iniciar sesión con tu cuenta de Google.',
        'server_error_title' => 'Error de conexión',
        'server_error_text' => 'No se pudo conectar con el servidor. Por favor, inténtalo de nuevo.',
        'session_error_title' => '¡Vaya!',
        'session_error_text' => 'No se pudo crear la sesión en el servidor.',
        'reg_error_title' => 'Error de validación',
        'reg_success_title' => '¡Registro completado!',
        'reg_success_text' => 'Tu cuenta ha sido creada con éxito. Redirigiendo...',
        'val_name' => 'El nombre de usuario debe tener entre 3 y 20 caracteres (solo letras, números y guiones bajos).',
        'val_email' => 'Por favor, introduce un correo electrónico válido.',
        'val_pass' => 'La contraseña debe tener al menos 6 caracteres, incluyendo al menos una letra y un número.',
        'val_pass_match' => 'Las contraseñas no coinciden.',
        'db_error' => 'Error al guardar en la base de datos: ',
        'firebase_error' => 'Hubo un error al registrarse. El correo podría estar ya en uso o ser inválido.'
    ]
];

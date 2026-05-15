<?php
$lang = require_once __DIR__ . '/../../lang/es.php';

$loginLang = $lang['login'];
$globalLang = $lang['global'];

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $globalLang['app_name'] ?> — <?= $loginLang['page_title'] ?></title>
    <link rel="stylesheet" href="/assets/css/css.css" />
    <link rel="stylesheet" href="/assets/css/login.css" />
    <link rel="stylesheet" href="/assets/css/modals.css" />
    <link rel="stylesheet" href="/assets/css/modals/generic-modal.css" />
</head>

<body class="login-body">

    <div class="login-media">
        <video class="login-video" src="/assets/img/intro.mp4" autoplay muted loop playsinline></video>
        <div class="login-media-overlay"></div>
    </div>

    <aside class="login-panel">

        <div class="login-brand">
            <img src="/assets/img/logo.svg" alt="<?= htmlspecialchars($globalLang['app_name']) ?>" class="brand-logo" />
            <span class="brand-name"><?= htmlspecialchars($globalLang['app_name']) ?></span>
        </div>

        <h1 class="login-title"><?= $loginLang['title'] ?></h1>

        <form class="login-form" id="login-form" novalidate>

            <div class="login-field">
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="login-input"
                    placeholder="<?= $loginLang['placeholder_email'] ?>"
                    autocomplete="email"
                    required />
            </div>

            <div class="login-field login-field--pass">
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="login-input"
                    placeholder="<?= $loginLang['placeholder_pass'] ?>"
                    autocomplete="current-password"
                    required />
                <button type="button" class="login-field-eye" aria-label="<?= $loginLang['show_pass'] ?>">
                    <span id="eye-icon">&#128065;</span>
                </button>
            </div>

            <label class="login-remember">
                <input type="checkbox" name="remember" id="remember" />
                <span class="login-remember-track">
                    <span class="login-remember-thumb"></span>
                </span>
                <span class="login-remember-label"><?= $loginLang['remember_me'] ?></span>
            </label>

            <button type="submit" class="login-btn" id="btn-login-email">
                <?= $loginLang['btn_submit'] ?>
            </button>

            <button type="button" class="login-btn" id="btn-login-google" style="background-color: #4285F4; margin-top: 10px; display: flex; justify-content: center; align-items: center; gap: 10px;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4" />
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853" />
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05" />
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335" />
                </svg>
                <?= $loginLang['btn_google'] ?>
            </button>

        </form>

        <a href="recover.php" class="login-forgot"><?= $loginLang['forgot_pass'] ?></a>

        <div class="login-register">
            <span class="login-register-text"><?= $loginLang['no_account'] ?></span>
            <a href="register.php" class="login-register-link"><?= $loginLang['register'] ?></a>
        </div>

        <p class="login-version"><?= $globalLang['version'] ?></p>

    </aside>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="/assets/js/components/modals.js"></script>

    <?php require_once __DIR__ . '/../../includes/modals/generic_modal.php'; ?>

    <script>
        window.lang = <?= json_encode($lang['js_messages'] ?? []) ?>;
    </script>

    <script type="module" src="/assets/js/auth/login.js"></script>
</body>

</html>
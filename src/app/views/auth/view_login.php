<?php
// Por ahora cargamos el español por defecto
$lang = require_once __DIR__ . '/../../lang/es.php';

$loginLang = $lang['arrayLogin'];
$globalLang = $lang['arrayGlobal'];

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $globalLang['app_name'] ?> — <?= $loginLang['page_title'] ?></title>
    <link rel="stylesheet" href="assets/css/css.css" />
    <link rel="stylesheet" href="assets/css/login.css" />
</head>

<body class="login-body">

    <div class="login-media">
        <video
            class="login-video"
            src="assets/img/intro.mp4"
            autoplay
            muted
            loop
            playsinline></video>
        <div class="login-media-overlay"></div>
    </div>

    <aside class="login-panel">

        <div class="login-brand">
            <div class="login-brand-icon">C</div>
            <span class="login-brand-name">Coffmunnity</span>
        </div>

        <h1 class="login-title"><?= $loginLang['title'] ?></h1>

        <form class="login-form" action="index.php" method="POST" novalidate>

            <div class="login-field">
                <input
                    type="text"
                    id="username"
                    name="username"
                    class="login-input"
                    placeholder="<?= $loginLang['placeholder_user'] ?>"
                    autocomplete="username"
                    required />
            </div>

            <div class="login-field login-field--pass">
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="login-input"
                    placeholder="<?= $loginLang['show_pass'] ?>"
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

            <button type="submit" class="login-btn">
                <?= $loginLang['btn_submit'] ?>
            </button>

        </form>

        <a href="recover.php" class="login-forgot"><? echo $loginLang['forgot_pass'] ?></a>

        <div class="login-register">
            <span class="login-register-text"><? echo $loginLang['no_account']?></span>
            <a href="register.php" class="login-register-link"><? echo $loginLang['register']?></a>
        </div>

        <p class="login-version"><?= $globalLang['version'] ?></p>

    </aside>

    <script src="assets/js/auth/login.js"></script>
</body>

</html>
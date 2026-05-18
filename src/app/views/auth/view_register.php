<?php
$lang = require_once __DIR__ . '/../../lang/es.php';

$reg = $lang['register'];
$global = $lang['global'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $global['app_name'] ?> — <?= $reg['page-title'] ?></title>
    <link rel="stylesheet" href="assets/css/css.css" />
    <link rel="stylesheet" href="assets/css/register.css" />
    <link rel="stylesheet" href="/assets/css/modals/modals.css" />
    <link rel="stylesheet" href="/assets/css/modals/generic-modal.css" />
</head>

<body class="reg-body">

    <div class="reg-layout">

        <aside class="reg-brand">
            <a href="index.php" class="reg-brand__logo">
                <img src="assets/img/logo.svg" alt="<?= htmlspecialchars($global['app_name']) ?>" class="reg-brand__img" />
                <span class="reg-brand__name"><?= htmlspecialchars($global['app_name']) ?></span>
            </a>

            <div class="reg-brand__copy">
                <h2 class="reg-brand__headline"><?= $reg['headline'] ?></h2>
                <p class="reg-brand__sub"><?= $reg['sub'] ?></p>
            </div>

            <ul class="reg-brand__pills">
                <?php foreach ($reg['pills'] as $pill): ?>
                    <li class="reg-pill"><?= $pill ?></li>
                <?php endforeach; ?>
            </ul>

            <div class="reg-brand__deco" aria-hidden="true">
                <div class="reg-deco__ring reg-deco__ring-a"></div>
                <div class="reg-deco__ring reg-deco__ring-b"></div>
                <div class="reg-deco__ring reg-deco__ring-c"></div>
            </div>
        </aside>

        <main class="reg-panel">
            <h1 class="reg-title"><?= $reg['title'] ?></h1>

            <form class="reg-form" action="register.php" method="POST" novalidate>

                <div class="reg-field">
                    <input
                        type="text"
                        id="username"
                        name="username"
                        class="reg-input"
                        placeholder="<?= $reg['placeholder-name'] ?>"
                        autocomplete="username"
                        required />
                </div>

                <div class="reg-field">
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="reg-input"
                        placeholder="<?= $reg['placeholder-email'] ?>"
                        autocomplete="email"
                        required />
                </div>

                <div class="reg-field reg-field--pass">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="reg-input"
                        placeholder="<?= $reg['placeholder-pass'] ?>"
                        autocomplete="new-password"
                        required />
                    <button type="button" class="reg-field__eye" aria-label="<?= $reg['show-pass'] ?>" onclick="togglePass('password','eye-a')">
                        <span id="eye-a">&#128065;</span>
                    </button>
                </div>

                <div class="reg-field reg-field--pass">
                    <input
                        type="password"
                        id="password2"
                        name="password2"
                        class="reg-input"
                        placeholder="<?= $reg['placeholder-pass2'] ?>"
                        autocomplete="new-password"
                        required />
                    <button type="button" class="reg-field__eye" aria-label="<?= $reg['show-pass'] ?>" onclick="togglePass('password2','eye-b')">
                        <span id="eye-b">&#128065;</span>
                    </button>
                </div>

                <label class="reg-terms">
                    <input type="checkbox" name="terms" id="terms" required />
                    <span class="reg-terms__box"></span>
                    <span class="reg-terms__label">
                        <?= $reg['terms-pre'] ?>
                        <a href="terms.php" class="reg-terms__link"><?= $reg['terms-link'] ?></a>
                    </span>
                </label>

                <button type="submit" class="reg-btn"><?= $reg['btn-submit'] ?></button>

                <div class="reg-divider">
                    <span class="reg-divider__line"></span>
                    <span class="reg-divider__text">o</span>
                    <span class="reg-divider__line"></span>
                </div>

                <button type="button" class="reg-btn-google">
                    <span class="reg-btn-google__dot reg-btn-google__dot--r"></span>
                    <span class="reg-btn-google__dot reg-btn-google__dot--y"></span>
                    <span class="reg-btn-google__dot reg-btn-google__dot--g"></span>
                    <span class="reg-btn-google__dot reg-btn-google__dot--b"></span>
                    <?= $reg['btn-google'] ?>
                </button>

            </form>

            <p class="reg-login">
                <?= $reg['has-account'] ?>
                <a href="login.php" class="reg-login__link"><?= $reg['login'] ?></a>
            </p>

            <p class="reg-version"><?= $global['version'] ?></p>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="/assets/js/components/modals.js"></script>
    <?php require_once __DIR__ . '/../../includes/modals/generic_modal.php'; ?>

    <script>
        window.lang = <?= json_encode($lang['js_messages'] ?? []) ?>;
    </script>

    <script type="module" src="/assets/js/auth/register.js"></script>
</body>

</html>
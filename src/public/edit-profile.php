<?php
$pageTitle  = 'Mi perfil — Coffmunnity';
$activePage = 'perfil';
$extraCss   = '/assets/css/edit-profile.css';

require_once __DIR__ . '/../app/includes/header.php';

$user = [
    'id' => 'usr_demo',
    'username' => 'miguelcoffee',
    'role' => 'user',
    'email'=> 'miguel@a.com',
    'bio' => 'Amante del buen café de especialidad y de las mañanas tranquilas. Siempre en busca de la mejor cafetería de la ciudad.',
    'first_name' => 'Miguel Ángel',
    'last_name' => 'Martinez Guijarro',
    'birth_date' => '1992-04-15',
    'profile_pic' => '/assets/img/user.png',
    'created_at' => '2024-01-10 09:23:00',
];
?>

<div class="ep-page">

    <div class="ep-hero">
        <div class="ep-hero__band"></div>

        <div class="ep-hero__identity">
            <div class="ep-avatar" id="ep-avatar-wrap">
                <img
                    src="<?= htmlspecialchars($user['profile_pic']) ?>"
                    alt="Foto de perfil"
                    class="ep-avatar__img"
                    id="ep-avatar-preview" />
                <label for="profile_pic_input" class="ep-avatar__overlay" aria-label="Cambiar foto">
                    <i class="fa-solid fa-camera"></i>
                    <span>Cambiar</span>
                </label>
                <input
                    type="file"
                    id="profile_pic_input"
                    name="profile_pic"
                    accept="image/*"
                    class="ep-avatar__file" />
            </div>

            <div class="ep-hero__meta">
                <p class="ep-hero__username">@<?= htmlspecialchars($user['username']) ?></p>
                <span class="ep-hero__role ep-role--<?= $user['role'] ?>">
                    <?= $user['role'] === 'admin' ? '⚙ Admin' : '☕ Usuario' ?>
                </span>
                <p class="ep-hero__since">
                    Miembro desde <?= date('M Y', strtotime($user['created_at'])) ?>
                </p>
            </div>
        </div>
    </div>

    <div class="ep-body">

        <form
            class="ep-form"
            action="/app/controllers/ProfileController.php"
            method="POST"
            enctype="multipart/form-data"
            novalidate
            id="ep-form">
            <input type="hidden" name="action" value="update_profile" />
            <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>" />

            <section class="ep-section">
                <h2 class="ep-section__title">
                    <i class="fa-solid fa-user-pen"></i>
                    Información pública
                </h2>

                <div class="ep-grid">
                    <div class="ep-field">
                        <label class="ep-label" for="username">Nombre de usuario</label>
                        <div class="ep-input-wrap ep-input-wrap--icon">
                            <i class="fa-solid fa-at ep-input-icon"></i>
                            <input
                                type="text"
                                id="username"
                                name="username"
                                class="ep-input"
                                value="<?= htmlspecialchars($user['username']) ?>"
                                maxlength="50"
                                required />
                        </div>
                        <span class="ep-hint">Visible para todos. Solo letras, números y guiones.</span>
                    </div>

                    <div class="ep-field ep-field--full">
                        <label class="ep-label" for="email">Correo electrónico</label>
                        <div class="ep-input-wrap ep-input-wrap--icon">
                            <i class="fa-solid fa-envelope ep-input-icon"></i>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="ep-input"
                                value="<?= htmlspecialchars($user['email']) ?>"
                                required 
                                readonly />
                        </div>
                    </div>

                    <div class="ep-field ep-field--full">
                        <label class="ep-label" for="bio">Biografía</label>
                        <textarea
                            id="bio"
                            name="bio"
                            class="ep-input"
                            rows="4"
                            maxlength="250"
                            placeholder="Cuéntanos un poco sobre ti y tu café favorito..."><?= htmlspecialchars($user['bio'] ?? '') ?></textarea>
                        <span class="ep-hint">Breve descripción sobre ti (máximo 250 caracteres).</span>
                    </div>
                </div>
            </section>

            <div class="ep-divider"></div>

            <section class="ep-section">
                <h2 class="ep-section__title">
                    <i class="fa-solid fa-id-card"></i>
                    Datos personales
                </h2>

                <div class="ep-grid">
                    <div class="ep-field">
                        <label class="ep-label" for="first_name">Nombre</label>
                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            class="ep-input"
                            value="<?= htmlspecialchars($user['first_name'] ?? '') ?>"
                            maxlength="50" />
                    </div>

                    <div class="ep-field">
                        <label class="ep-label" for="last_name">Apellidos</label>
                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            class="ep-input"
                            value="<?= htmlspecialchars($user['last_name'] ?? '') ?>"
                            maxlength="50" />
                    </div>

                    <div class="ep-field ep-field--full">
                        <label class="ep-label" for="birth_date">Fecha de nacimiento</label>
                        <div class="ep-input-wrap ep-input-wrap--icon">
                            <i class="fa-solid fa-cake-candles ep-input-icon"></i>
                            <input
                                type="date"
                                id="birth_date"
                                name="birth_date"
                                class="ep-input"
                                value="<?= htmlspecialchars($user['birth_date'] ?? '') ?>"
                                max="<?= date('Y-m-d', strtotime('-13 years')) ?>" />
                        </div>
                        <span class="ep-hint">Usamos esto para personalizar tu experiencia. No es pública.</span>
                    </div>
                </div>
            </section>

            <div class="ep-divider"></div>

            <section class="ep-section ep-section--danger">
                <h2 class="ep-section__title ep-section__title--danger">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    Zona de peligro
                </h2>
                <p class="ep-danger__desc">
                    Estas acciones son irreversibles. Procede con cuidado.
                </p>
                <button
                    type="button"
                    class="ep-btn ep-btn--ghost-danger"
                    onclick="confirmDelete()">
                    <i class="fa-solid fa-trash"></i>
                    Eliminar mi cuenta
                </button>
            </section>

            <div class="ep-actions">
                <a href="/profile.php" class="ep-btn ep-btn--ghost">Cancelar</a>
                <button type="submit" class="ep-btn ep-btn--primary" id="ep-submit">
                    <i class="fa-solid fa-floppy-disk"></i>
                    Guardar cambios
                </button>
            </div>

        </form>

    </div>
</div>

<?php require_once __DIR__ . '/../app/includes/footer.php'; ?>

<script src="/assets/js/pages/edit-profile.js"></script>

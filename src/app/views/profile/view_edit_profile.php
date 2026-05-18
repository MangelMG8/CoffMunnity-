<?php
$activePage = 'perfil';
$extraCss   = '/assets/css/edit-profile.css';

require_once __DIR__ . '/../../includes/header.php';

$editLang = $lang['edit_profile'];
$pageTitle  = $editLang['page_title'];

$username = $userData['username'] ?? '';
$email = $userData['email'] ?? '';
$bio = $userData['bio'] ?? '';
$firstName  = $userData['first_name'] ?? '';
$lastName = $userData['last_name'] ?? '';
$birthDate = $userData['birth_date'] ?? '';
$profilePic = $userData['profile_pic'] ?? '/assets/img/user.png';
?>

<div class="ep-page">
    <div class="ep-container">
        
        <div class="ep-header-profile">
            <div class="ep-avatar-centered" id="ep-avatar-wrap">
                <img src="<?= htmlspecialchars($profilePic) ?>" alt="Foto de perfil" class="ep-avatar-centered__img" id="ep-avatar-img" />
                <label for="ep-avatar-input" class="ep-avatar-centered__upload-btn" title="Cambiar foto">
                    <i class="fa-solid fa-camera"></i>
                </label>
                <input type="file" id="ep-avatar-input" accept="image/*" style="display: none;" />
            </div>
            
            <div class="ep-identity-centered">
                <h1 class="ep-identity-centered__username">@<?= htmlspecialchars($username) ?></h1>
                <p class="ep-identity-centered__role"><i class="fa-solid fa-certificate"></i> <?= $editLang['community_member'] ?></p>
            </div>
        </div>

        <form class="ep-form" id="edit-profile-form" autocomplete="off">

            <section class="ep-section">
                <h2 class="ep-section__title"><i class="fa-solid fa-user-gear"></i> <?= $editLang['section_account'] ?></h2>
                <div class="ep-grid">
                    <div class="ep-group">
                        <label class="ep-label" for="username"><?= $editLang['label_username'] ?></label>
                        <div class="ep-input-wrapper" style="background: rgba(0,0,0,0.03) !important;">
                            <i class="fa-solid fa-at ep-input-icon" style="opacity: 0.6;"></i>
                            <input type="text" id="username" class="ep-input" value="<?= htmlspecialchars($username) ?>" readonly style="color: var(--color-roast); cursor: not-allowed;" />
                        </div>
                        <span class="ep-hint"><?= $editLang['hint_username'] ?></span>
                    </div>

                    <div class="ep-group">
                        <label class="ep-label" for="email"><?= $editLang['label_email'] ?></label>
                        <div class="ep-input-wrapper" style="background: rgba(0,0,0,0.03) !important;">
                            <i class="fa-solid fa-envelope ep-input-icon" style="opacity: 0.6;"></i>
                            <input type="email" id="email" class="ep-input" value="<?= htmlspecialchars($email) ?>" readonly style="color: var(--color-roast); cursor: not-allowed;" />
                        </div>
                        <span class="ep-hint"><?= $editLang['hint_email'] ?></span>
                    </div>
                </div>
            </section>

            <div class="ep-divider"></div>

            <section class="ep-section">
                <h2 class="ep-section__title"><i class="fa-solid fa-id-card"></i> <?= $editLang['section_public'] ?></h2>
                <div class="ep-group">
                    <label class="ep-label" for="bio"><?= $editLang['label_bio'] ?></label>
                    <div class="ep-input-wrapper" style="align-items: flex-start; padding-top: 10px;">
                        <i class="fa-solid fa-quote-left ep-input-icon" style="margin-top: 5px;"></i>
                        <textarea id="bio" class="ep-input" rows="4" placeholder="<?= $editLang['placeholder_bio'] ?>" style="resize: vertical; min-height: 100px;"><?= htmlspecialchars($bio) ?></textarea>
                    </div>
                    <span class="ep-hint"><?= $editLang['hint_bio'] ?></span>
                </div>

                <div class="ep-group" style="margin-top: 20px;">
                    <label class="ep-label" for="favorite_coffee"><?= $editLang['label_coffee'] ?></label>
                    <div class="ep-input-wrapper">
                        <i class="fa-solid fa-mug-hot ep-input-icon"></i>
                        <select id="favorite_coffee" class="ep-input" style="padding-right: 14px; cursor: pointer; -webkit-appearance: none; -moz-appearance: none; appearance: none;">
                            <?php
                            $currentFav = $userData['favorite_coffee'] ?? '';
                            foreach ($editLang['coffee_options'] as $value => $label) {
                                $selected = ($currentFav === $value) ? 'selected' : '';
                                echo "<option value=\"" . htmlspecialchars($value) . "\" $selected>" . htmlspecialchars($label) . "</option>";
                            }
                            ?>
                        </select>
                        <i class="fa-solid fa-chevron-down" style="position: absolute; right: 15px; color: var(--color-caramel); pointer-events: none;"></i>
                    </div>
                    <span class="ep-hint"><?= $editLang['hint_coffee'] ?></span>
                </div>
            </section>

            <div class="ep-divider"></div>

            <section class="ep-section">
                <h2 class="ep-section__title"><i class="fa-solid fa-address-card"></i> <?= $editLang['section_personal'] ?></h2>
                <div class="ep-grid">
                    <div class="ep-group">
                        <label class="ep-label" for="first_name"><?= $editLang['label_firstname'] ?></label>
                        <div class="ep-input-wrapper">
                            <i class="fa-solid fa-signature ep-input-icon"></i>
                            <input type="text" id="first_name" class="ep-input" value="<?= htmlspecialchars($firstName) ?>" />
                        </div>
                    </div>
                    <div class="ep-group">
                        <label class="ep-label" for="last_name"><?= $editLang['label_lastname'] ?></label>
                        <div class="ep-input-wrapper">
                            <i class="fa-solid fa-signature ep-input-icon"></i>
                            <input type="text" id="last_name" class="ep-input" value="<?= htmlspecialchars($lastName) ?>" />
                        </div>
                    </div>
                </div>
                <div class="ep-grid" style="margin-top: 15px;">
                    <div class="ep-group">
                        <label class="ep-label" for="birth_date"><?= $editLang['label_birthdate'] ?></label>
                        <div class="ep-input-wrapper">
                            <i class="fa-solid fa-cake-candles ep-input-icon"></i>
                            <input type="date" id="birth_date" class="ep-input" value="<?= htmlspecialchars($birthDate) ?>" />
                        </div>
                        <span class="ep-hint"><?= $editLang['hint_birthdate'] ?></span>
                    </div>
                </div>
            </section>

            <div class="ep-divider"></div>

            <section class="ep-section ep-section--danger">
                <h2 class="ep-section__title ep-section__title--danger"><i class="fa-solid fa-triangle-exclamation"></i> <?= $editLang['section_danger'] ?></h2>
                <p class="ep-danger__desc"><?= $editLang['danger_desc'] ?></p>
                <button type="button" class="ep-btn ep-btn--ghost-danger" onclick="confirmDelete()"><i class="fa-solid fa-trash"></i> <?= $editLang['btn_delete'] ?></button>
            </section>

            <div class="ep-actions ep-actions--centered">
                <a href="/profile" class="ep-btn ep-btn--ghost"><?= $editLang['btn_cancel'] ?></a>
                <button type="submit" class="ep-btn ep-btn--primary" id="ep-submit"><i class="fa-solid fa-floppy-disk"></i> <?= $editLang['btn_save'] ?></button>
            </div>

        </form>
    </div>
</div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>

<script>
    window.lang = <?= json_encode($lang['js_messages'] ?? []) ?>;
</script>
<script src="/assets/js/pages/edit-profile.js"></script>
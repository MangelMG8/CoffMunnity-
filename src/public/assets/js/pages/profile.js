// src/public/assets/js/pages/profile.js

document.addEventListener('DOMContentLoaded', () => {

    // ==========================================
    // 1. LÓGICA DE FILTRADO DE PUBLICACIONES
    // ==========================================
    const filterBtns = document.querySelectorAll('.profile-filter-btn');
    const cards = document.querySelectorAll('.pcard');

    if (filterBtns.length > 0) {
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                filterBtns.forEach(b => b.classList.remove('active'));

                btn.classList.add('active');
                const filter = btn.getAttribute('data-filter');

                cards.forEach(card => {
                    const cardType = card.getAttribute('data-type');
                    
                    if (filter === 'all' || cardType === filter) {
                        card.style.display = 'block'; 
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    }

    // ==========================================
    // 2. LÓGICA DE SEGUIR / DEJAR DE SEGUIR
    // ==========================================
    const btnFollow = document.getElementById('btn-follow');
    const followersCount = document.getElementById('followers-count');

    if (btnFollow) {
        btnFollow.addEventListener('click', async () => {
            btnFollow.disabled = true;
            const targetId = btnFollow.getAttribute('data-userid');

            try {
                const response = await fetch('/api/follow.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ target_id: targetId })
                });

                const data = await response.json();

                if (data.success) {
                    if (followersCount) {
                        followersCount.innerText = data.newFollowers;
                    }

                    if (data.action === 'followed') {
                        btnFollow.classList.add('following');
                        btnFollow.innerHTML = '<i class="fa-solid fa-user-check"></i> Siguiendo';
                    } else {
                        btnFollow.classList.remove('following');
                        btnFollow.innerHTML = '<i class="fa-solid fa-user-plus"></i> Seguir';
                    }
                } else {
                    console.error("Error del servidor:", data.message);
                }
            } catch (err) {
                console.error("Fallo en la petición AJAX:", err);
            } finally {
                btnFollow.disabled = false;
            }
        });
    }
});
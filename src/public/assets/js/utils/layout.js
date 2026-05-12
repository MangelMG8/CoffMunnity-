document.addEventListener('DOMContentLoaded', () => {
    const hamburgerBtn = document.getElementById('hamburgerBtn');
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    if (hamburgerBtn && sidebar && sidebarOverlay) {
        hamburgerBtn.addEventListener('click', () => {
            sidebar.classList.toggle('open');
            sidebarOverlay.classList.toggle('visible');
            hamburgerBtn.classList.toggle('active');
        });

        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.remove('open');
            sidebarOverlay.classList.remove('visible');
            hamburgerBtn.classList.remove('active');
        });
    }

    const filterTags = document.querySelectorAll('.filter-tag');
    if (filterTags.length > 0) {
        filterTags.forEach(btn => {
            btn.addEventListener('click', () => {
                filterTags.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
            });
        });
    }
});
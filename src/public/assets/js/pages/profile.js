document.addEventListener('DOMContentLoaded', () => {
  const tabs  = document.querySelectorAll('.profile-tab');
  const cards = document.querySelectorAll('.pcard');
  const grid  = document.getElementById('profile-grid');

  let emptyMsg = document.querySelector('.profile-empty');
  if (!emptyMsg) {
    emptyMsg = document.createElement('p');
    emptyMsg.className = 'profile-empty';
    emptyMsg.textContent = 'No hay publicaciones en esta categoría todavía.';
    grid.after(emptyMsg);
  }

  function filterCards(tab) {
    const type = tab.dataset.tab;
    let visible = 0;

    cards.forEach(card => {
      const match = type === 'all' || card.dataset.type === type;
      card.classList.toggle('pcard--hidden', !match);
      if (match) visible++;
    });

    emptyMsg.classList.toggle('profile-empty--visible', visible === 0);
  }

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      tabs.forEach(t => {
        t.classList.remove('profile-tab--active');
        t.setAttribute('aria-selected', 'false');s
      });
      tab.classList.add('profile-tab--active');
      tab.setAttribute('aria-selected', 'true');
      filterCards(tab);
    });
  });
});

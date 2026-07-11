document.addEventListener('DOMContentLoaded', function () {

    const grid = document.getElementById('daftarGrid');
    const cards = grid ? grid.querySelectorAll(':scope > div') : [];

    /* -- Filter chip -- */
    const chips = document.querySelectorAll('.filter-chip');
    const hasKategoriData = Array.from(cards).some(function (card) {
        return card.dataset.kategori;
    });

    chips.forEach(function (chip) {
        chip.addEventListener('click', function () {
            chips.forEach(function (c) {
                c.classList.remove('active');
            });
            chip.classList.add('active');

            if (hasKategoriData) {
                const filter = chip.dataset.filter;
                cards.forEach(function (card) {
                    const kategori = card.dataset.kategori;
                    card.style.display = (filter === 'semua' || kategori === filter) ? '' : 'none';
                });
            }
        });
    });

    /* ---- Live search ----
       Berlaku untuk input manapun yang punya class 'js-arsip-search',
       baik itu #searchPublikasi maupun #searchDokumentasi. */
    const searchInput = document.querySelector('.js-arsip-search');
    if (searchInput) {
        searchInput.addEventListener('input', function () {
            const q = this.value.toLowerCase().trim();
            cards.forEach(function (card) {
                const title = card.querySelector('.pub-card__title')?.textContent.toLowerCase() ?? '';
                card.style.display = (q === '' || title.includes(q)) ? '' : 'none';
            });
        });
    }

    /* ---- Pagination active toggle ---- */
    const pageLinks = document.querySelectorAll('.arsip-pagination .page-item:not(.disabled) .page-link');
    pageLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const parentItem = link.closest('.page-item');
            if (!parentItem || parentItem.querySelector('.bi-chevron-left, .bi-chevron-right')) return;

            document.querySelectorAll('.arsip-pagination .page-item').forEach(function (item) {
                item.classList.remove('active');
                item.removeAttribute('aria-current');
            });
            parentItem.classList.add('active');
            parentItem.setAttribute('aria-current', 'page');
        });
    });

});
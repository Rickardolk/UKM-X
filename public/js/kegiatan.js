document.addEventListener('DOMContentLoaded', function () {

    /* ── filter buttons ── */
    const filterBtns = document.querySelectorAll('.filter-btn');
    filterBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            filterBtns.forEach(function (b) {
                b.classList.remove('active');
            });
            btn.classList.add('active');
        });
    });

    /* ── Live search ── */
    const searchInput = document.getElementById('searchInput');
    const items = document.querySelectorAll('.kegiatan-item');
    const emptyState = document.getElementById('emptyState');

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            const q = searchInput.value.toLowerCase().trim();
            let visible = 0;

            items.forEach(function (item) {
                const title = item.dataset.title || '';
                const match = title.includes(q);
                item.style.display = match ? '' : 'none';
                if (match) visible++;
            });

            emptyState.classList.toggle('d-none', visible > 0);
        });
    }

    /* ── Pagination active ── */
    const pageBtns = document.querySelectorAll('.page-btn:not(.arrow)');
    pageBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
            pageBtns.forEach(function (b) {
                b.classList.remove('active');
                b.removeAttribute('aria-current');
            });
            btn.classList.add('active');
            btn.setAttribute('aria-current', 'page');
        });
    });

});
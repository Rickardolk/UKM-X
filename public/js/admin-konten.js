// admin-konten.js
document.addEventListener('DOMContentLoaded', function () {

    var tabs = document.querySelectorAll('.kon-tab');
    var searchBox = document.getElementById('kontenSearch');
    var rows = document.querySelectorAll('#kontenTableBody tr');

    var activeFilter = 'semua';

    function applyFilters() {
        var query = (searchBox.value || '').toLowerCase().trim();

        rows.forEach(function (row) {
            var kategori = row.dataset.kategori || '';
            var judul = row.dataset.judul || '';

            var matchKategori = (activeFilter === 'semua') || (kategori === activeFilter);
            var matchSearch = (query === '') || judul.includes(query);

            row.style.display = (matchKategori && matchSearch) ? '' : 'none';
        });
    }

    /* ---- Filter tabs ---- */
    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            tabs.forEach(function (t) { t.classList.remove('active'); });
            tab.classList.add('active');
            activeFilter = tab.dataset.filter || 'semua';
            applyFilters();
        });
    });

    /* ---- Live search ---- */
    if (searchBox) {
        searchBox.addEventListener('input', applyFilters);
    }

});
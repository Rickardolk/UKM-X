document.addEventListener('DOMContentLoaded', function () {

    var trenData = window.__trenPengunjung || { labels: [], data: [] };
    var kategoriData = window.__kategoriPublikasi || [];

    /* ---- Line chart: Tren Pengunjung Bulanan ---- */
    var trenCtx = document.getElementById('chartTren');
    if (trenCtx) {
        var gradient = trenCtx.getContext('2d').createLinearGradient(0, 0, 0, 260);
        gradient.addColorStop(0, 'rgba(14, 116, 144, 0.25)');
        gradient.addColorStop(1, 'rgba(14, 116, 144, 0.02)');

        new Chart(trenCtx, {
            type: 'line',
            data: {
                labels: trenData.labels,
                datasets: [{
                    data: trenData.data,
                    borderColor: '#0E7490',
                    backgroundColor: gradient,
                    borderWidth: 2.5,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#0E7490',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 6,
                    fill: true,
                    tension: 0.35,
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 14000,
                        ticks: { stepSize: 2000, color: '#6B7280', font: { size: 12 } },
                        grid: { color: '#EEF2F6' },
                    },
                    x: {
                        ticks: { color: '#6B7280', font: { size: 12 } },
                        grid: { display: false },
                    }
                }
            }
        });
    }

    /* ---- Donut chart: Kategori Publikasi ---- */
    var kategoriCtx = document.getElementById('chartKategori');
    if (kategoriCtx && kategoriData.length) {
        new Chart(kategoriCtx, {
            type: 'doughnut',
            data: {
                labels: kategoriData.map(function (k) { return k.label; }),
                datasets: [{
                    data: kategoriData.map(function (k) { return k.value; }),
                    backgroundColor: kategoriData.map(function (k) { return k.color; }),
                    borderWidth: 3,
                    borderColor: '#fff',
                }]
            },
            options: {
                responsive: true,
                cutout: '68%',
                plugins: { legend: { display: false } },
            }
        });
    }

});
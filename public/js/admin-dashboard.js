document.addEventListener('DOMContentLoaded', function () {

    // ===== LINE CHART =====
    var lineCtx = document.getElementById('lineChart').getContext('2d');
    new Chart(lineCtx, {
        type: 'line',
        data: {
            labels: ['Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov'],
            datasets: [{
                data: [265, 265, 180, 310, 305, 400, 435],
                borderColor: '#2563eb',
                backgroundColor: 'rgba(37, 99, 235, 0.08)',
                borderWidth: 2.5,
                pointBackgroundColor: '#2563eb',
                pointRadius: 4,
                fill: true,
                tension: 0.4,
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                y: {
                    min: 0, max: 500,
                    ticks: { stepSize: 100, color: '#94a3b8', font: { size: 11 } },
                    grid: { color: '#e2e8f0', borderDash: [4, 4] },
                    border: { display: false }
                },
                x: {
                    ticks: { color: '#94a3b8', font: { size: 11 } },
                    grid: { display: false },
                    border: { display: false }
                }
            }
        }
    });

    // ===== DONUT CHART =====
    var donutCtx = document.getElementById('donutChart').getContext('2d');
    new Chart(donutCtx, {
        type: 'doughnut',
        data: {
            labels: ['Algae', 'Echinodermata', 'Mollusca'],
            datasets: [{
                data: [45, 30, 25],
                backgroundColor: ['#2563eb', '#0f766e', '#bfdbfe'],
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: false,
            cutout: '70%',
            plugins: { legend: { display: false } }
        }
    });

});
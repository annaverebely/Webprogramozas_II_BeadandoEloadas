<x-mainpage title="Diagram">
  <h2 class="text-uppercase mb-3">Süteménykínálatunk számokban</h2>
  <p class="mb-4">
    A diagramok az adatbázis <strong>suti</strong> és <strong>tartalom</strong> táblájának adataiból készülnek.
  </p>

  <div class="row g-4">
    <div class="col-lg-7">
      <div class="border p-3 h-100">
        <h5 class="text-uppercase mb-3">Sütemények száma típusonként</h5>
        <canvas id="tipusDiagram"></canvas>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="border p-3 h-100">
        <h5 class="text-uppercase mb-3">Mentességek</h5>
        <canvas id="mentesDiagram"></canvas>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.js"></script>
  <script>
    // 1. diagram: oszlopdiagram 
    new Chart(document.getElementById('tipusDiagram'), {
      type: 'bar',
      data: {
        labels: @json($tipusCimkek),
        datasets: [{
          label: 'Sütemények száma (db)',
          data: @json($tipusDarab),
          backgroundColor: '#E88F2A'
        }]
      },
      options: {
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
      }
    });

    // 2. diagram: fánkdiagram 
    new Chart(document.getElementById('mentesDiagram'), {
      type: 'doughnut',
      data: {
        labels: @json($mentesCimkek),
        datasets: [{
          data: @json($mentesDarab),
          backgroundColor: ['#E88F2A', '#24211F', '#F5C27A', '#8C5A2B', '#C9A27E', '#6C757D']
        }]
      },
      options: {
        plugins: { legend: { position: 'bottom' } }
      }
    });
  </script>
</x-mainpage>
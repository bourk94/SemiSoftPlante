<div>
    <canvas wire:ignore id="myChart"></canvas>
</div>
  
@assets
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets

@script
<script>
  const ctx = document.getElementById('myChart');

  let labels = [];
  for (let i = 0; i <= 100; i++) {
    labels.push(i.toString());
  }

  let chart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: labels,
          datasets: [{
              label: 'Humidité de l\'air(%)',
              data: @json($humidity),
              borderWidth: 2,
              fill: false,
              pointRadius: 0
          }, {
              label: 'Température de l\'air(°C)',
              data: @json($temperature),
              borderWidth: 2,
              fill: false,
              pointRadius: 0
          }],
      },
      options: {
          responsive: true,
          elements: {
            line: {
                tension: 0.4 // This is the Bezier curve tension
            }
        },
          scales: {
              y: {
                  beginAtZero: true,
                  display: true,
                  title: {
                      display: true,
                      text: 'Valeur'
                  },
              },
              x: {
                type: 'linear',
                  display: false,
                  ticks: {
                    min: 0,
                    max: 100,
                    stepSize: 1
                },
              }
          }
      }
  });

  document.addEventListener('livewire:initialized', () => {
    @this.on('dataLoaded', (event) => {

        chart.data.datasets[0].data.unshift($wire.humidity);
        chart.data.datasets[1].data.unshift($wire.temperature);

        if (chart.data.datasets[0].data.length > 100) {
          chart.data.datasets.forEach((dataset) => {
            dataset.data.pop();
          });
        }

        chart.update();
    });
    
  });
</script>
@endscript

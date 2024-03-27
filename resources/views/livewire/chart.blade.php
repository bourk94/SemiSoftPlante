{{-- <div>
    <canvas id="myChart"></canvas>
</div>
  
@assets
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endassets

@script
  <script>
    const ctx = document.getElementById('myChart');
    const humidity = $wire.humidity;
    const temperature = $wire.temperature;
  
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['0', '10', '20', '30', '40', '50', '60'],
        datasets: [{
          label: 'Humidité de l\'air(%)',
          data: humidity,
          borderWidth: 1
        }, {
           label: 'Température de l\'air(°C)',
           data: temperature,
           type: 'line',
           borderWidth: 1
        }],
      },
      options: {
        responsive: true,
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
                display: true,
                    title: {
                    display: true,
                    text: 'Minutes'
                    },
            }
        }
      }
    });
  </script>
@endscript --}}

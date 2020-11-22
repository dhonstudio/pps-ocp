<style>
  .form-control {
    font-size: 100%;
  }
</style>

<div class="container">

  <?php if (isset($_SESSION['message'])) echo $_SESSION['message'];?>

  <h2>DASHBOARD</h2>

  <div class="row mt-4">
    <div class="col"></div>
    <div class="col-lg-10">
      <style type="text/css">
        .chart {
          width: 25%;
          margin: 0 0 60 0;
        }
        
        ul {
          list-style:none;
          
        }
        
        li {
          display:;
          float:left;
          padding:0 50 0 0;
          color:white;
        }
      </style>

      <ul>
        <li class="chart mt-3 mr-5">
          <canvas id="myChart" width="100" height="100"></canvas>
        </li>
      </ul>

      <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: ['IKS non-strategis','IKS strategis'],
            datasets: [{
                label: 'IKS diajukan',
                data: [<?= $aju?>, '9'],
                backgroundColor: [
                  'rgba(75, 192, 192, 1)',
                  'rgba(255, 206, 86, 1)'
                ],
                borderColor: [
                  'rgba(75, 192, 192, 1)',
                  'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
              }]
          },
          options: {
            scales: {
              yAxes: [{
                  ticks: {
                    beginAtZero: true
                  }
                }]
            }
          }
        });
      </script>

      <ul>
        <li class="chart ml-5">
          <canvas id="myChart2" width="100" height="100"></canvas>
        </li>
      </ul>

      <script>
        var ctx = document.getElementById("myChart2");
        var myChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: ['IKS diajukan','IKS selesai'],
            datasets: [{
                label: 'IKS diajukan',
                data: [<?= $aju?>, '6'],
                backgroundColor: [
                  'rgba(75, 192, 192, 1)',
                  'rgba(255, 206, 86, 1)'
                ],
                borderColor: [
                  'rgba(75, 192, 192, 1)',
                  'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
              }]
          },
          options: {
            scales: {
              yAxes: [{
                  ticks: {
                    beginAtZero: true
                  }
                }]
            }
          }
        });
      </script>
    </div>
    <div class="col"></div>
  </div>
</div>

</div>
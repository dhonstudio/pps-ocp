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
        <li class="chart">
          <canvas id="myChart" width="100" height="100"></canvas>
        </li>
      </ul>

      <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ['IKS diajukan'],
            datasets: [{
                label: 'IKS diajukan',
                data: [<?= $aju?>],
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
<div class="col-md-6">
    <!-- DONUT CHART -->
    <div class="card card-box">
        <div class="card-box-header">
            <h3 class="card-box-title">Donut Chart</h3>
        </div>
        <div class="card-body">
            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- /.card -->


<script>
  $(function () {
    $.ajax({
      url:"ajax/procesos.ajax.php",
      method:"GET",
      success: function(respuesta){
        //console.log(respuesta);
        var data = JSON.parse(respuesta);
        var modulos = [];
        var puntaje = [];
        var desviacion = [];
        
        for($i=0; $i < data.length; $i++){
          
          modulos.push(data[$i][0]);
          puntaje.push(data[$i][1]);
          desviacion.push(data[$i][2]);
        }
        
        //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

     
      }
        });
    

  })
</script>
<?php //var_dump($_SESSION); ?>
<div class="col-md-12">
    <div class="card card-box">
        <div class="card-box-header">
            <h3 class="card-box-title">Puntajes por Módulos</h3>
        </div>
        <div class="card-body">
            <div class="chart">
                <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
  $(function () {
    $.ajax({
      url:"ajax/area.ajax.php",
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
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
        var areaChartData = {
          labels  : modulos,
          datasets: [
            {
              label               : 'Puntaje',
              backgroundColor     : 'rgba(44,83,148,0.9)',
              borderColor         : 'rgba(44,83,148,0.9)',
              pointRadius          : false,
              pointColor          : '#3b8bba',
              pointStrokeColor    : 'rgba(60,141,188,1)',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data                : puntaje
            },
            {
              label               : 'Desviación Estandar',
              backgroundColor     : 'rgba(204, 0, 0, 1)',
              borderColor         : 'rgba(204, 0, 0, 1)',
              pointRadius         : false,
              pointColor          : 'rgba(210, 214, 222, 1)',
              pointStrokeColor    : '#c1c7d1',
              pointHighlightFill  : '#fff',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data                : desviacion
            },
          ]
        }
        var areaChartOptions = {
          maintainAspectRatio : false,
          responsive : true,
          legend: {
            display: false
          },
          scales: {
            xAxes: [{
              gridLines : {
                display : false,
              }
            }],
            yAxes: [{
              gridLines : {
                display : false,
              }
            }]
          }
        }
        new Chart(areaChartCanvas, {
          type: 'line',
          data: areaChartData,
          options: areaChartOptions
        })
      }
    });
  })
</script>
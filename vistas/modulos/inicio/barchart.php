<div class="col-md-12">
    <div class="card card-box">
        <div class="card-box-header">
            <h3 class="card-box-title">Resultados Globales</h3>
        </div>
        <div class="card-body">
        <div class="chart">
            <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<script>
    $(function () {
        $.ajax({
            url:"ajax/barras.ajax.php",
            method:"GET",
            success: function(respuesta){
                //console.log(respuesta);
                var data = JSON.parse(respuesta);
                var anno = [];
                var puntaje_programa = [];
                var puntaje_referencia = [];
                var desviacion_programa = [];
                var desviacion_referencia = [];
                
                for($i=0; $i < data.length; $i++){
                
                anno.push(data[$i][4]);
                puntaje_programa.push(data[$i][0]);
                puntaje_referencia.push(data[$i][1]);
                desviacion_programa.push(data[$i][2]);
                desviacion_referencia.push(data[$i][3]);
                }
                //console.log(modulos,puntaje, desviacion);
                var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
                var barChartData = {
                    labels  : anno,
                    datasets: [
                        {
                            label               : 'Puntaje Programa',
                            backgroundColor     : 'rgba(44,83,148,0.9)',
                            borderColor         : 'rgba(60,141,188,0.8)',
                            pointRadius          : false,
                            pointColor          : '#3b8bba',
                            pointStrokeColor    : 'rgba(60,141,188,1)',
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            data                : puntaje_programa
                        },
                        {
                            label               : 'Puntaje Grupo Referencia',
                            backgroundColor     : 'rgba(254,191,4,0.9)',
                            borderColor         : 'rgba(60,141,188,0.8)',
                            pointRadius          : false,
                            pointColor          : '#3b8bba',
                            pointStrokeColor    : 'rgba(60,141,188,1)',
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            data                : puntaje_referencia
                        },
                        {
                            label               : 'Desviación Estandar Programa',
                            backgroundColor     : 'rgba(204, 0, 0, 1)',
                            borderColor         : 'rgba(210, 214, 222, 1)',
                            pointRadius         : false,
                            pointColor          : 'rgba(210, 214, 222, 1)',
                            pointStrokeColor    : '#c1c7d1',
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: 'rgba(220,220,220,1)',
                            data                : desviacion_programa
                        },
                        {
                            label               : 'Desviación Estandar Grupo Referencia',
                            backgroundColor     : 'rgba(255, 146, 10, 1)',
                            borderColor         : 'rgba(210, 214, 222, 1)',
                            pointRadius         : false,
                            pointColor          : 'rgba(210, 214, 222, 1)',
                            pointStrokeColor    : '#c1c7d1',
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: 'rgba(220,220,220,1)',
                            data                : desviacion_referencia
                        },
                    ]
                }
                var stackedBarChartData = $.extend(true, {}, barChartData)

                var stackedBarChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                scales: {
                    xAxes: [{
                    stacked: true,
                    }],
                    yAxes: [{
                    stacked: true
                    }]
                }
                }

                new Chart(stackedBarChartCanvas, {
                    type: 'bar',
                    data: stackedBarChartData,
                    options: stackedBarChartOptions
                })
            
            }
        });
    })
</script>
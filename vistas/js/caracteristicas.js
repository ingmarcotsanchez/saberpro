/* Tabla dinamica de caracteristicas */
$.ajax({
	url: "ajax/datatable-caracteristicas.ajax.php",
	success:function(respuesta){
	}
})
var perfilOculto = $("#perfilOculto").val();
$('.tablaCaracteristicas').DataTable( {
    "ajax": "ajax/datatable-caracteristicas.ajax.php?perfilOculto="+perfilOculto,
    "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	buttons: [		          
		'excelHtml5',
		'pdfHtml5'
		],
	"bDestroy": true,
	"responsive": true,
	"bInfo":true,
	"iDisplayLength": 10,
	"autoWidth": false,
	 "language": {
			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
	}
} );

/* Editar una caracteristica */
$(".tablaCaracteristicas tbody").on("click", "button.btnEditarCaracteristica", function(){
	var idCaracteristica = $(this).attr("idCaracteristica");
	var datos = new FormData();
    datos.append("idCaracteristica", idCaracteristica);
    $.ajax({
    	url:"ajax/caracteristicas.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
		success:function(respuesta){
            var datosModulo = new FormData();
            datosModulo.append("idPrueba",respuesta["id_prueba"]);
            $.ajax({
                url:"ajax/pruebas.ajax.php",
                method: "POST",
                data: datosModulo,
                cache: false,
                contentType: false,
                processData: false,
                dataType:"json",
                success:function(respuesta){
                    $("#editarPrueba").val(respuesta["id"]);
                    $("#editarPrueba").html(respuesta["prueba"]);
                }
            })
            $("#editarPuntajeInicial").val(respuesta["puntaje_inicial"]);
            $("#editarPuntajeFinal").val(respuesta["puntaje_final"]);
           	$("#editarNivel").val(respuesta["nivel"]);
			$('#editarCaracteristica').summernote ('code',data.tick_descrip);
            //$("#editarCaracteristica").val(respuesta["caracteristica"]);
        }
  	})
})

/* Eliminar una caracteristica */
$(".tablaCaracteristicas tbody").on("click", "button.btnEliminarCaracteristica", function(){
	var idCaracteristica = $(this).attr("idCaracteristica");
	var codigo = $(this).attr("codigo");
	swal({
		title: '¿Está seguro de borrar la Caracteristica de aprendizaje?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar caracteristica!'
        }).then(function(result) {
        if (result.value) {
        	window.location = "index.php?ruta=caracteristicas&idCaracteristica="+idCaracteristica;//+"&codigo="+codigo;
        }
	})
})
	

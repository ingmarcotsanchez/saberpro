/* Tabla dinamica de programas */
$.ajax({
	url: "ajax/datatable-programas.ajax.php",
	success:function(respuesta){
	}
})
var perfilOculto = $("#perfilOculto").val();
$('.tablaProgramas').DataTable( {
    "ajax": "ajax/datatable-programas.ajax.php?perfilOculto="+perfilOculto,
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

/* Asignar un código según el centro regional */
 $("#nuevoCentro").change(function(){
 	var idCentro = $(this).val();
 	var datos = new FormData();
   	datos.append("idCentro", idCentro);
   	$.ajax({
       url:"ajax/programas.ajax.php",
       method: "POST",
       data: datos,
       cache: false,
       contentType: false,
       processData: false,
       dataType:"json",
       success:function(respuesta){
       	if(!respuesta){
       		var nuevoCodigo = idCentro+"01";     		
			$("#nuevoCodigo").val(nuevoCodigo);
       	}else{
       		var nuevoCodigo = Number(respuesta["codigo"]) + 1;
           	$("#nuevoCodigo").val(nuevoCodigo);
       	}
       }
   	})
 })

/* Editar un programa */

$(".tablaProgramas tbody").on("click", "button.btnEditarPrograma", function(){
	var idPrograma = $(this).attr("idPrograma");
	var datos = new FormData();
    datos.append("idPrograma", idPrograma);
    $.ajax({
    	url:"ajax/programas.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){
    		var datosCentro = new FormData();
          	datosCentro.append("idCentro",respuesta["id_centro"]);
           	$.ajax({
            	url:"ajax/centros.ajax.php",
              	method: "POST",
              	data: datosCentro,
              	cache: false,
              	contentType: false,
              	processData: false,
              	dataType:"json",
              	success:function(respuesta){
                	$("#editarCentro").val(respuesta["id"]);
                  	$("#editarCentro").html(respuesta["centro"]);
              	}
          	})
        	$("#editarCodigo").val(respuesta["codigo"]);
           	$("#editarDescripcion").val(respuesta["descripcion"]);
      	}
  	})
})

/* Eliminar un programa */
$(".tablaProgramas tbody").on("click", "button.btnEliminarPrograma", function(){
	var idPrograma = $(this).attr("idPrograma");
	var codigo = $(this).attr("codigo");
	swal({
		title: '¿Está seguro de borrar el programa?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar programa!'
        }).then(function(result) {
        if (result.value) {
        	window.location = "index.php?ruta=programas&idPrograma="+idPrograma+"&codigo="+codigo;
        }
	})
})
	

/*Cargar tabla dinámica de pruebas*/
$.ajax({
	url: "ajax/datatable-subcompetencias.ajax.php",
	success:function(respuesta){
		$(".open_modal").click(function(){ $("#"+$(this).attr("data-target")).modal() });
	}
})
var perfilOculto = $("#perfilOculto").val();
$('.tablaSubCompetencia').DataTable( {
    "ajax": "ajax/datatable-subcompetencias.ajax.php?perfilOculto="+perfilOculto,
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

/*Asignar codigo según competencia*/
$("#nuevaPrueba").change(function(){
 	var idPrueba = $(this).val();
 	var datos = new FormData();
   	datos.append("idPrueba", idPrueba);
   	$.ajax({
       url:"ajax/pruebas.ajax.php",
       method: "POST",
       data: datos,
       cache: false,
       contentType: false,
       processData: false,
       dataType:"json",
       success:function(respuesta){
       	if(!respuesta){
       		var nuevoCodigo = idPrueba+"01";
       		$("#nuevoCodigo").val(nuevoCodigo);
       	}else{
       		var nuevoCodigo = Number(respuesta["codigo"]) + 1;
           	$("#nuevoCodigo").val(nuevoCodigo);
       	}
       }
   	})
})

/*Editar Prueba*/
$(".tablaSubCompetencia tbody").on("click", "button.btnEditarSubcompetencia", function(){
	var idSubcompetencia = $(this).attr("idSubcompetencia");
	var datos = new FormData();
    datos.append("idSubcompetencia", idSubcompetencia);
    $.ajax({
        url:"ajax/subcompetencias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){
            var datosCompetencia = new FormData();
            datosCompetencia.append("idPrueba",respuesta["id_prueba"]);
            $.ajax({
                url:"ajax/pruebas.ajax.php",
                method: "POST",
                data: datosCompetencia,
                cache: false,
                contentType: false,
                processData: false,
                dataType:"json",
                success:function(respuesta){
                    $("#editarPrueba").val(respuesta["id"]);
                    $("#editarPrueba").html(respuesta["prueba"]);
                }
            })
            $("#editarCodigo").val(respuesta["codigo"]);
            $("#editarDescripcion").val(respuesta["descripcion"]);
        }
    })
})

/*Eliminar Prueba*/
$(".tablaSubCompetencia tbody").on("click", "button.btnEliminarSubcompetencia", function(){
	var idSubcompetencia = $(this).attr("idSubcompetencia");
	var codigo = $(this).attr("codigo");
	swal({
		title: '¿Está seguro de borrar el modulo?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar modulo!'
        }).then(function(result) {
        if (result.value) {
        	window.location = "index.php?ruta=subcompetencias&idSubcompetencia="+idSubcompetencia+"&codigo="+codigo;
        }
	})
})

/*Imprimir*/
$(".tablaSubCompetencia tbody").on("click", "button.btnImprimirSubcompetencia", function(){
	var codigoSubcompetencia = $(this).attr("codigoSubcompetencia");
	window.open("extensiones/tcpdf/pdf/pdf.php","_blank");
})
	


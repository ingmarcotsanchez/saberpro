/*Cargar tabla dinámica de pruebas*/
$.ajax({
	url: "ajax/datatable-pruebas.ajax.php",
	success:function(respuesta){
		$(".open_modal").click(function(){ $("#"+$(this).attr("data-target")).modal() });
	}
})
var perfilOculto = $("#perfilOculto").val();
$('.tablaPrueba').DataTable( {
    "ajax": "ajax/datatable-pruebas.ajax.php?perfilOculto="+perfilOculto,
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
$("#nuevaCompetencia").change(function(){
 	var idCompetencia = $(this).val();
 	var datos = new FormData();
   	datos.append("idCompetencia", idCompetencia);
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
       		var nuevoCodigo = idCompetencia+"01";
       		$("#nuevoCodigo").val(nuevoCodigo);
       	}else{
       		var nuevoCodigo = Number(respuesta["codigo"]) + 1;
           	$("#nuevoCodigo").val(nuevoCodigo);
       	}
       }
   	})
})

/*Editar Prueba*/
$(".tablaPruebas tbody").on("click", "button.btnEditarPrueba", function(){
	var idPrueba = $(this).attr("idPrueba");
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
            var datosCompetencia = new FormData();
            datosCompetencia.append("idCompetencia",respuesta["id_competencia"]);
            $.ajax({
                url:"ajax/competencias.ajax.php",
                method: "POST",
                data: datosCompetencia,
                cache: false,
                contentType: false,
                processData: false,
                dataType:"json",
                success:function(respuesta){
                    $("#editarCompetencia").val(respuesta["id"]);
                    $("#editarCompetencia").html(respuesta["competencia"]);
                }
            })
            $("#editarCodigo").val(respuesta["codigo"]);
            $("#editarDescripcion").val(respuesta["descripcion"]);
        }
    })
})

/*Eliminar Prueba*/
$(".tablaPruebas tbody").on("click", "button.btnEliminarPrueba", function(){
	var idPrueba = $(this).attr("idPrueba");
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
        	window.location = "index.php?ruta=pruebas&idPrueba="+idPrueba+"&codigo="+codigo;
        }
	})
})

/*Imprimir*/
$(".tablaPruebas tbody").on("click", "button.btnImprimirPrueba", function(){
	var codigoPrueba = $(this).attr("codigoPrueba");
	window.open("extensiones/tcpdf/pdf/pdf.php","_blank");
})
	


/*Cargar tabla dinámica de mejoras*/
$.ajax({
	url: "ajax/datatable-mejoras.ajax.php",
	success:function(respuesta){
	}
})
var perfilOculto = $("#perfilOculto").val();
$('.tablaMejoras').DataTable( {
    "ajax": "ajax/datatable-mejoras.ajax.php?perfilOculto="+perfilOculto,
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

/*Asignar codigo según Subcomponente*/
$("#nuevoSubcomponente").change(function(){
 	var idSubcomponente = $(this).val();
 	var datos = new FormData();
   	datos.append("idSubcomponente", idSubcomponente);
   	$.ajax({
       url:"ajax/mejoras.ajax.php",
       method: "POST",
       data: datos,
       cache: false,
       contentType: false,
       processData: false,
       dataType:"json",
       success:function(respuesta){
       	if(!respuesta){
       		var nuevoCodigo = idSubcomponente+"01";
       		$("#nuevoCodigo").val(nuevoCodigo);
       	}else{
       		var nuevoCodigo = Number(respuesta["codigo"]) + 1;
           	$("#nuevoCodigo").val(nuevoCodigo);
       	}
       }
   	})
})

/*Editar mejoras*/
$(".tablaMejoras tbody").on("click", "button.btnEditarMejora", function(){
	var idMejora = $(this).attr("idMejora");
	var datos = new FormData();
    datos.append("idMejora", idMejora);
    $.ajax({
        url:"ajax/mejoras.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){
            var datosModulo = new FormData();
            datosModulo.append("idSubcomponente",respuesta["id_subcomponente"]);
            $.ajax({
                url:"ajax/subcompetencias.ajax.php",
                method: "POST",
                data: datosModulo,
                cache: false,
                contentType: false,
                processData: false,
                dataType:"json",
                success:function(respuesta2){
                    $("#editarSubCompetencia").val(respuesta2["id"]);
                    $("#editarSubCompetencia").html(respuesta2["descripcion"]);
                }
            })
            $("#editarQue").val(respuesta["que"]);
            $("#editarComo").val(respuesta["como"]);
            $("#editarQuien").val(respuesta["quien"]);
			$("#editarCuando").val(respuesta["cuando"]);
        }
    })
})

/*Eliminar mejora*/
$(".tablaMejoras tbody").on("click", "button.btnEliminarMejora", function(){
	var idMejora = $(this).attr("idMejora");
	swal({
		title: '¿Está seguro de borrar?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar registros!'
        }).then(function(result) {
        if (result.value) {
        	window.location = "index.php?ruta=mejoras&idmejora="+idMejora;
        }
	})
})
	

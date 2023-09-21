/*Cargar tabla dinámica de subcomponentes*/
$.ajax({
	url: "ajax/datatable-subcomponentes.ajax.php",
	success:function(respuesta){
	}
})
var perfilOculto = $("#perfilOculto").val();
$('.tablaSubcomponentes').DataTable( {
    "ajax": "ajax/datatable-subcomponentes.ajax.php?perfilOculto="+perfilOculto,
    "deferRender": true,
	"retrieve": true,
	"processing": true,
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

/*Asignar codigo según modulo*/
$("#nuevoModulo").change(function(){
 	var idModulo = $(this).val();
 	var datos = new FormData();
   	datos.append("idModulo", idModulo);
   	$.ajax({
       url:"ajax/subcomponentes.ajax.php",
       method: "POST",
       data: datos,
       cache: false,
       contentType: false,
       processData: false,
       dataType:"json",
       success:function(respuesta){
       	if(!respuesta){
       		var nuevoCodigo = idModulo+"01";
       		$("#nuevoCodigo").val(nuevoCodigo);
       	}else{
       		var nuevoCodigo = Number(respuesta["codigo"]) + 1;
           	$("#nuevoCodigo").val(nuevoCodigo);
       	}
       }
   	})
})

/*Editar subcomponentes*/
$(".tablaSubcomponentes tbody").on("click", "button.btnEditarSubcomponente", function(){
	var idSubcomponente = $(this).attr("idSubcomponente");
	var datos = new FormData();
    datos.append("idSubcomponente", idSubcomponente);
    $.ajax({
        url:"ajax/subcomponentes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success:function(respuesta){
            var datosModulo = new FormData();
            datosModulo.append("idModulo",respuesta["id_modulo"]);
            $.ajax({
                url:"ajax/modulos.ajax.php",
                method: "POST",
                data: datosModulo,
                cache: false,
                contentType: false,
                processData: false,
                dataType:"json",
                success:function(respuesta2){
                    $("#editarModulo").val(respuesta2["id"]);
                    $("#editarModulo").html(respuesta2["descripcion"]);
                }
            })
            $("#editarCodigo").val(respuesta["codigo"]);
            $("#editarDescripcion").val(respuesta["descripcion"]);
			$("#editarPuntaje").val(respuesta["puntaje"]);
        }
    })
})

/*Eliminar subcomponentes*/
$(".tablaSubcomponentes tbody").on("click", "button.btnEliminarSubcomponente", function(){
	var idSubcomponente = $(this).attr("idSubcomponente");
	var codigo = $(this).attr("codigo");
	swal({
		title: '¿Está seguro de borrar el subcomponentes?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar subcomponente!'
        }).then(function(result) {
        if (result.value) {
        	window.location = "index.php?ruta=subcomponentes&idSubcomponente="+idSubcomponente+"&codigo="+codigo;
        }
	})
})
	

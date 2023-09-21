/* Editar Resultados Globales */
$(".tablas").on("click", ".btnEditarResultado", function(){
	var idResultado = $(this).attr("idResultado");
	var datos = new FormData();
	datos.append("idResultado", idResultado);
	$.ajax({
		url: "ajax/resultados.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){
     		$("#editarResultado").val(respuesta["resultado"]);
     		$("#idResultado").val(respuesta["id"]);
     	}
	})
})
/* Eliminar Resultados Globales */
$(".tablas").on("click", ".btnEliminarResultado", function(){
	 var idResultado = $(this).attr("idResultado");
	 swal({
	 	title: '¿Está seguro de borrar el Resultados?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar Resultados!'
	 }).then(function(result){
	 	if(result.value){
	 		window.location = "index.php?ruta=resultados&idResultado="+idResultado;
	 	}
	 })
})
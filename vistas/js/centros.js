/* Editar Centros Regionales */
$(".tablas").on("click", ".btnEditarCentro", function(){
	var idCentro = $(this).attr("idCentro");
	var datos = new FormData();
	datos.append("idCentro", idCentro);
	$.ajax({
		url: "ajax/centros.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){
     		$("#editarCentro").val(respuesta["centro"]);
     		$("#idCentro").val(respuesta["id"]);
     	}
	})
})
/* Eliminar Centros Regionales */
$(".tablas").on("click", ".btnEliminarCentro", function(){
	 var idCentro = $(this).attr("idCentro");
	 swal({
	 	title: '¿Está seguro de borrar el Centro Regional?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar Centro Regional!'
	 }).then(function(result){
	 	if(result.value){
	 		window.location = "index.php?ruta=centros&idCentro="+idCentro;
	 	}
	 })
})
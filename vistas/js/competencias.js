/* Editar Competencias */
$(".tablas").on("click", ".btnEditarCompetencia", function(){
	var idCompetencia = $(this).attr("idCompetencia");
	var datos = new FormData();
	datos.append("idCompetencia", idCompetencia);
	$.ajax({
		url: "ajax/competencias.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){
     		$("#editarCompetencia").val(respuesta["competencia"]);
     		$("#idCompetencia").val(respuesta["id"]);
     	}
	})
})
/* Eliminar Competencias */
$(".tablas").on("click", ".btnEliminarCompetencia", function(){
	 var idCompetencia = $(this).attr("idCompetencia");
	 swal({
	 	title: '¿Está seguro de borrar la Competencia?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar Competencia!'
	 }).then(function(result){
	 	if(result.value){
	 		window.location = "index.php?ruta=competencias&idCompetencia="+idCompetencia;
	 	}
	 })
})
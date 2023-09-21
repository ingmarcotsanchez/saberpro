<?php
class ControladorCompetencias{
	/* Crear Competencias */
	static public function ctrCrearCompetencia(){
		if(isset($_POST["nuevaCompetencia"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCompetencia"])){
				$tabla = "competencias";
				$datos = $_POST["nuevaCompetencia"];
				$respuesta = ModeloCompetencias::mdlIngresarCompetencia($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "La Competencia ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {
									window.location = "competencias";
									}
								})
					</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡La Competencia no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							    window.location = "competencias";
							}
						})
			  	</script>';
			}
		}
	}
	/* Mostrar Competencias */

	static public function ctrMostrarCompetencias($item, $valor){
		$tabla = "competencias";
		$respuesta = ModeloCompetencias::mdlMostrarCompetencias($tabla, $item, $valor);
		return $respuesta;
	}

	/* Editar Competencias */

	static public function ctrEditarCompetencia(){
		if(isset($_POST["editarCompetencia"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCompetencia"])){
				$tabla = "competencias";
				$datos = array("competencia"=>$_POST["editarCompetencia"],
							   "id"=>$_POST["idCompetencia"]);
				$respuesta = ModeloCompetencias::mdlEditarCompetencia($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "La Competencia ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {
									    window.location = "competencias";
									}
								})
					</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡La Competencia no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							    window.location = "competencias";
							}
						})
			  	</script>';
			}
		}
	}
	/* Borrar una Competencia */

	static public function ctrBorrarCompetencia(){
		if(isset($_GET["idCompetencia"])){
			$respuesta = ModeloModulos::mdlMostrarModulos("modulos", "id_competencia", $_GET["idCompetencia"], "ASC");
			if(!$respuesta){
				$tabla ="Competencias";
				$datos = $_GET["idCompetencia"];
				$respuesta = ModeloCompetencias::mdlBorrarCompetencia($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
						swal({
							  type: "success",
							  title: "La competencia ha sido borrada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
										    window.location = "competencias";
										}
									})
						</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "La competencia no se puede eliminar porque tiene programas",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {
									    window.location = "competencias";
									}
								})
					</script>';	
			}
		}
	}
}

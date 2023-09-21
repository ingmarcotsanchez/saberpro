<?php
class ControladorProgramas{
	/* Mostrar los programa */
	static public function ctrMostrarProgramas($item, $valor, $orden){
		$tabla = "programas";
		$respuesta = ModeloProgramas::mdlMostrarProgramas($tabla, $item, $valor, $orden);
		return $respuesta;
	}
	static public function ctrFiltrarProgramas($item, $valor, $orden){
		$tabla = "programas";
		$respuesta = ModeloProgramas::mdlFiltrarProgramas($tabla, $item, $valor, $orden);
		return $respuesta;
	}
	/* Crear un programa */
	static public function ctrCrearPrograma(){
		if(isset($_POST["nuevaDescripcion"])){
			if(preg_match('/^[-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"])){
				$tabla = "programas";
				$datos = array("id_centro" => $_POST["nuevoCentro"],
							   "codigo" => $_POST["nuevoCodigo"],
							   "descripcion" => $_POST["nuevaDescripcion"]);
				$respuesta = ModeloProgramas::mdlIngresarPrograma($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
						swal({
							  type: "success",
							  title: "El programa ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
											window.location = "programas";
										}
									})
						</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡El programa no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
								window.location = "programas";
							}
						})
			  	</script>';
			}
		}
	}
	/* Editar un programa */
	static public function ctrEditarPrograma(){
		if(isset($_POST["editarDescripcion"])){
			if(preg_match('/^[-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"])){
				$tabla = "programas";
				$datos = array("id_centro" => $_POST["editarCentro"],
							   "codigo" => $_POST["editarCodigo"],
							   "descripcion" => $_POST["editarDescripcion"]);
				$respuesta = ModeloProgramas::mdlEditarPrograma($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
						swal({
							  type: "success",
							  title: "El programa ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
											window.location = "programas";
										}
									})
						</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡El programa no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
								window.location = "programas";
							}
						})
			  	</script>';
			}
		}
	}
	/* Borrar un programa */
	static public function ctrEliminarPrograma(){
		if(isset($_GET["idPrograma"])){
			$tabla ="programas";
			$datos = $_GET["idPrograma"];
			$respuesta = ModeloProgramas::mdlEliminarPrograma($tabla, $datos);
			if($respuesta == "ok"){
				echo'<script>
				swal({
					  type: "success",
					  title: "El programa ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {
									window.location = "productos";
								}
							})
				</script>';
			}		
		}
	}
}
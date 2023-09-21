<?php
class ControladorCentros{
	/* Crear Centros Regionales */
	static public function ctrCrearCentro(){
		if(isset($_POST["nuevoCentro"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCentro"])){
				$tabla = "centros";
				$datos = $_POST["nuevoCentro"];
				$respuesta = ModeloCentros::mdlIngresarCentro($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "El centro regional ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {
									window.location = "centros";
									}
								})
					</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡El centro regional no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							    window.location = "centros";
							}
						})
			  	</script>';
			}
		}
	}
	/* Mostrar Centros regionales */

	static public function ctrMostrarCentros($item, $valor){
		$tabla = "centros";
		$respuesta = ModeloCentros::mdlMostrarCentros($tabla, $item, $valor);
		return $respuesta;
	}

	/* Editar Centros regionales */

	static public function ctrEditarCentro(){
		if(isset($_POST["editarCentro"])){
			if(preg_match('/^[-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCentro"])){
				$tabla = "centros";
				$datos = array("centro"=>$_POST["editarCentro"],
							   "id"=>$_POST["idCentro"]);
				$respuesta = ModeloCentros::mdlEditarCentro($tabla, $datos);
				echo $respuesta;
				if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "El Centro Regional ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {
									    window.location = "centros";
									}
								})
					</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡El Centro Regional no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							    window.location = "centros";
							}
						})
			  	</script>';
			}
		}
	}
	/* Borrar un Centro Regional */

	static public function ctrBorrarCentro(){
		if(isset($_GET["idCentro"])){
			$respuesta = ModeloProgramas::mdlMostrarProgramas("programas", "id_centro", $_GET["idCentro"], "ASC");
			if(!$respuesta){
				$tabla ="Centros";
				$datos = $_GET["idCentro"];
				$respuesta = ModeloCentros::mdlBorrarCentro($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
						swal({
							  type: "success",
							  title: "El Centro Regional ha sido borrado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
										    window.location = "centros";
										}
									})
						</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "El Centro Regional no se puede eliminar porque tiene programas",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {
									    window.location = "centros";
									}
								})
					</script>';	
			}
		}
	}
}

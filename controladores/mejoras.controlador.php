<?php

class ControladorMejoras{
	/*Mostrar Mejoras*/
	static public function ctrMostrarMejoras($item, $valor, $orden){
		$tabla = "mejoras";
		$respuesta = ModeloMejoras::mdlMostrarMejoras($tabla, $item, $valor, $orden);
		//var_dump($respuesta);
		return $respuesta;
	}
	/*Crear mejoras*/
	static public function ctrCrearMejora(){
		if(isset($_POST["nuevoQue"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoQue"]) ){
			   	$tabla = "mejoras";
				$datos = array("id_subcomponente" => $_POST["nuevoSubComponente"],
							   "que" => $_POST["nuevoQue"],
							   "como" => $_POST["nuevoComo"],
							   "cuando" => $_POST["nuevoCuando"],
							   "quien" => $_POST["nuevoQuien"]
							);
				$respuesta = ModeloMejoras::mdlIngresarMejora($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
						swal({
							  type: "success",
							  title: "La mejora ha sido guardada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
										window.location = "mejoras";
										}
									})
						</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡La mejora no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							window.location = "mejoras";
							}
						})
			  	</script>';
			}
		}
	}
	/*Editar una mejora*/
	static public function ctrEditarMejora(){
		if(isset($_POST["editarQue"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarQue"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editarComo"]) &&	
			   preg_match('/^[0-9.]+$/', $_POST["editarCuando"]) ){
			   $tabla = "mejoras";
			   $datos = array("id_subcomponente" => $_POST["editarSubComponente"],
							   "que" => $_POST["editarQue"],
							   "como" => $_POST["editarComo"],
							   "cuando" => $_POST["editarCuando"],
							   "quien" => $_POST["editarQuien"]
							);
				$respuesta = ModeloMejoras::mdlEditarMejora($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
							swal({
								type: "success",
							  	title: "La mejora ha sido editado correctamente",
							  	showConfirmButton: true,
							  	confirmButtonText: "Cerrar"
							}).then(function(result){
								if (result.value) {
									window.location = "mejoras";
								}
							})
						</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡La mejora no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							window.location = "mejoras";
							}
						})
			  	</script>';
			}
		}
	}
	/*Borrar un modulo*/
	static public function ctrEliminarMejora(){
		if(isset($_GET["idMejora"])){
			$tabla ="mejoras";
			$datos = $_GET["idMejora"];
			$respuesta = ModeloMejoras::mdlEliminarmejora($tabla, $datos);
			if($respuesta == "ok"){
				echo'<script>
				swal({
					  type: "success",
					  title: "La mejora ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {
								window.location = "mejoras";
								}
							})
				</script>';
			}		
		}
	}
}
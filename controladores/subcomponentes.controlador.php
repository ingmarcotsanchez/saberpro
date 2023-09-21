<?php

class ControladorSubComponentes{
	/*Mostrar SubComponentes*/
	static public function ctrMostrarSubComponentes($item, $valor, $orden){
		$tabla = "subcomponentes";
		$respuesta = ModeloSubcomponentes::mdlMostrarSubComponentes($tabla, $item, $valor, $orden);
		//var_dump($respuesta);
		return $respuesta;
	}
	/*Crear un SubComponentes*/
	static public function ctrCrearSubcomponente(){
		if(isset($_POST["nuevaDescripcion"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]) &&
			    preg_match('/^[0-9]+$/', $_POST["nuevoPuntaje"]) ){
			   	$tabla = "subcomponentes";
				$datos = array("id_modulo" => $_POST["nuevoModulo"],
							   "codigo" => $_POST["nuevoCodigo"],
							   "descripcion" => $_POST["nuevaDescripcion"],
							   "puntaje" => $_POST["nuevoPuntaje"]
							);
				$respuesta = ModeloSubcomponentes::mdlIngresarSubComponente($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
						swal({
							  type: "success",
							  title: "La sub componente ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
										window.location = "subcomponentes";
										}
									})
						</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡La sub componente no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							window.location = "subcomponentes";
							}
						})
			  	</script>';
			}
		}
	}
	/*Editar una sub subcomponentes*/
	static public function ctrEditarSubComponente(){
		if(isset($_POST["editarDescripcion"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editarPuntaje"]) ){
			   $tabla = "subcomponentes";
			   $datos = array("id_modulo" => $_POST["editarModulo"],
							   "codigo" => $_POST["editarCodigo"],
							   "descripcion" => $_POST["editarDescripcion"],
							   "puntaje" => $_POST["editarPuntaje"]
							);
				$respuesta = ModeloSubcomponentes::mdlEditarSubComponente($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
							swal({
								type: "success",
							  	title: "El sub componente ha sido editado correctamente",
							  	showConfirmButton: true,
							  	confirmButtonText: "Cerrar"
							}).then(function(result){
								if (result.value) {
									window.location = "subcomponentes";
								}
							})
						</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡El sub componente no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							window.location = "subcomponentes";
							}
						})
			  	</script>';
			}
		}
	}
	/*Borrar un subcomponentes*/
	static public function ctrEliminarSubComponente(){
		if(isset($_GET["idSubcomponente"])){
			$tabla ="subcomponentes";
			$datos = $_GET["idSubcomponente"];
			$respuesta = ModeloSubcomponentes::mdlEliminarSubComponente($tabla, $datos);
			if($respuesta == "ok"){
				echo'<script>
				swal({
					  type: "success",
					  title: "El subcomponente ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {
								window.location = "subcomponentes";
								}
							})
				</script>';
			}		
		}
	}
}
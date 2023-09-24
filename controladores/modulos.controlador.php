<?php
session_start();
class ControladorModulos{
	/*Mostrar modulos*/
	static public function ctrMostrarModulos($item, $valor, $orden){
		$tabla = "modulos";
		if($_SESSION["id_programa"] != 0){
			$respuesta = ModeloModulos::mdlMostrarModulosPrograma($tabla, $item, $valor, $orden);
		}else{
			$respuesta = ModeloModulos::mdlMostrarModulos($tabla, $item, $valor, $orden);
		}
		return $respuesta;
	}
	
	/*Crear un modulo*/
	static public function ctrCrearModulo(){
		if(isset($_POST["nuevaDescripcion"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]) &&
			    preg_match('/^[0-9]+$/', $_POST["nuevoPuntaje"]) &&	
			    preg_match('/^[0-9.]+$/', $_POST["nuevoDesvEstand"]) ){
			   	$tabla = "modulos";
				$datos = array("id_competencia" => $_POST["nuevaCompetencia"],
								"id_programa" => $_POST["nuevoPrograma"],
							   "codigo" => $_POST["nuevoCodigo"],
							   "descripcion" => $_POST["nuevaDescripcion"],
							   "puntaje" => $_POST["nuevoPuntaje"],
							   "desv_estand" => $_POST["nuevoDesvEstand"]
							);
				$respuesta = ModeloModulos::mdlIngresarModulo($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
						swal({
							  type: "success",
							  title: "El modulo ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
										window.location = "modulos";
										}
									})
						</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡El modulo no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							window.location = "modulos";
							}
						})
			  	</script>';
			}
		}
	}
	/*Editar un modulo*/
	static public function ctrEditarModulo(){
		if(isset($_POST["editarDescripcion"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editarPuntaje"]) &&	
			   preg_match('/^[0-9.]+$/', $_POST["editarDesvEstand"]) ){
			   $tabla = "modulos";
			   $datos = array("id_competencia" => $_POST["editarCompetencia"],
			   				  "id_programa" => $_POST["editarPrograma"],
							   "codigo" => $_POST["editarCodigo"],
							   "descripcion" => $_POST["editarDescripcion"],
							   "puntaje" => $_POST["editarPuntaje"],
							   "desv_estand" => $_POST["editarDesvEstand"]
							);
				$respuesta = ModeloModulos::mdlEditarModulo($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
							swal({
								type: "success",
							  	title: "El modulo ha sido editado correctamente",
							  	showConfirmButton: true,
							  	confirmButtonText: "Cerrar"
							}).then(function(result){
								if (result.value) {
									window.location = "modulos";
								}
							})
						</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡El modulo no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							window.location = "modulos";
							}
						})
			  	</script>';
			}
		}
	}
	/*Borrar un modulo*/
	static public function ctrEliminarModulo(){
		if(isset($_GET["idModulo"])){
			$tabla ="modulos";
			$datos = $_GET["idModulo"];
			$respuesta = ModeloModulos::mdlEliminarModulo($tabla, $datos);
			if($respuesta == "ok"){
				echo'<script>
				swal({
					  type: "success",
					  title: "El modulo ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {
								window.location = "modulos";
								}
							})
				</script>';
			}		
		}
	}
	/*Grafica un modulo*/
	static public function ctrGraficaModulosPuntaje(){
		$tabla = "modulos";
		$respuesta = ModeloModulos::mdlGraficaModulosPuntaje($tabla);
		return $respuesta;
	}
}
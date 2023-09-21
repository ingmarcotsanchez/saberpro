<?php
//session_start();
class ControladorSubcompetencias{
	/*Mostrar pruebas*/
	static public function ctrMostrarSubcompetencias($item, $valor, $orden){
		$tabla = "subcompetencias";
        $respuesta = ModeloSubcompetencias::mdlMostrarSubcompetencias($tabla, $item, $valor, $orden);
		return $respuesta;
	}
	static public function ctrFiltrarSubcompetencias($item, $valor, $orden){
		$tabla = "subcompetencias";
		$respuesta = ModeloSubcompetencias::mdlFiltrarSubcompetencias($tabla, $item, $valor, $orden);
		return $respuesta;
	}
	
	/*Crear pruebas*/
	static public function ctrCrearSubcompetencia(){
		if(isset($_POST["nuevaDescripcion"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"])){
			   	$tabla = "subcompetencias";
				$datos = array("id_prueba" => $_POST["nuevaPrueba"],
								"codigo" => $_POST["nuevoCodigo"],
							   "descripcion" => $_POST["nuevaDescripcion"]
							);
				$respuesta = ModeloSubcompetencias::mdlIngresarSubcompetencia($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
						swal({
							  type: "success",
							  title: "La sub competencia ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
										window.location = "subcompetencias";
										}
									})
						</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡La sub competencia no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							window.location = "subcompetencias";
							}
						})
			  	</script>';
			}
		}
	}
	/*Editar pruebas*/
	static public function ctrEditarSubcompetencia(){
		if(isset($_POST["editarDescripcion"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"])){
			   $tabla = "subcompetencias";
			   $datos = array("id_prueba" => $_POST["editarPrueba"],
			   				  "codigo" => $_POST["editarCodigo"],
						        "descripcion" => $_POST["editarDescripcion"]
							);
				$respuesta = ModeloSubcompetencias::mdlEditarsubcompetencia($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
							swal({
								type: "success",
							  	title: "La sub competencias ha sido editado correctamente",
							  	showConfirmButton: true,
							  	confirmButtonText: "Cerrar"
							}).then(function(result){
								if (result.value) {
									window.location = "subcompetencias";
								}
							})
						</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡La sub competencias no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							window.location = "subcompetencias";
							}
						})
			  	</script>';
			}
		}
	}
	/*Borrar pruebas*/
	static public function ctrEliminarSubcompetencia(){
		if(isset($_GET["idSubcompetencia"])){
			$tabla ="subcompetencias";
			$datos = $_GET["idSubcompetencia"];
			$respuesta = ModeloSubcompetencias::mdlEliminarSubcompetencia($tabla, $datos);
			if($respuesta == "ok"){
				echo'<script>
				swal({
					  type: "success",
					  title: "La sub competencias ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {
								window.location = "subcompetencias";
								}
							})
				</script>';
			}		
		}
	}
	
}
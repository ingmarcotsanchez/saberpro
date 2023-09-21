<?php
//session_start();
class ControladorPruebas{
	/*Mostrar pruebas*/
	static public function ctrMostrarPruebas($item, $valor, $orden){
		$tabla = "prueba";
        $respuesta = ModeloPruebas::mdlMostrarPruebas($tabla, $item, $valor, $orden);
		//var_dump($respuesta);
		return $respuesta;
	}
	static public function ctrFiltrarPruebas($item, $valor, $orden){
		$tabla = "prueba";
		$respuesta = ModeloPruebas::mdlFiltrarPruebas($tabla, $item, $valor, $orden);
		return $respuesta;
	}
	
	/*Crear pruebas*/
	static public function ctrCrearPrueba(){
		if(isset($_POST["nuevaDescripcion"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"])){
			   	$tabla = "prueba";
				$datos = array("id_competencia" => $_POST["nuevaCompetencia"],
								"codigo" => $_POST["nuevoCodigo"],
							   "descripcion" => $_POST["nuevaDescripcion"]
							);
				$respuesta = ModeloPruebas::mdlIngresarPrueba($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
						swal({
							  type: "success",
							  title: "La prueba ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
										window.location = "pruebas";
										}
									})
						</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡La prueba no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							window.location = "pruebas";
							}
						})
			  	</script>';
			}
		}
	}
	/*Editar pruebas*/
	static public function ctrEditarPrueba(){
		if(isset($_POST["editarDescripcion"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"])){
			   $tabla = "prueba";
			   $datos = array("id_competencia" => $_POST["editarCompetencia"],
			   				  "codigo" => $_POST["editarCodigo"],
						        "descripcion" => $_POST["editarDescripcion"]
							);
				$respuesta = ModeloPruebas::mdlEditarprueba($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
							swal({
								type: "success",
							  	title: "La prueba ha sido editado correctamente",
							  	showConfirmButton: true,
							  	confirmButtonText: "Cerrar"
							}).then(function(result){
								if (result.value) {
									window.location = "pruebas";
								}
							})
						</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡La prueba no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							window.location = "pruebas";
							}
						})
			  	</script>';
			}
		}
	}
	/*Borrar pruebas*/
	static public function ctrEliminarPrueba(){
		if(isset($_GET["idPrueba"])){
			$tabla ="prueba";
			$datos = $_GET["idPrueba"];
			$respuesta = ModeloPruebas::mdlEliminarPrueba($tabla, $datos);
			if($respuesta == "ok"){
				echo'<script>
				swal({
					  type: "success",
					  title: "La prueba ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {
								window.location = "pruebas";
								}
							})
				</script>';
			}		
		}
	}
	
}
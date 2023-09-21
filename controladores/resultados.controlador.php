<?php
class ControladorResultados{
    /* Mostrar Resultados Globales */
	static public function ctrMostrarResultados($item, $valor){
		$tabla = "resultados";
		$respuesta = ModeloResultados::mdlMostrarResultados($tabla, $item, $valor);
		return $respuesta;
	}

	/* Crear Resultados Globales */
	static public function ctrCrearResultado(){
		if(isset($_POST["nuevoPuntajePrograma"])){
			if(preg_match('/^[0-9]+$/', $_POST["nuevoPuntajePrograma"]) &&	
			    preg_match('/^[0-9.]+$/', $_POST["nuevoPuntajeReferencia"]) &&
			    preg_match('/^[0-9.]+$/', $_POST["nuevoDesviacionPrograma"]) &&
				preg_match('/^[0-9]+$/', $_POST["nuevoDesviacionReferencia"]) 	
			){
				$tabla = "resultados";
				$anno = date("Y");
				$puntajeDiferencia = $_POST["nuevoPuntajePrograma"] - $_POST["nuevoPuntajeReferencia"];
				$desviacionDiferencia = $_POST["nuevoDesviacionPrograma"] - $_POST["nuevoDesviacionReferencia"];
				$datos = array("puntaje_programa" => $_POST["nuevoPuntajePrograma"],
							   "puntaje_referencia" => $_POST["nuevoPuntajeReferencia"],
							   "puntaje_diferencia" => $puntajeDiferencia,
							   "desviacion_programa" => $_POST["nuevoDesviacionPrograma"],
							   "desviacion_referencia" => $_POST["nuevoDesviacionReferencia"],
							   "desviacion_diferencia" => $desviacionDiferencia,
							   "anno" => $anno
						);
				$respuesta = ModeloResultados::mdlIngresarResultado($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "El resultado global ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {
									window.location = "resultados";
									}
								})
					</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡El resultado global no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							    window.location = "resultados";
							}
						})
			  	</script>';
			}
		}
	}

	/* Editar Centros regionales */

	static public function ctrEditarResultado(){
		if(isset($_POST["editarPuntajePrograma"])){
			if(preg_match('/^[0-9]+$/', $_POST["editarPuntajePrograma"]) &&	
			    preg_match('/^[0-9.]+$/', $_POST["editarPuntajeReferencia"]) &&
				preg_match('/^[0-9.]+$/', $_POST["editarDesviacionPrograma"]) &&
				preg_match('/^[0-9]+$/', $_POST["editarDesviacionReferencia"]) 	
			){
				$tabla = "resultados";
				$anno = date("Y");
				$puntajeDiferencia = $_POST["nuevoPuntajePrograma"] - $_POST["editarPuntajeDiferencia"];
				$desviacionDiferencia = $_POST["nuevoDesviacionPrograma"] - $_POST["editarDesviacionDiferencia"];
				$datos = array("puntaje_programa" => $_POST["editarPuntajePrograma"],
							   "puntaje_referencia" => $_POST["editarPuntajeReferencia"],
							   "puntaje_diferencia" => $puntajeDiferencia,
							   "desviacion_programa" => $_POST["editarDesviacionPrograma"],
							   "desviacion_referencia" => $_POST["editarDesviacionReferencia"],
							   "desviacion_diferencia" => $desviacionDiferencia,
							   "anno" => $anno
						);
				$respuesta = ModeloResultados::mdlEditarResultado($tabla, $datos);
				if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "El resultado global ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {
									    window.location = "resultados";
									}
								})
					</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡El resultado global no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							    window.location = "resultados";
							}
						})
			  	</script>';
			}
		}
	}
	/* Borrar un Resultado */

	static public function ctrEliminarResultado(){
		if(isset($_GET["idResultado"])){
			$tabla ="resultados";
			$datos = $_GET["idResultado"];
			$respuesta = ModeloResultados::mdlBorrarResultado($tabla, $datos);
			if($respuesta == "ok"){
				echo'<script>
				swal({
					  type: "success",
					  title: "El resultado ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {
									window.location = "resultados";
								}
							})
				</script>';
			}
		}
	}

	/*Grafica un resultado*/
	static public function ctrGraficaResultadosPuntaje(){
		$tabla = "resultados";
		$respuesta = ModeloResultados::mdlGraficaResultadosPuntaje($tabla);
		return $respuesta;
	}
}

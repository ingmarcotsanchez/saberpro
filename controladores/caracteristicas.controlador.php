<?php
class ControladorCaracteristicas{
    /* Mostrar Caracteristicas de aprendizaje */
	static public function ctrMostrarCaracteristicas($item, $valor, $orden){
		$tabla = "caracteristicas";
		$respuesta = ModeloCaracteristicas::mdlMostrarCaracteristicas($tabla, $item, $valor, $orden);
		return $respuesta;
	}

	static public function ctrMostrarVariasCaracteristicas($item, $valor, $orden){
		$tabla = "caracteristicas";
		$respuesta = ModeloCaracteristicas::mdlMostrarVariasCaracteristicas($tabla, $item, $valor, $orden);
		return $respuesta;
	}

	/* Crear Caracteristicas de aprendizaje */
	static public function ctrCrearCaracteristica(){
		if(isset($_POST["nuevoPuntajeInicial"])){
			if(preg_match('/^[0-9]+$/', $_POST["nuevoPuntajeInicial"]) &&	
                preg_match('/^[0-9]+$/', $_POST["nuevoPuntajeFinal"]) &&	
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNivel"]) 
                //preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCaracteristica"])
                ){
				$tabla = "caracteristicas";
				$datos = array("id_prueba" => $_POST["nuevoPrueba"],
							   "puntaje_inicial" => $_POST["nuevoPuntajeInicial"],
							   "puntaje_final" => $_POST["nuevoPuntajeFinal"],
							   "nivel" => $_POST["nuevoNivel"],
							   "caracteristica" => $_POST["nuevaCaracteristica"]);
				$respuesta = ModeloCaracteristicas::mdlIngresarCaracteristica($tabla, $datos);
				
				if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "Las caracteristicas de aprendizaje han sido guardadas correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {
									window.location = "caracteristicas";
									}
								})
					</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡Las caracteristicas de aprendizaje no pueden ir vacías o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							    window.location = "caracteristicas";
							}
						})
			  	</script>';
			}
		}
	}

	/* Editar Caracteristicas de aprendizaje */

	static public function ctrEditarCaracteristica(){
        if(isset($_POST["editarPuntajeInicial"])){
			if(preg_match('/^[0-9]+$/', $_POST["editarPuntajeInicial"]) &&	
                preg_match('/^[0-9]+$/', $_POST["editarPuntajeFinal"]) &&	
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNivel"]) 
                ){
				$tabla = "caracteristicas";
				$datos = array("puntaje_inicial"=>$_POST["editarPuntajeInicial"],
								"puntaje_final"=>$_POST["editarPuntajeFinal"],
								"nivel"=>$_POST["editarNivel"],
								"caracteristica"=>$_POST["editarCaracteristica"],
							   "id"=>$_POST["idCaracteristica"]);
				//vardump($datos);
				$respuesta = ModeloCaracteristicas::mdlEditarCaracteristica($tabla, $datos);
				//vardump($respuesta);
				if($respuesta == "ok"){
					echo'<script>
					    swal({
						    type: "success",
                            title: "La caracteristicas de aprendizaje ha sido cambiada correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                if (result.value) {
                                    window.location = "caracteristicas";
                                }
                            })
					</script>';
				}
			}else{
				echo'<script>
					swal({
                        type: "error",
                        title: "¡Las caracteristicas de aprendizaje no puede ir vacía o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                        if (result.value) {
                            window.location = "caracteristicas";
                        }
					})
			  	</script>';
			}
		}
	}
	/* Borrar Caracteristicas de aprendizaje */
	static public function ctrBorrarCaracteristica(){
		if(isset($_GET["idCaracteristica"])){
			$tabla ="Caracteristicas";
			$datos = $_GET["idCaracteristica"];
			$respuesta = ModeloCaracteristicas::mdlBorrarCaracteristica($tabla, $datos);
            if($respuesta == "ok"){
                echo'<script>
                    swal({
                        type: "success",
                        title: "La caracteristica de aprendizaje ha sido borrada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                                if (result.value) {
                                    window.location = "caracteristicas";
                                }
                            })
                </script>';
            }
		}
	}
	
}

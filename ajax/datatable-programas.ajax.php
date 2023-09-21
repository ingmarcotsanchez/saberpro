<?php

require_once "../controladores/programas.controlador.php";
require_once "../modelos/programas.modelo.php";

require_once "../controladores/centros.controlador.php";
require_once "../modelos/centros.modelo.php";


class TablaProgramas{
 	/* Mostrar tabla de programas */ 
	public function mostrarTablaProgramas(){
		$item = null;
    	$valor = null;
    	$orden = "id";
  		$programas = ControladorProgramas::ctrMostrarProgramas($item, $valor, $orden);	
  		if(count($programas) == 0){
  			echo '{"data": []}';
		  	return;
  		}
  		$datosJson = '{
		  	"data": [';
			for($i = 0; $i < count($programas); $i++){
		  		$item = "id";
		  		$valor = $programas[$i]["id_centro"];
		  		$centros = ControladorCentros::ctrMostrarCentros($item, $valor);
				if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Lider"){
					$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarPrograma' idPrograma='".$programas[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPrograma'><i class='fa fa-pencil'></i></button></div>"; 
				}else{
					$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarPrograma' idPrograma='".$programas[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPrograma'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarPrograma' idPrograma='".$programas[$i]["id"]."' codigo='".$programas[$i]["codigo"]."'><i class='fa fa-times'></i></button></div>"; 
				}
		  		$datosJson .='[
			    	"'.($i+1).'",
					"'.$programas[$i]["codigo"].'",
					"'.$programas[$i]["descripcion"].'",
					"'.$centros["centro"].'",
					"'.$programas[$i]["fecha"].'",
					"'.$botones.'"
			    ],';
		  	}
		  	$datosJson = substr($datosJson, 0, -1);
		 	$datosJson .=   '] 
		}';
		echo $datosJson;
	}
}

/* Activar la tabla de programas */ 
$activarProgramas = new TablaProgramas();
$activarProgramas -> mostrarTablaProgramas();


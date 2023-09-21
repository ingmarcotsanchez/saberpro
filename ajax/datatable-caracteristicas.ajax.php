<?php
require_once "../controladores/pruebas.controlador.php";
require_once "../modelos/pruebas.modelo.php";
require_once "../controladores/caracteristicas.controlador.php";
require_once "../modelos/caracteristicas.modelo.php";
require_once "../modelos/funciones.php";
error_reporting(E_ERROR | E_PARSE);

class TablaCaracteristicas{
 	/* Mostrar tabla de caracteristicas */ 
	public function mostrarTablaCaracteristicas(){
		$item = null;
    	$valor = null;
    	$orden = "id";
  		$caracteristicas = ControladorCaracteristicas::ctrMostrarCaracteristicas($item, $valor, $orden);	
  		if(count($caracteristicas) == 0){
  			echo '{"data": []}';
		  	return;
  		}
  		$datosJson = '{
		  	"data": [';
			for($i = 0; $i < count($caracteristicas); $i++){
		  		$item = "id";
				  $valor = $caracteristicas[$i]["id_modulo"];
		  		//$valor = $caracteristicas[$i]["puntaje_inicial"];
				$orden = "id";
		  		$modulos = ControladorPruebas::ctrMostrarPruebas($item, $valor, $orden);
				if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Lider"){
					$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarCaracteristica' idCaracteristica='".$caracteristicas[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCaracteristica'><i class='fa fa-pencil'></i></button></div>"; 
				}else{
					$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarCaracteristica' idCaracteristica='".$caracteristicas[$i]["id"]."' data-toggle='modal' data-target='#modalEditarCaracteristica'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarCaracteristica' idCaracteristica='".$caracteristicas[$i]["id"]."' puntaje_final='".$caracteristicas[$i]["puntaje_final"]."'><i class='fa fa-times'></i></button></div>"; 
				}
				//"'.$caracteristicas[$i]["caracteristica"].'",
				//if(($i+1) == 3) continue;
				$texto = preg_replace('([^A-Za-z0-9 ])', '', Funciones::eliminar_acentos(strip_tags($caracteristicas[$i]["caracteristica"])));
				//$texto = str_replace(":", "", $caracteristicas[$i]["caracteristica"]);
				$datosJson .='[
			    	"'.($i+1).'",
					"'.utf8_encode($modulos["descripcion"]).'",
					"'.$caracteristicas[$i]["puntaje_inicial"].'",
					"'.$caracteristicas[$i]["puntaje_final"].'",
					"'.$caracteristicas[$i]["nivel"].'",
					"'.utf8_encode(utf8_encode(Funciones::eliminar_acentos($texto))).'",
					"'.$caracteristicas[$i]["fecha"].'",
					"'.$botones.'"
			    ],';
				
		  	}
		  	$datosJson = substr($datosJson, 0, -1);
		 	$datosJson .=   '] 
		}';
		echo $datosJson;
	}
}

/* Activar la tabla de caracteristicas */ 
$activarCaracteristicas = new TablaCaracteristicas();
$activarCaracteristicas -> mostrarTablaCaracteristicas();


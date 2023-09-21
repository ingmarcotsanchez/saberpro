<?php
require_once "../controladores/subcomponentes.controlador.php";
require_once "../modelos/subcomponentes.modelo.php";
require_once "../controladores/mejoras.controlador.php";
require_once "../modelos/mejoras.modelo.php";

class TablaMejoras{
 	/* Mostrar tabla de mejoras */ 
	public function mostrarTablaMejoras(){
		$item = null;
    	$valor = null;
    	$orden = "id";
  		$mejoras = ControladorMejoras::ctrMostrarMejoras($item, $valor, $orden);	
  		if(count($mejoras) == 0){
  			echo '{"data": []}';
		  	return;
  		}
  		$datosJson = '{
		  	"data": [';
			for($i = 0; $i < count($mejoras); $i++){
		  		$item = "id";
				$valor = $mejoras[$i]["id_subcomponente"];
		  		
				$orden = "id";
		  		$subcompetencias = ControladorSubcomponentes::ctrMostrarSubcomponentes($item, $valor, $orden);
				//var_dump($subcompetencias);
				if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Lider"){
					$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarMejora' idMejora='".$mejoras[$i]["id"]."' data-toggle='modal' data-target='#modalEditarMejora'><i class='fa fa-pencil'></i></button></div>"; 
				}else{
					$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarMejora' idMejora='".$mejoras[$i]["id"]."' data-toggle='modal' data-target='#modalEditarMejora'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarMejora' idMejora='".$mejoras[$i]["id"]."'><i class='fa fa-times'></i></button></div>"; 
				}
		  		$datosJson .='[
			    	"'.($i+1).'",
					"'.$subcompetencias["descripcion"].'",
					"'.$mejoras[$i]["que"].'",
					"'.$mejoras[$i]["como"].'",
					"'.$mejoras[$i]["cuando"].'",
					"'.$mejoras[$i]["quien"].'",
					"'.$mejoras[$i]["fecha"].'",
					"'.$botones.'"
			    ],';
		  	}
		  	$datosJson = substr($datosJson, 0, -1);
		 	$datosJson .=   '] 
		}';
		echo $datosJson;
	}
}

/* Activar la tabla de mejoras */ 
$activarmejoras = new TablaMejoras();
$activarmejoras -> mostrarTablaMejoras();


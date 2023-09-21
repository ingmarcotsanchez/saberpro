<?php
require_once "../controladores/subcomponentes.controlador.php";
require_once "../modelos/subcomponentes.modelo.php";
require_once "../controladores/modulos.controlador.php";
require_once "../modelos/modulos.modelo.php";
error_reporting(E_ERROR | E_PARSE);
session_start();
class TablaSubComponentes{
 	/*Muestra la tabla de subcomponentes*/ 
	public function mostrarTablaSubComponentes(){
		$item = null;
    	$valor = null;
    	$orden = "id";
  		$subcomponentes = ControladorSubComponentes::ctrMostrarSubComponentes($item, $valor, $orden);
		if(count($subcomponentes) == 0){
  			echo '{"data": []}';
		  	return;
  		}
		
  		$datosJson = '{
			"data": [';
		  		for($i = 0; $i < count($subcomponentes); $i++){
					$item = "id";
					$valor = $subcomponentes[$i]["id_modulo"];
					$orden="id";
					$modulos = ControladorModulos::ctrMostrarModulos($item, $valor, $orden);
					//$descripcion = (isset($modulos["descripcion"])) ? $modulos["descripcion"] : "No datos";
					//var_dump($modulos["descripcion"]);
					if($subcomponentes[$i]["puntaje"] < 20 ){
						$puntaje = "<button class='btn btn-success'>".
									$subcomponentes[$i]["puntaje"].
									"</button>";
					}else if($subcomponentes[$i]["puntaje"] >= 20 && $subcomponentes[$i]["puntaje"] < 40){
						$puntaje = "<button class='btn btn-warning'>".$subcomponentes[$i]["puntaje"]."</button>";
					}else if($subcomponentes[$i]["puntaje"] >= 40 && $subcomponentes[$i]["puntaje"] < 70){
						$puntaje = "<button class='btn btn-info'>".$subcomponentes[$i]["puntaje"]."</button>";
					}
					else{
						$puntaje = "<button class='btn btn-danger'>".$subcomponentes[$i]["puntaje"]."</button>";
					}
					if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Lider"){
						$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarSubcomponente' idSubcomponente='".$subcomponentes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarSubcomponente'><i class='fa fa-pencil'></i></button></div>"; 
					}else{
						$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarSubcomponente' idSubcomponente='".$subcomponentes[$i]["id"]."' data-toggle='modal' data-target='#modalEditarSubcomponente'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarSubcomponente' idSubcomponente='".$subcomponentes[$i]["id"]."' codigo='".$subcomponentes[$i]["codigo"]."'><i class='fa fa-times'></i></button></div>"; 
					}
					
			
		  		$datosJson .='[
			      "'.($i+1).'",
			      "'.$subcomponentes[$i]["codigo"].'",
			      "'.$subcomponentes[$i]["descripcion"].'",
			      "'.$modulos["codigo"].'",
				  "'.$puntaje.'",
			      "'.$subcomponentes[$i]["fecha"].'",
			      "'.$botones.'"
			    ],';
				
			}
			$datosJson = substr($datosJson, 0, -1);
				$datosJson .=   '] 
			
		}';
		echo $datosJson;
	}
}

/*Activar tabla de modulos*/ 
$activarSubComponentes= new TablaSubComponentes();
$activarSubComponentes -> mostrarTablaSubComponentes();


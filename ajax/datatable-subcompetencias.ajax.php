<?php
require_once "../controladores/subcompetencias.controlador.php";
require_once "../modelos/subcompetencias.modelo.php";
require_once "../controladores/pruebas.controlador.php";
require_once "../modelos/pruebas.modelo.php";
require_once "../modelos/funciones.php";
error_reporting(E_ERROR | E_PARSE);
session_start();
class TablaSubcompetencias{
 	/*Muestra la tabla de subcompetencias*/ 
	public function mostrarTablaSubcompetencias(){
		$item = null;
		$valor = null;
		$orden = "id";
		$subcompetencias = ControladorSubcompetencias::ctrMostrarSubcompetencias($item, $valor, $orden);	
		
		if(count($subcompetencias) == 0){
			echo '{"data": []}';
			return;
		}
		$datosJson = '{
			"data": [';
			for($i = 0; $i < count($subcompetencias); $i++){
				$item = "id";
				$valor = $subcompetencias[$i]["id_prueba"];
				$orden = null;
				$pruebas = ControladorPruebas::ctrMostrarPruebas($item, $valor, $orden);
				if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Administrador"){
					$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarModulo' idModulo='".$subcompetencias[$i]["id"]."' data-toggle='modal' data-target='#modalEditarSubcompetencia'><i class='fa fa-pencil'></i></button></div>"; 
				}else{
					$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarModulo' idModulo='".$subcompetencias[$i]["id"]."' data-toggle='modal' data-target='#modalEditarSubcompetencia'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarSubcompetencia' idSubcompetencia='".$subcompetencias[$i]["id"]."' codigo='".$subcompetencias[$i]["codigo"]."'><i class='fa fa-times'></i></button></div>"; 
				}
				$datosJson .='[
					"'.($i+1).'",
					"'.$subcompetencias[$i]["codigo"].'",
					"'.Funciones::eliminar_acentos($subcompetencias[$i]["descripcion"]).'",
					"'.Funciones::eliminar_acentos($pruebas["descripcion"]).'",
					"'.$botones.'"
				],';
			}
			$datosJson = substr($datosJson, 0, -1);
			$datosJson .=   '] 
			}';
			echo $datosJson;
			
	}
	
}

/*Activar tabla de pruebas*/ 
$activarSubcompetencias = new TablaSubcompetencias();
$activarSubcompetencias -> mostrarTablaSubcompetencias();


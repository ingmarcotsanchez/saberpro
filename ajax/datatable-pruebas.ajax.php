<?php
require_once "../controladores/pruebas.controlador.php";
require_once "../modelos/pruebas.modelo.php";
require_once "../controladores/competencias.controlador.php";
require_once "../modelos/competencias.modelo.php";
require_once "../modelos/funciones.php";
error_reporting(E_ERROR | E_PARSE);
session_start();
class TablaPruebas{
 	/*Muestra la tabla de pruebas*/ 
	public function mostrarTablaPruebas(){
		$item = null;
		$valor = null;
		$orden = "id";
		$pruebas = ControladorPruebas::ctrMostrarPruebas($item, $valor, $orden);	
		
		if(count($pruebas) == 0){
			echo '{"data": []}';
			return;
		}
		$datosJson = '{
			"data": [';
			for($i = 0; $i < count($pruebas); $i++){
				$item = "id";
				$valor = $pruebas[$i]["id_competencia"];
				$orden = "id";
				$competencias = ControladorCompetencias::ctrMostrarCompetencias($item, $valor);
				if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Administrador"){
					$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarModulo' idModulo='".$pruebas[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPrueba'><i class='fa fa-pencil'></i></button></div>"; 
				}else{
					$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarModulo' idModulo='".$pruebas[$i]["id"]."' data-toggle='modal' data-target='#modalEditarPrueba'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarPrueba' idPrueba='".$pruebas[$i]["id"]."' codigo='".$pruebas[$i]["codigo"]."'><i class='fa fa-times'></i></button></div>"; 
				}
				$datosJson .='[
					"'.($i+1).'",
					"'.$pruebas[$i]["codigo"].'",
					"'.Funciones::eliminar_acentos($pruebas[$i]["descripcion"]).'",
					"'.Funciones::eliminar_acentos($competencias["competencia"]).'",
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
$activarPruebas = new TablaPruebas();
$activarPruebas -> mostrarTablaPruebas();


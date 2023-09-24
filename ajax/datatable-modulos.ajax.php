<?php
require_once "../controladores/modulos.controlador.php";
require_once "../modelos/modulos.modelo.php";
require_once "../controladores/pruebas.controlador.php";
require_once "../modelos/pruebas.modelo.php";
require_once "../controladores/competencias.controlador.php";
require_once "../modelos/competencias.modelo.php";
require_once "../controladores/programas.controlador.php";
require_once "../modelos/programas.modelo.php";
require_once "../controladores/caracteristicas.controlador.php";
require_once "../modelos/caracteristicas.modelo.php";
require_once "../modelos/funciones.php";
error_reporting(E_ERROR | E_PARSE);
session_start();
class TablaModulos{
 	/*Muestra la tabla de modulos*/ 
	public function mostrarTablaModulos(){
		$item = null;
		$valor = null;
		$orden = "id";
		$modulos = ControladorModulos::ctrMostrarModulos($item, $valor, $orden);
		$caracteristicas = ControladorCaracteristicas::ctrMostrarCaracteristicas($item, $valor, $orden);
		$programas = ControladorProgramas::ctrMostrarProgramas($item, $valor,$orden);	
		
		if(count($modulos) == 0){
			echo '{"data": []}';
			return;
		}
		$datosJson = '{
			"data": [';
			for($i = 0; $i < count($modulos); $i++){
				$item = "id";
				$valor = $modulos[$i]["id_competencia"];

				
				$orden = "id";
				$competencias = ControladorCompetencias::ctrMostrarCompetencias($item, $valor);
				$programas = ControladorProgramas::ctrMostrarProgramas($item, $modulos[$i]["id_programa"],$orden);
				if($modulos[$i]["puntaje"] <= 125){
				$puntaje = "<button type='button' class='btn btn-danger open_modal' data-toggle='modal' data-target='ModalModule{$modulos[$i]["id"]}'>".
								$modulos[$i]["puntaje"].
							"</button>";
				}else if($modulos[$i]["puntaje"] >= 126 && $modulos[$i]["puntaje"] <= 155){
				$puntaje = "<button type='button' class='btn btn-warning open_modal' data-toggle='modal' data-target='ModalModule{$modulos[$i]["id"]}'>".
							$modulos[$i]["puntaje"].
							"</button>";
				}else if($modulos[$i]["puntaje"] >= 156 && $modulos[$i]["puntaje"] <= 200){
				$puntaje = "<button type='button' class='btn btn-info open_modal' data-toggle='modal' data-target='ModalModule{$modulos[$i]["id"]}'>".
							$modulos[$i]["puntaje"].
							"</button>";
				}
				else{
				$puntaje = "<button type='button' class='btn btn-success open_modal' data-toggle='modal' data-target='ModalModule{$modulos[$i]["id"]}'>".
							$modulos[$i]["puntaje"].
							"</button>";
				}
				$puntaje.="<div class='modal fade' id='ModalModule{$modulos[$i]["id"]}' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'>".
					"<div class='modal-dialog' role='document'>".
						"<div class='modal-content'>".
							"<div class='modal-header'>".
								"<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>".
								"<h4 class='modal-title' id='exampleModalLabel'>".
									$modulos[$i]["descripcion"].
								"</h4>".
							"</div>".
							"<div class='modal-body'>";
							$item = "id_prueba";
							$valor = $modulos[$i]["id"];
							$caracteristicas = ControladorCaracteristicas::ctrMostrarVariasCaracteristicas($item, $valor, $orden);
							for($j = 0; $j < count($caracteristicas); $j++){
								$texto = preg_replace('([^A-Za-z0-9 ])', '', Funciones::eliminar_acentos(strip_tags($caracteristicas[$i]["caracteristica"])));
								//$puntaje .="<p>".$caracteristicas[$j]["caracteristica"]."</p>";
								$puntaje .="<p>".utf8_encode(utf8_encode(Funciones::eliminar_acentos($texto)))."</p>";

							}
							$puntaje .="</div>".
							"<div class='modal-footer'>".
								"<button type='button' class='btn btn-secondary' data-dismiss='modal'>".
									"Close".
								"</button>".
							"</div>".
						"</div>".
					"</div>".
				"</div>";
				if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Lider"){
					$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarModulo' idModulo='".$modulos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarModulo'><i class='fa fa-pencil'></i></button></div>"; 
				}else{
					$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarModulo' idModulo='".$modulos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarModulo'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarModulo' idModulo='".$modulos[$i]["id"]."' codigo='".$modulos[$i]["codigo"]."'><i class='fa fa-times'></i></button></div>"; 
				}
				if($modulos[$i]["puntaje"] <= 125){
					$desempeno = "<p class='nivel1' data-toggle='tooltip' data-placement='top' title='No supera las preguntas de menor complejidad de los módulos del examen'>".
					"Nivel 1".
				"</p>";
				}else if($modulos[$i]["puntaje"] >= 126 && $modulos[$i]["puntaje"] <= 155){
				$desempeno = "<p class='nivel2' data-toggle='tooltip' data-placement='top' title='Supera las preguntas de menor complejidad de cada módulo del examen'>".
				"Nivel 2".
				"</p>";
				}else if($modulos[$i]["puntaje"] >= 156 && $modulos[$i]["puntaje"] <= 200){
				$desempeno = "<p class='nivel3' data-toggle='tooltip' data-placement='top' title='Muestra un desempeño adecuado en las competencias exigibles para los módulos del examen'>".
				"Nivel 3".
				"</p>";
				}
				else{
				$desempeno = "<p class='nivel4' data-toggle='tooltip' data-placement='top' title='Muestra un desempeño sobresaliente en las competencias esperadas en cada módulo del examen'>".
				"Nivel 4".
				"</p>";
				}
				if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Lider"){
					$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarModulo' idModulo='".$modulos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarModulo'><i class='fa fa-pencil'></i></button></div>";
				}else{
					$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarModulo' idModulo='".$modulos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarModulo'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarModulo' idModulo='".$modulos[$i]["id"]."' codigo='".$modulos[$i]["codigo"]."'><i class='fa fa-times'></i></button></div>";
				}
				//"'.$desempeno.'",
				$datosJson .='[
					"'.($i+1).'",
					"'.$modulos[$i]["codigo"].'",
					"'.Funciones::eliminar_acentos($modulos[$i]["descripcion"]).'",
					"'.Funciones::eliminar_acentos($competencias["competencia"]).'",
					"'.Funciones::eliminar_acentos($programas["descripcion"]).'",
					"'.Funciones::eliminar_acentos($puntaje).'",
					"'.$modulos[$i]["desv_estand"].'",
					"'.Funciones::eliminar_acentos($desempeno).'",
					
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
$activarModulos = new TablaModulos();
$activarModulos -> mostrarTablaModulos();


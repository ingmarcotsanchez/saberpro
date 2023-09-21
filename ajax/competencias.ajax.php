<?php

require_once "../controladores/competencias.controlador.php";
require_once "../modelos/competencias.modelo.php";

class AjaxCompetencias{

	/* Editar Competencia */	
	public $idCompetencia;
	public function ajaxEditarCompetencia(){
		$item = "id";
		$valor = $this->idCompetencia;
		$respuesta = ControladorCompetencias::ctrMostrarCompetencias($item, $valor);
		echo json_encode($respuesta);
	}
}

/* Editar Competencia */	

if(isset($_POST["idCompetencia"])){

	$competencia = new AjaxCompetencias();
	$competencia -> idCompetencia = $_POST["idCompetencia"];
	$competencia -> ajaxEditarCompetencia();
}

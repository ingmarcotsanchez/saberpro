<?php

require_once "../controladores/centros.controlador.php";
require_once "../modelos/centros.modelo.php";

class AjaxCentros{

	/* Editar Centro Regional */	
	public $idCentro;
	public function ajaxEditarCentro(){
		$item = "id";
		$valor = $this->idCentro;
		$respuesta = ControladorCentros::ctrMostrarCentros($item, $valor);
		echo json_encode($respuesta);
	}
}

/* Editar Centro Regional */	

if(isset($_POST["idCentro"])){

	$centro = new AjaxCentros();
	$centro -> idCentro = $_POST["idCentro"];
	$centro -> ajaxEditarCentro();
}

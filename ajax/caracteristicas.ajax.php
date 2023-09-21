<?php
require_once "../controladores/pruebas.controlador.php";
require_once "../modelos/pruebas.modelo.php";

require_once "../controladores/caracteristicas.controlador.php";
require_once "../modelos/caracteristicas.modelo.php";

class AjaxCaracteristicas{
/* Editar */ 
	public $idCaracteristica;
	public $traerCaracteristicas;
	public $nombreCaracteristica;
	public function ajaxEditarCaracteristica(){
		if($this->traerCaracteristicas == "ok"){
			$item = null;
			$valor = null;
			$orden = "id";
			$respuesta = ControladorCaracteristicas::ctrMostrarCaracteristicas($item, $valor, $orden);
			echo json_encode($respuesta);
		}else if($this->nombreCaracteristica != ""){
			$item = "caracteristica";//descripcion
			$valor = $this->nombreCaracteristica;
			$orden = "id";
			$respuesta = ControladorCaracteristicas::ctrMostrarCaracteristicas($item, $valor, $orden);
			echo json_encode($respuesta);
		}else{
			$item = "id";
			$valor = $this->idCaracteristica;
			$orden = "id";
			$respuesta = ControladorCaracteristicas::ctrMostrarCaracteristicas($item, $valor, $orden);
			echo json_encode($respuesta);
		}
	}
}
/* Editar una caracteristica */
if(isset($_POST["idCaracteristica"])){
	$editarCaracteristica = new AjaxCaracteristicas();
	$editarCaracteristica -> idCaracteristica = $_POST["idCaracteristica"];
	$editarCaracteristica -> ajaxEditarCaracteristica();
}
/* Traer un modulo */
if(isset($_POST["traerCaracteristicas"])){
	$traerCaracteristicas = new AjaxCaracteristicas();
	$traerCaracteristicas -> traerCaracteristicas = $_POST["traerCaracteristicas"];
	$traerCaracteristicas -> ajaxEditarCaracteristica();
}
/* Traer un modulo */
if(isset($_POST["nombreCaracteristica"])){
	$traerCaracteristicas = new AjaxCaracteristicas();
	$traerCaracteristicas -> nombreCaracteristica = $_POST["nombreCaracteristica"];
	$traerCaracteristicas -> ajaxEditarCaracteristica();
}



	

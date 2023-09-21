<?php

require_once "../controladores/modulos.controlador.php";
require_once "../modelos/modulos.modelo.php";

require_once "../controladores/competencias.controlador.php";
require_once "../modelos/competencias.modelo.php";


class AjaxModulos{

  /* Asignar un código a partir de la Competencia */
  public $idCompetencia;
  public function ajaxCrearCodigoModulo(){
    $item = "id_competencia";
  	$valor = $this->idCompetencia;
    $orden = "id";
  	$respuesta = ControladorModulos::ctrMostrarModulos($item, $valor, $orden);
  	echo json_encode($respuesta);
  }

  /* Editar un modulo */ 
  public $idModulo;
  public $traerModulos;
  public $nombreModulo;
  public function ajaxEditarModulo(){
    if($this->traerModulos == "ok"){
      $item = null;
      $valor = null;
      $orden = "id";
      $respuesta = ControladorModulos::ctrMostrarModulos($item, $valor, $orden);
      echo json_encode($respuesta);
    }else if($this->nombreModulo != ""){
      $item = "descripcion";
      $valor = $this->nombreModulo;
      $orden = "id";
      $respuesta = ControladorModulos::ctrMostrarModulos($item, $valor, $orden);
      echo json_encode($respuesta);
    }else{
      $item = "id";
      $valor = $this->idModulo;
      $orden = "id";
      $respuesta = ControladorModulos::ctrMostrarModulos($item, $valor, $orden);
      echo json_encode($respuesta);
    }
  }
}
/* Asignar un código a partir de una competencia */	
if(isset($_POST["idCompetencia"])){
	$codigoModulo = new AjaxModulos();
	$codigoModulo -> idCompetencia = $_POST["idCompetencia"];
	$codigoModulo -> ajaxCrearCodigoModulo();
}

/* Editar una competencia */
if(isset($_POST["idModulo"])){
  $editarModulo = new AjaxModulos();
  $editarModulo -> idModulo = $_POST["idModulo"];
  $editarModulo -> ajaxEditarModulo();
}
/* Traer un modulo */
if(isset($_POST["traerModulos"])){
  $traerModulos = new AjaxModulos();
  $traerModulos -> traerModulos = $_POST["traerModulos"];
  $traerModulos -> ajaxEditarModulo();
}
/* Traer un modulo */
if(isset($_POST["nombreModulo"])){
  $traerModulos = new AjaxModulos();
  $traerModulos -> nombreModulo = $_POST["nombreModulo"];
  $traerModulos -> ajaxEditarModulo();
}







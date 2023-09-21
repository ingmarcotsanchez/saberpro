<?php

require_once "../controladores/subcomponentes.controlador.php";
require_once "../modelos/subcomponentes.modelo.php";

require_once "../controladores/competencias.controlador.php";
require_once "../modelos/competencias.modelo.php";


class AjaxSubComponentes{

  /* Asignar un código a partir de la Componente */
  public $idModulo;
  public function ajaxCrearCodigoSubComponente(){
    $item = "id_modulo";
  	$valor = $this->idModulo;
    $orden = "id";
  	$respuesta = ControladorSubComponentes::ctrMostrarSubComponentes($item, $valor, $orden);
  	echo json_encode($respuesta);
  }

  /* Editar una subcomponente */ 
  public $idSubcomponente;
  public $traerSubcomponentes;
  public $nombreSubcomponente;
  public function ajaxEditarSubComponente(){
    if($this->traerSubcomponentes == "ok"){
      $item = null;
      $valor = null;
      $orden = "id";
      $respuesta = ControladorSubComponentes::ctrMostrarSubComponentes($item, $valor, $orden);
      echo json_encode($respuesta);
    }else if($this->nombreSubcomponente != ""){
      $item = "descripcion";
      $valor = $this->nombreSubcomponente;
      $orden = "id";
      $respuesta = ControladorSubComponentes::ctrMostrarSubComponentes($item, $valor, $orden);
      echo json_encode($respuesta);
    }else if($this->idSubcomponente != ""){
      $item = "id";
      $valor = $this->idSubcomponente;
      $orden = "id";
      $respuesta = ControladorSubComponentes::ctrMostrarSubComponentes($item, $valor, $orden);
      echo json_encode($respuesta);
    }
    else{
      $item = "id";
      $valor = $this->idModulo;
      $orden = "id";
      $respuesta = ControladorSubComponentes::ctrMostrarSubComponentes($item, $valor, $orden);
      echo json_encode($respuesta);
    }
  }
}
/* Asignar un código a partir de un modulo */	
if(isset($_POST["idModulo"])){
	$codigoSubcomponente = new AjaxSubComponentes();
	$codigoSubcomponente -> idModulo = $_POST["idModulo"];
	$codigoSubcomponente -> ajaxCrearCodigoSubComponente();
}

/* Editar una subcomponente */
if(isset($_POST["idSubcomponente"])){
  $editarSubcomponentes = new AjaxSubComponentes();
  $editarSubcomponentes -> idSubcomponente = $_POST["idSubcomponente"];
  $editarSubcomponentes -> ajaxEditarSubComponente();
}
/* Traer un subcomponente */
if(isset($_POST["traerSubcomponente"])){
  $traerSubcomponentes = new AjaxSubComponentes();
  $traerSubcomponentes -> traerSubcomponentes = $_POST["traerSubcomponentes"];
  $traerSubcomponentes -> ajaxEditarSubComponente();
}
/* Traer un subcomponente */
if(isset($_POST["nombreSubcomponente"])){
  $traerSubcomponentes = new AjaxSubComponentes();
  $traerSubcomponentes -> nombreSubcomponente = $_POST["nombreSubcomponente"];
  $traerSubcomponentes -> ajaxEditarSubComponente();
}
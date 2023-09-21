<?php

require_once "../controladores/pruebas.controlador.php";
require_once "../modelos/pruebas.modelo.php";

require_once "../controladores/competencias.controlador.php";
require_once "../modelos/competencias.modelo.php";


class AjaxPruebas{

  /* Asignar un código a partir de la Competencia */
  public $idCompetencia;
  public function ajaxCrearCodigoPrueba(){
    $item = "id_competencia";
  	$valor = $this->idCompetencia;
    $orden = "id";
  	$respuesta = ControladorPruebas::ctrMostrarPruebas($item, $valor, $orden);
  	echo json_encode($respuesta);
  }

  /* Editar un prueba */ 
  public $idPrueba;
  public $traerPruebas;
  public $nombrePrueba;
  public $idnuevocompetencia;
  public function ajaxEditarPrueba(){
    if($this->traerPruebas == "ok"){
      $item = null;
      $valor = null;
      $orden = "id";
      $respuesta = ControladorPruebas::ctrMostrarPruebas($item, $valor, $orden);
      echo json_encode($respuesta);
    }else if($this->nombrePrueba != ""){
      $item = "descripcion";
      $valor = $this->nombrePrueba;
      $orden = "id";
      $respuesta = ControladorPruebas::ctrMostrarPruebas($item, $valor, $orden);
      echo json_encode($respuesta);
    }else if($this->idnuevocompetencia != ""){
      $item = "id_competencia";
      $valor = $this->idnuevocompetencia;
      $orden = "id";
      $respuesta = ControladorPruebas::ctrFiltrarPruebas($item, $valor, $orden);
      $html = "";
      foreach($respuesta as $a){
        $html.="<option value='{$a["id"]}'>".$a["descripcion"]."</option>";
        
      }
      echo json_encode($html);
    }
    else{
      $item = "id";
      $valor = $this->idPrueba;
      $orden = "id";
      $respuesta = ControladorPruebas::ctrMostrarPruebas($item, $valor, $orden);
      echo json_encode($respuesta);
    }
  }
}
/* Asignar un código a partir de una competencia */	
if(isset($_POST["idCompetencia"])){
	$codigoPrueba = new AjaxPruebas();
	$codigoPrueba -> idCompetencia = $_POST["idCompetencia"];
	$codigoPrueba -> ajaxCrearCodigoPrueba();
}

/* Editar una competencia */
if(isset($_POST["idPrueba"])){
  $editarPrueba = new AjaxPruebas();
  $editarPrueba -> idPrueba = $_POST["idPrueba"];
  $editarPrueba -> ajaxEditarPrueba();
}
/* Traer un modulo */
if(isset($_POST["traerPruebas"])){
  $traerPruebas = new AjaxPruebas();
  $traerPruebas -> traerPruebas = $_POST["traerPruebas"];
  $traerPruebas -> ajaxEditarPrueba();
}
/* Traer un modulo */
if(isset($_POST["nombrePrueba"])){
  $traerPruebas = new AjaxPruebas();
  $traerPruebas -> nombrePrueba = $_POST["nombrePrueba"];
  $traerPruebas -> ajaxEditarPrueba();
}

if(isset($_POST["idnuevocompetencia"])){
  $traerPruebas = new AjaxPruebas();
  $traerPruebas -> idnuevocompetencia = $_POST["idnuevocompetencia"];
  $traerPruebas -> ajaxEditarPrueba();
}






<?php

require_once "../controladores/subcompetencias.controlador.php";
require_once "../modelos/subcompetencias.modelo.php";

require_once "../controladores/pruebas.controlador.php";
require_once "../modelos/pruebas.modelo.php";


class AjaxSubcompetencias{

  /* Asignar un código a partir de la Prueba */
  public $idPrueba;
  public function ajaxCrearCodigoSubcompetencia(){
    $item = "id_prueba";
  	$valor = $this->idPrueba;
    $orden = "id";
  	$respuesta = ControladorSubcompetencias::ctrMostrarSubcompetencias($item, $valor, $orden);
  	echo json_encode($respuesta);
  }

  /* Editar un subcompetencia */ 
  public $idSubcompetencia;
  public $traerSubcompetencias;
  public $nombreSubcompetencia;
  public $idnuevoprueba;
  public function ajaxEditarSubcompetencia(){
    if($this->traerSubcompetencias == "ok"){
      $item = null;
      $valor = null;
      $orden = "id";
      $respuesta = ControladorSubcompetencias::ctrMostrarSubcompetencias($item, $valor, $orden);
      echo json_encode($respuesta);
    }else if($this->nombreSubcompetencia != ""){
      $item = "descripcion";
      $valor = $this->nombreSubcompetencia;
      $orden = "id";
      $respuesta = ControladorCompetencias::ctrMostrarCompetencias($item, $valor, $orden);
      echo json_encode($respuesta);
    }else if($this->idnuevoprueba != ""){
      $item = "id_prueba";
      $valor = $this->idnuevoprueba;
      $orden = "id";
      $respuesta = ControladorSubcompetencias::ctrFiltrarSubcompetencias($item, $valor, $orden);
      $html = "";
      foreach($respuesta as $a){
        $html.="<option value='{$a["id"]}'>".$a["descripcion"]."</option>";
        
      }
      echo json_encode($html);
    }
    else{
      $item = "id";
      $valor = $this->idSubcompetencia;
      $orden = "id";
      $respuesta = ControladorSubcompetencias::ctrMostrarSubcompetencias($item, $valor, $orden);
      echo json_encode($respuesta);
    }
  }
}
/* Asignar un código a partir de una prueba */	
if(isset($_POST["idPrueba"])){
	$codigoSubcompetencia = new AjaxSubcompetencias();
	$codigoSubcompetencia -> idPrueba = $_POST["idPrueba"];
	$codigoSubcompetencia -> ajaxCrearCodigoSubcompetencia();
}

/* Editar una prueba */
if(isset($_POST["idSubcompetencia"])){
  $editarSubcompetencia = new AjaxSubcompetencias();
  $editarSubcompetencia -> idSubcompetencia = $_POST["idSubcompetencia"];
  $editarSubcompetencia -> ajaxEditarSubcompetencia();
}
/* Traer un modulo */
if(isset($_POST["traerSubcompetencias"])){
  $traerSubcompetencias = new AjaxSubcompetencias();
  $traerSubcompetencias -> traerSubcompetencias = $_POST["traerSubcompetencias"];
  $traerSubcompetencias -> ajaxEditarSubcompetencia();
}
/* Traer un modulo */
if(isset($_POST["nombreSubcompetencia"])){
  $traerSubcompetencias = new AjaxSubcompetencias();
  $traerSubcompetencias -> nombreSubcompetencia = $_POST["nombreSubcompetencia"];
  $traerSubcompetencias -> ajaxEditarSubcompetencia();
}

if(isset($_POST["idnuevoprueba"])){
  $traerSubcompetencias = new AjaxSubcompetencias();
  $traerSubcompetencias -> idnuevoprueba = $_POST["idnuevoprueba"];
  $traerSubcompetencias -> ajaxEditarSubcompetencia();
}






<?php

require_once "../controladores/programas.controlador.php";
require_once "../modelos/programas.modelo.php";

require_once "../controladores/centros.controlador.php";
require_once "../modelos/centros.modelo.php";

class AjaxProgramas{

  /* Asignar un código a partir del Centro Regional */
  public $idCentro;
  public function ajaxCrearCodigoPrograma(){
    $item = "id_centro";
  	$valor = $this->idCentro;
    $orden = "id";
  	$respuesta = ControladorProgramas::ctrMostrarProgramas($item, $valor, $orden);
  	echo json_encode($respuesta);
  }
  /* Editar un programa */ 
  public $idPrograma;
  public $traerProgramas;
  public $nombrePrograma;
  public $idnuevocentro;
  public function ajaxEditarPrograma(){
    if($this->traerProgramas == "ok"){
      $item = null;
      $valor = null;
      $orden = "id";
      $respuesta = ControladorProgramas::ctrMostrarProgramas($item, $valor, $orden);
      echo json_encode($respuesta);
    }else if($this->nombrePrograma != ""){
      $item = "descripcion";
      $valor = $this->nombrePrograma;
      $orden = "id";
      $respuesta = ControladorProgramas::ctrMostrarProgramas($item, $valor, $orden);
      echo json_encode($respuesta);
    }else if($this->idnuevocentro != ""){
      $item = "id_centro";
      $valor = $this->idnuevocentro;
      $orden = "id";
      $respuesta = ControladorProgramas::ctrFiltrarProgramas($item, $valor, $orden);
      $html = "";
      foreach($respuesta as $a){
        $html.="<option value='{$a["id"]}'>".$a["descripcion"]."</option>";
        
      }
      echo json_encode($html);
    }
    else{
      $item = "id";
      $valor = $this->idPrograma;
      $orden = "id";
      $respuesta = ControladorProgramas::ctrMostrarProgramas($item, $valor, $orden);
      echo json_encode($respuesta);
    }
  }
}
/* Asignar un código a partir de un centro regional */	
if(isset($_POST["idCentro"])){
	$codigoPrograma = new AjaxProgramas();
	$codigoPrograma -> idCentro = $_POST["idCentro"];
	$codigoPrograma -> ajaxCrearCodigoPrograma();
}
/* Editar un centro */
if(isset($_POST["idPrograma"])){
  $editarPrograma = new AjaxProgramas();
  $editarPrograma -> idPrograma = $_POST["idPrograma"];
  $editarPrograma -> ajaxEditarPrograma();
}
/* Traer un programa */
if(isset($_POST["traerProgramas"])){
  $traerProgramas = new AjaxProgramas();
  $traerProgramas -> traerProgramas = $_POST["traerProgramas"];
  $traerProgramas -> ajaxEditarPrograma();
}
/* Traer un programa */
if(isset($_POST["nombrePrograma"])){
  $traerProgramas = new AjaxProgramas();
  $traerProgramas -> nombrePrograma = $_POST["nombrePrograma"];
  $traerProgramas -> ajaxEditarPrograma();
}

if(isset($_POST["idnuevocentro"])){
  $traerProgramas = new AjaxProgramas();
  $traerProgramas -> idnuevocentro = $_POST["idnuevocentro"];
  $traerProgramas -> ajaxEditarPrograma();
}







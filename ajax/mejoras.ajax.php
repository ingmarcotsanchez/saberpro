<?php

require_once "../controladores/mejoras.controlador.php";
require_once "../modelos/mejoras.modelo.php";

require_once "../controladores/subcompetencias.controlador.php";
require_once "../modelos/subcompetencias.modelo.php";

class AjaxMejoras{
  /* Editar  */	
	public $idMejora;
  public $traerMejoras;
  public $nombreMejora;
  public function ajaxEditarMejora(){
    if($this->traerMejoras == "ok"){
      $item = null;
      $valor = null;
      $orden = "id";
      $respuesta = ControladorMejoras::ctrMostrarMejoras($item, $valor, $orden);
      echo json_encode($respuesta);
    }else if($this->nombreMejora != ""){
      $item = "descripcion";
      $valor = $this->nombreMejora;
      $orden = "id";
      $respuesta = ControladorMejoras::ctrMostrarMejoras($item, $valor, $orden);
      echo json_encode($respuesta);
    }else if($this->idMejora != ""){
      $item = "id";
      $valor = $this->idMejora;
      $orden = "id";
      $respuesta = ControladorMejoras::ctrMostrarMejoras($item, $valor, $orden);
      echo json_encode($respuesta);
    }else{
      $item = "id";
      $valor = $this->idSubcompetencia;
      $orden = "id";
      $respuesta = ControladorMejoras::ctrMostrarMejoras($item, $valor, $orden);
      echo json_encode($respuesta);
    }
  }
}

/* Editar una mejora */
if(isset($_POST["idMejora"])){
  $editarMejora = new AjaxMejoras();
  $editarMejora -> idMejora = $_POST["idMejora"];
  $editarMejora -> ajaxEditarMejora();
}
 //Traer un programa 
if(isset($_POST["traerMejora"])){
  $traerMejoras = new AjaxProgramas();
  $traerMejoras -> traerMejoras = $_POST["traerMejoras"];
  $traerMejoras -> ajaxEditarMejora();
}
// Traer un programa 
if(isset($_POST["nombreMejora"])){
  $traerMejoras = new AjaxProgramas();
  $traerMejoras -> nombreMejora = $_POST["nombreMejora"];
  $traerMejoras -> ajaxEditarMejora();
}







<?php

require_once "../controladores/resultados.controlador.php";
require_once "../modelos/resultados.modelo.php";

class AjaxResultados{

  /* Editar un Resultado Global */ 
    public $idResultado;
    public function ajaxEditarResultado(){
        $item = "id";
        $valor = $this->idResultado;
        $respuesta = ControladorResultados::ctrMostrarResultados($item, $valor);
        echo json_encode($respuesta);
    }
}
/* Editar un Resultado Global */
if(isset($_POST["idResultado"])){
  $editarResultado = new AjaxResultados();
  $editarResultado -> idResultado = $_POST["idResultado"];
  $editarResultado -> ajaxEditarResultado();
}









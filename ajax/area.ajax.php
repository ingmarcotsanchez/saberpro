<?php

require_once "../controladores/modulos.controlador.php";
require_once "../modelos/modulos.modelo.php";
session_start();
class AjaxAreaProcesos{
    public function ListarModulosPuntajes(){
        $respuesta = ControladorModulos::ctrGraficaModulosPuntaje();
        echo json_encode($respuesta);
    }
}

$procesos = new AjaxAreaProcesos();
$procesos->ListarModulosPuntajes();
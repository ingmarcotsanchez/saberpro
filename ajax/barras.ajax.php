<?php

require_once "../controladores/resultados.controlador.php";
require_once "../modelos/resultados.modelo.php";
session_start();
class AjaxBarraProcesos{
    public function ListarResultadosPuntajes(){
        $respuesta = ControladorResultados::ctrGraficaResultadosPuntaje();
        echo json_encode($respuesta);
    }
}

$procesos = new AjaxBarraProcesos();
$procesos->ListarResultadosPuntajes();
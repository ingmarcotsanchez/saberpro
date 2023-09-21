<?php
$item = null;
$valor = null;
$orden = "id";
$centros = ControladorCentros::ctrMostrarCentros($item, $valor);
$totalCentros = count($centros);
$programas = ControladorProgramas::ctrMostrarProgramas($item, $valor, $orden);
$totalProgramas = count($programas);
$usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor, $orden);
$totalUsuarios = count($usuarios);
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Nombre del Centro Regional</div>
                        <div class="panel-body">Nombre del programa</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
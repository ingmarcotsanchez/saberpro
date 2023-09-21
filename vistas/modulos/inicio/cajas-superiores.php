<?php
$item = null;
$valor = null;
$orden = "id";
$centros = ControladorCentros::ctrMostrarCentros($item, $valor);
$totalCentros = count($centros);
$programas = ControladorProgramas::ctrMostrarProgramas($item, $valor, $orden);
$totalProgramas = count($programas);
$usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
$totalUsuarios = count($usuarios);
?>

<div class="container-box">
  <div class="box">
    <div class="box-icon box-icon1">
      <i class="fa fa-user"></i>
    </div>
    <div class="box-info">
      <p class="title">Centros Tutoriales</p>
      <p><span><?php echo number_format($totalCentros);?></span></p>
    </div>
  </div>
  <div class="box">
    <div class="box-icon box-icon2">
      <i class="fa fa-user"></i>
    </div>
    <div class="box-info">
      <p class="title">Programas</p>
      <p><span><?php echo number_format($totalProgramas);?></span></p>
    </div>
  </div>
  <div class="box">
    <div class="box-icon box-icon3">
      <i class="fa fa-user"></i>
    </div>
    <div class="box-info">
      <p class="title">Usuarios</p>
      <p><span><?php echo number_format($totalUsuarios);?></span></p>
    </div>
  </div>
</div>


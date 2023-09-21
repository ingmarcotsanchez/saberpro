
<link rel="stylesheet" href="vistas/dist/css/inicio.css">
<div class="content-wrapper">
  <section class="content-header">
    <h1>Tablero<small>Panel de Control</small></h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Tablero</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <?php
        if($_SESSION["perfil"] =="Administrador"){
          include "inicio/cajas-superiores.php";
        }
      ?>
    </div> 
    <div class="row">
        <div class="col-lg-6">
        <?php
          if($_SESSION["perfil"] =="Administrador"){
           include "inicio/linechart.php";
          }
        ?>
        </div>
        
        <div class="col-lg-6">
          <?php
            if($_SESSION["perfil"] =="Administrador"){
              include "inicio/barchart.php";
            }
          ?>
        </div>
    </div>
    <section class="content">
      <div class="row">
        <div class="col-lg-12">   
          <?php
            if($_SESSION["perfil"] =="Lider"){
              echo '<div class="box box-success">
                      <div class="box-header">
                        <h1>Usuario: ' .$_SESSION["nombre"].'</h1>
                        <h2>Perfil: '.$_SESSION["perfil"].'</h2>
                      </div>
                    </div>';
            }
          ?>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
        <?php
          if($_SESSION["perfil"] =="Lider"){
           include "programas/linechart.php";
          }
        ?>
        </div>
        
        <div class="col-lg-6">
          <?php
            if($_SESSION["perfil"] =="Lider"){
              include "programas/barchart.php";
            }
          ?>
        </div>
    </div>
  </section>
</div>

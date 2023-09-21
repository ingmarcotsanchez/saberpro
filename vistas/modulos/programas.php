<?php

if($_SESSION["perfil"] == "Lider"){
  echo '<script>
    window.location = "inicio";
  </script>';
  return;
}

?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Administrar Programas</h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar Programas</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPrograma">
          Agregar Programas
        </button>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablaProgramas" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Código</th>
              <th>Descripción</th>
              <th>Centro Regional</th>
              <th>Agregado</th>
              <th>Acciones</th>
            </tr> 
          </thead>      
        </table>
        <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">
      </div>
    </div>
  </section>
</div>
<!-- Agregar un programa -->
<div id="modalAgregarPrograma" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar un Programa</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">  
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <select class="form-control input-lg" id="nuevoCentro" name="nuevoCentro" required>
                  <option value="">Selecione un Centro Regional</option>
                  <?php
                    $item = null;
                    $valor = null;
                    $centros = ControladorCentros::ctrMostrarCentros($item, $valor);
                    foreach ($centros as $key => $value) {
                      echo '<option value="'.$value["id"].'">'.$value["centro"].'</option>';
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">  
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 
                <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código" readonly required>
              </div>
            </div>
            <div class="form-group">  
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar descripción" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar programa</button>
        </div>
      </form>
        <?php
          $crearPrograma = new ControladorProgramas();
          $crearPrograma -> ctrCrearPrograma();
        ?>  
    </div>
  </div>
</div>
<!-- Editar un programa -->
<div id="modalEditarPrograma" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar un programa</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">  
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <select class="form-control input-lg"  name="editarCentro" readonly required>
                  <option id="editarCentro"></option>
                </select>
              </div>
            </div>
            <div class="form-group">  
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 
                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly required>
              </div>
            </div>
            <div class="form-group">  
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 
                <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
      </form>
      <?php
        $editarPrograma = new ControladorProgramas();
        $editarPrograma -> ctrEditarPrograma();
      ?>      
    </div>
  </div>
</div>
<?php
  $eliminarPrograma = new ControladorProgramas();
  $eliminarPrograma -> ctrEliminarPrograma();
?>      




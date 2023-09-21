<?php

if($_SESSION["perfil"] == "profesor"){
  echo '<script>
    window.location = "inicio";
  </script>';
  return;
}

?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Administrar Mejoras</h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar Mejoras</li>
    </ol>
  </section>
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMejora">
          Agregar Mejoras
        </button>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablaMejoras" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Competencia</th>
              <th>Qué</th>
              <th>Cómo</th>
              <th>Cuándo</th>
              <th>Quién</th>
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
<!-- Agregar mejora -->
<div id="modalAgregarMejora" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar mejoras</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">  
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <select class="form-control input-lg" id="nuevoSubComponente" name="nuevoSubComponente" required>
                  <option value="">Selecione un Componente</option>
                  <?php
                    $item = null;
                    $valor = null;
                    $orden = null;
                    $SubComponente = ControladorSubCompetencias::ctrMostrarSubCompetencias($item, $valor, $orden);
                    foreach ($SubComponente as $key => $value) {
                      echo '<option value="'.$value["id"].'">'.$value["descripcion"].'</option>';
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">  
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span> 
                <input type="text" class="form-control input-lg" id="nuevoQue" name="nuevoQue" placeholder="Qué va a mejorar" required>
              </div>
            </div>
            <div class="form-group">  
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-circle"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevoComo" placeholder="Cómo lo va hacer" required>
              </div>
            </div>
            <div class="form-group">  
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevoQuien" placeholder="Quién lo va hacer" required>
              </div>
            </div>
            <div class="form-group">  
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                <input type="date" class="form-control input-lg" name="nuevoCuando" placeholder="Cuándo lo va hacer" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar mejora</button>
        </div>
      </form>
        <?php
          $crearMejora = new ControladorMejoras();
          $crearMejora -> ctrCrearMejora();
        ?>  
    </div>
  </div>
</div>
<!-- Editar un programa -->
<div id="modalEditarMejora" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post" enctype="multipart/form-data">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar mejoras</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">  
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <select class="form-control input-lg"  name="editarSubComponente" readonly required>
                  <option id="editarSubComponente"></option>
                </select>
              </div>
            </div>
            <div class="form-group">  
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-check"></i></span> 
                <input type="text" class="form-control input-lg" id="editarQue" name="editarQue" placeholder="Qué va a mejorar" required>
              </div>
            </div>
            <div class="form-group">  
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-circle"></i></span> 
                <input type="text" class="form-control input-lg" id="editarComo" name="editarComo" placeholder="Cómo lo va hacer" required>
              </div>
            </div>
            <div class="form-group">  
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" id="editarQuien" name="editarQuien" placeholder="Quién lo va hacer" required>
              </div>
            </div>
            <div class="form-group">  
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                <input type="date" class="form-control input-lg" id="editarCuando" name="editarCuando" placeholder="Cuándo lo va hacer" required>
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
        $editarMejora = new ControladorMejoras();
        $editarMejora -> ctrEditarMejora();
      ?>      
    </div>
  </div>
</div>
<?php
  $eliminarMejora = new ControladorMejoras();
  $eliminarMejora -> ctrEliminarMejora();
?>      




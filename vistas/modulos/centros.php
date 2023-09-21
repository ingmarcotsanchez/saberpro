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
        <h1>Administrar Centros</h1>
        <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Centros</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCentro">       
                Agregar Centro Regional
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Centro</th>
                            <th>Acciones</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php
                            $item = null;
                            $valor = null;
                            $centros = ControladorCentros::ctrMostrarCentros($item, $valor);
                            foreach ($centros as $key => $value) {
                                echo ' <tr>
                                    <td>'.($key+1).'</td>
                                    <td class="text-uppercase">'.$value["centro"].'</td>
                                    <td>
                                    <div class="btn-group">  
                                        <button class="btn btn-warning btnEditarCentro" idCentro="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCentro"><i class="fa fa-pencil"></i></button>';
                                        if($_SESSION["perfil"] == "Administrador"){
                                        echo '<button class="btn btn-danger btnEliminarCentro" idCentro="'.$value["id"].'"><i class="fa fa-times"></i></button>';
                                        }
                                    echo '</div>  
                                    </td>
                                </tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<!-- Agregar un centro regional -->
<div id="modalAgregarCentro" class="modal fade" role="dialog">  
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Centro Regional</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">     
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                                <input type="text" class="form-control input-lg" name="nuevoCentro" placeholder="Ingresar un Centro Regional" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar centro</button>
                </div>
                <?php
                    $crearCentro = new ControladorCentros();
                    $crearCentro -> ctrCrearCentro();
                ?>
            </form>
        </div>
    </div>
</div>
<!-- Editar un Centro Regional-->
<div id="modalEditarCentro" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Centro Regional</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                                <input type="text" class="form-control input-lg" name="editarCentro" id="editarCentro" required>
                                <input type="hidden"  name="idCentro" id="idCentro" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
                <?php
                    $editarCentro = new ControladorCentros();
                    $editarCentro -> ctrEditarCentro();
                ?> 
            </form>
        </div>
    </div>
</div>
<?php
  $borrarCentro = new ControladorCentros();
  $borrarCentro -> ctrBorrarCentro();
?>



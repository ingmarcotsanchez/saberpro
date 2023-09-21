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
        <h1>Administrar Competemcias</h1>
        <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Administrar Competemcias</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCompetencia">       
                Agregar Competencias
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Competencias</th>
                            <th>Acciones</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <?php
                            $item = null;
                            $valor = null;
                            $competencias = ControladorCompetencias::ctrMostrarCompetencias($item, $valor);
                            foreach ($competencias as $key => $value) {
                                echo ' <tr>
                                    <td>'.($key+1).'</td>
                                    <td class="text-uppercase">'.$value["competencia"].'</td>
                                    <td>
                                    <div class="btn-group">  
                                        <button class="btn btn-warning btnEditarCompetencia" idCompetencia="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCompetencia"><i class="fa fa-pencil"></i></button>';
                                        if($_SESSION["perfil"] == "Administrador"){
                                        echo '<button class="btn btn-danger btnEliminarCompetencia" idCompetencia="'.$value["id"].'"><i class="fa fa-times"></i></button>';
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
<!-- Agregar una competencia -->
<div id="modalAgregarCompetencia" class="modal fade" role="dialog">  
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Competencia</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">     
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                                <input type="text" class="form-control input-lg" name="nuevaCompetencia" placeholder="Ingresar una Competencia" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar competencia</button>
                </div>
                <?php
                    $crearCompetencia = new ControladorCompetencias();
                    $crearCompetencia -> ctrCrearCompetencia();
                ?>
            </form>
        </div>
    </div>
</div>
<!-- Editar una competencia-->
<div id="modalEditarCompetencia" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar una Competencia</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                                <input type="text" class="form-control input-lg" name="editarCompetencia" id="editarCompetencia" required>
                                <input type="hidden"  name="idCompetencia" id="idCompetencia" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
                <?php
                    $editarCompetencia = new ControladorCompetencias();
                    $editarCompetencia -> ctrEditarCompetencia();
                ?> 
            </form>
        </div>
    </div>
</div>
<?php
  $borrarCompetencia = new ControladorCompetencias();
  $borrarCompetencia -> ctrBorrarCompetencia();
?>



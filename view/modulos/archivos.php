<?php
// método del controller que consulta todos los usuarios de la BBDD
$columnaBD = null;
$valorBD = null;
$usuarios = ControllerUsuarios::controllerMostrarUsuarios($columnaBD, $valorBD);
?>
<div class="d-flex" id="wrapper">

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <div class="container-fluid contenedor">
            <h1 class="mt-4">Documentación</h1>
            <hr>
            <select class="custom-select" id="idUsuario">
                <option selected>Seleccione trabajador</option>
                <?php
                foreach ($usuarios as $key => $usuario) {
                    echo '<option value="' . $usuario["id_usuario"] . '">' . $usuario["nombre_usuario"] . '</option>';
                }
                ?>
            </select>
            <br><br>

            <div id="divArchivos">
                <div class="row" id="ads">
                    <!-- Documentos -->

                    <!-- Contrato de trabajo -->
                    <div class="col-sm-12 col-md-3">
                        <div class="card rounded">
                            <div class="card-image">
                                <span class="card-notify-badge">Card</span>
                                <span class="card-notify-year">2018</span>
                                <img class="img-fluid" src="view/componentes/images/docs.png" alt="Alternate Text" />
                            </div>
                            <div class="card-body text-center">
                                <button type="button" class="botones btn btn-success cargar0 disabled" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                                <button type="button" class="botones btn btn-secondary descargar0 disabled" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                                <button type="button" class="botones btn btn-warning modificar0 disabled" title="Modificar archivo"><i class="fas fa-cut"></i></button>
                                <button type="button" class="botones btn btn-danger eliminar0 disabled" title="Eliminar archivo"><i class="far fa-trash-alt"></i></button>
                                <a class="ad-btn" href="#">View</a>
                            </div>
                        </div>
                    </div>

                    <!-- Entrega EPPS -->
                    <div class="col-sm-12 col-md-3">
                        <div class="card rounded">
                            <div class="card-image">
                                <span class="card-notify-badge">Card</span>
                                <span class="card-notify-year">2018</span>
                                <img class="img-fluid" src="view/componentes/images/docs.png" alt="Alternate Text" />
                            </div>
                            <div class="card-body text-center">
                                <button type="button" class="botones btn btn-success cargar1 disabled" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                                <button type="button" class="botones btn btn-secondary descargar1 disabled" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                                <button type="button" class="botones btn btn-warning modificar1 disabled" title="Modificar archivo"><i class="fas fa-cut"></i></button>
                                <button type="button" class="botones btn btn-danger eliminar1 disabled" title="Eliminar archivo"><i class="far fa-trash-alt"></i></button>
                                <a class="ad-btn" href="#">View</a>
                            </div>
                        </div>
                    </div>

                    <!-- Examenes Psicosensotecnicos -->
                    <div class="col-sm-12 col-md-3">
                        <div class="card rounded">
                            <div class="card-image">
                                <span class="card-notify-badge">Card</span>
                                <span class="card-notify-year">2018</span>
                                <img class="img-fluid" src="view/componentes/images/docs.png" alt="Alternate Text" />
                            </div>
                            <div class="card-body text-center">
                                <button type="button" class="btn btn-success cargar2" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                                <button type="button" class="btn btn-secondary descargar2" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                                <button type="button" class="btn btn-warning modificar2" title="Modificar archivo"><i class="fas fa-cut"></i></button>
                                <button type="button" class="btn btn-danger eliminar2" title="Eliminar archivo"><i class="far fa-trash-alt"></i></button>
                                <a class="ad-btn" href="#">View</a>
                            </div>
                        </div>
                    </div>

                    <!-- Procedimientos trabajos -->
                    <div class="col-sm-12 col-md-3">
                        <div class="card rounded">
                            <div class="card-image">
                                <span class="card-notify-badge">Card</span>
                                <span class="card-notify-year">2018</span>
                                <img class="img-fluid" src="view/componentes/images/docs.png" alt="Alternate Text" />
                            </div>
                            <div class="card-body text-center">
                                <button type="button" class="btn btn-success cargar3" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                                <button type="button" class="btn btn-secondary descargar3" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                                <button type="button" class="btn btn-warning modificar3" title="Modificar archivo"><i class="fas fa-cut"></i></button>
                                <button type="button" class="btn btn-danger eliminar3" title="Eliminar archivo"><i class="far fa-trash-alt"></i></button>
                                <a class="ad-btn" href="#">View</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" id="ads">

                    <!-- Examenes ocupacionales -->
                    <div class="col-sm-12 col-md-3">
                        <div class="card rounded">
                            <div class="card-image">
                                <span class="card-notify-badge">Card</span>
                                <span class="card-notify-year">2018</span>
                                <img class="img-fluid" src="view/componentes/images/docs.png" alt="Alternate Text" />
                            </div>
                            <div class="card-body text-center">
                                <button type="button" class="btn btn-success cargar4" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                                <button type="button" class="btn btn-secondary descargar4" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                                <button type="button" class="btn btn-warning modificar4" title="Modificar archivo"><i class="fas fa-cut"></i></button>
                                <button type="button" class="btn btn-danger eliminar4" title="Eliminar archivo"><i class="far fa-trash-alt"></i></button>
                                <a class="ad-btn" href="#">View</a>
                            </div>
                        </div>
                    </div>

                    <!-- Reglamento interno -->
                    <div class="col-sm-12 col-md-3">
                        <div class="card rounded">
                            <div class="card-image">
                                <span class="card-notify-badge">Card</span>
                                <span class="card-notify-year">2018</span>
                                <img class="img-fluid" src="view/componentes/images/docs.png" alt="Alternate Text" />
                            </div>
                            <div class="card-body text-center">
                                <button type="button" class="btn btn-success cargar5" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                                <button type="button" class="btn btn-secondary descargar5" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                                <button type="button" class="btn btn-warning modificar5" title="Modificar archivo"><i class="fas fa-cut"></i></button>
                                <button type="button" class="btn btn-danger eliminar5" title="Eliminar archivo"><i class="far fa-trash-alt"></i></button>
                                <a class="ad-btn" href="#">View</a>
                            </div>
                        </div>
                    </div>

                    <!-- Derecho a saber -->
                    <div class="col-sm-12 col-md-3">
                        <div class="card rounded">
                            <div class="card-image">
                                <span class="card-notify-badge">Card</span>
                                <span class="card-notify-year">2018</span>
                                <img class="img-fluid" src="view/componentes/images/docs.png" alt="Alternate Text" />
                            </div>
                            <div class="card-body text-center">
                                <button type="button" class="btn btn-success cargar6" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                                <button type="button" class="btn btn-secondary descargar6" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                                <button type="button" class="btn btn-warning modificar6" title="Modificar archivo"><i class="fas fa-cut"></i></button>
                                <button type="button" class="btn btn-danger eliminar6" title="Eliminar archivo"><i class="far fa-trash-alt"></i></button>
                                <a class="ad-btn" href="#">View</a>
                            </div>
                        </div>
                    </div>

                    <!-- Hoja de vida de conductor -->
                    <div class="col-sm-12 col-md-3">
                        <div class="card rounded">
                            <div class="card-image">
                                <span class="card-notify-badge">Card</span>
                                <span class="card-notify-year">2018</span>
                                <img class="img-fluid" src="view/componentes/images/docs.png" alt="Alternate Text" />
                            </div>
                            <div class="card-body text-center">
                                <button type="button" class="btn btn-success cargar7" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                                <button type="button" class="btn btn-secondary descargar7" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                                <button type="button" class="btn btn-warning modificar7" title="Modificar archivo"><i class="fas fa-cut"></i></button>
                                <button type="button" class="btn btn-danger eliminar7" title="Eliminar archivo"><i class="far fa-trash-alt"></i></button>
                                <a class="ad-btn" href="#">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>

<!-- Modal registrar archivo -->
<div class="modal fade" id="modaRegistrarArchivo">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Agregar nuevo archivo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form action="" method="POST" role="form" enctype="multipart/form-data">
                    
                    <!-- div Archivo -->
                    <div class="form-group">
                        <div class="panel">Subir Foto</div>
                        <input type="file" name="registrarArchivo" id="registrarArchivo" class="registrarArchivo">
                        <input type="hidden" id="upld_usuario" name="upld_usuario">
                        <input type="hidden" id="upld_archivo" name="upld_archivo">
                        <input type="hidden" id="upld_registro" name="upld_registro">
                        <p class="help-block">Peso máximo de la foto: 2 MB </p>
                        <img src="view/componentes/images/pdf.png" alt="Anonimo" class="img-thumbnail previsualizar" width="150px">
                    </div>

                    <!-- div de errores -->
                    <div class="form-group" id="errorValidacion">
                    </div>

                    <button type="submit" id="btnCrearArchivo" class="btn btn-primary">Crear Usuario</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>


<!-- JS modulo usuarios -->
<script src="view/js/archivos.js"></script>

<?php
// controller: registrar archivo
$regArchivo = new ControllerArchivos();
$regArchivo->controllerRegistrarArchivo();

// controller: editar usuario
//$editArchivo = new ControllerUsuarios();
//$editArchivo->controllerEditarUsuario();

// controller: eliminar usuario
//$elimArchivo = new ControllerUsuarios();
//$elimArchivo->controllerEliminarUsuario();
?>
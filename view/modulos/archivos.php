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
                            <button type="button" class="btn btn-success" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                            <button type="button" class="btn btn-secondary" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                            <button type="button" class="btn btn-warning" title="Modificar archivo"><i class="fas fa-cut"></i></button>
                            <button type="button" class="btn btn-danger" title="Eliminar archivo"><i class="far fa-trash-alt"></i></button>
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
                            <button type="button" class="btn btn-success" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                            <button type="button" class="btn btn-secondary" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                            <button type="button" class="btn btn-warning" title="Modificar archivo"><i class="fas fa-folder-plus"></i></button>
                            <button type="button" class="btn btn-danger" title="Eliminar archivo"><i class="fas fa-folder-plus"></i></button>
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
                            <button type="button" class="btn btn-success" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                            <button type="button" class="btn btn-secondary" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                            <button type="button" class="btn btn-warning" title="Modificar archivo"><i class="fas fa-folder-plus"></i></button>
                            <button type="button" class="btn btn-danger" title="Eliminar archivo"><i class="fas fa-folder-plus"></i></button>
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
                            <button type="button" class="btn btn-success" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                            <button type="button" class="btn btn-secondary" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                            <button type="button" class="btn btn-warning" title="Modificar archivo"><i class="fas fa-folder-plus"></i></button>
                            <button type="button" class="btn btn-danger" title="Eliminar archivo"><i class="fas fa-folder-plus"></i></button>
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
                            <button type="button" class="btn btn-success" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                            <button type="button" class="btn btn-secondary" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                            <button type="button" class="btn btn-warning" title="Modificar archivo"><i class="fas fa-folder-plus"></i></button>
                            <button type="button" class="btn btn-danger" title="Eliminar archivo"><i class="fas fa-folder-plus"></i></button>
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
                            <button type="button" class="btn btn-success" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                            <button type="button" class="btn btn-secondary" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                            <button type="button" class="btn btn-warning" title="Modificar archivo"><i class="fas fa-folder-plus"></i></button>
                            <button type="button" class="btn btn-danger" title="Eliminar archivo"><i class="fas fa-folder-plus"></i></button>
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
                            <button type="button" class="btn btn-success" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                            <button type="button" class="btn btn-secondary" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                            <button type="button" class="btn btn-warning" title="Modificar archivo"><i class="fas fa-folder-plus"></i></button>
                            <button type="button" class="btn btn-danger" title="Eliminar archivo"><i class="fas fa-folder-plus"></i></button>
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
                            <button type="button" class="btn btn-success" title="Subir archivo"><i class="fas fa-folder-plus"></i></button>
                            <button type="button" class="btn btn-secondary" title="Descargar archivo"><i class="fas fa-file-download"></i></button>
                            <button type="button" class="btn btn-warning" title="Modificar archivo"><i class="fas fa-folder-plus"></i></button>
                            <button type="button" class="btn btn-danger" title="Eliminar archivo"><i class="fas fa-folder-plus"></i></button>
                            <a class="ad-btn" href="#">View</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>

<!-- JS modulo usuarios -->
<script src="view/js/archivos.js"></script>

<?php
// controller: registrar archivo
//$regArchivo = new ControllerUsuarios();
//$regArchivo->controllerRegistrarUsuario();

// controller: editar usuario
//$editArchivo = new ControllerUsuarios();
//$editArchivo->controllerEditarUsuario();

// controller: eliminar usuario
//$elimArchivo = new ControllerUsuarios();
//$elimArchivo->controllerEliminarUsuario();
?>
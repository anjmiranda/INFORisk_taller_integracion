<div class="container-fluid contenedor">
    <h1 class="mt-4">Empresas</h1>
    <hr>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRegistrarEmpresa">Agregar</button><br>
    <br>
    <div class="tabla">
        <table id="tablaUser" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>RUT</th>
                    <th>Nombre</th>
                    <th>Alias</th>
                    <th>Direccion</th>
                    <th>Giro</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // método del controller que consulta todas las empresas de la BBDD
                $columnaBD = null;
                $valorBD = null;
                $empresas = ControllerEmpresas::controllerMostrarEmpresas($columnaBD, $valorBD);

                // foreach que permite el llenado automático de los usuarios en la tabla
                foreach ($empresas as $key => $empresa) {
                    // id, nombre y alias
                    echo '
                        <tr>
                        <td>' . $empresa["id_empresa"] . '</td>
                        <td>' . $empresa["rut_empresa"] . '</td>
                        <td>' . $empresa["nombre_empresa"] . '</td>
                        <td>' . $empresa["alias_empresa"] . '</td>
                        <td>' . $empresa["direccion_empresa"] . '</td>
                        <td>' . $empresa["giro_empresa"] . '</td>';

                    // foto del usuario si muestra la información o no
                    if ($empresa["foto_empresa"] != null) {
                        echo
                            '<td>
                              <img src="' . $empresa["foto_empresa"] . '" class="img-thumbnail" width="40px" alt="Empresa">
                            </td>';
                    } else {
                        echo
                            '<td>
                              <img src="view/componentes/images/anonimo.jpg" class="img-thumbnail" width="40px" alt="Usuario">
                            </td>';
                    }
                    
                    // acciones de modificar o eliminar
                    echo '
                    <td>
                        <button class="btn btn-warning btnEditarEmpresa" idEmpresa="' . $empresa["id_empresa"] . '" data-toggle="modal" data-target="#modalEditarEmpresa">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-danger btnEliminarEmpresa" idEmpresa="' . $empresa["id_empresa"] . '" fotoEmpresa="' . $empresa["foto_empresa"] . '" aliasEmpresa="' . $empresa["alias_empresa"] . '">
                          <i class="fas fa-user-times"></i>
                        </button>
                    </td>
                    </tr>';
                }
                // fin foreach
                ?>
            </tbody>
        </table>
    </div>
    <div>
        <hr>
    </div>
</div>

<!-- Modal Registrar Usuarios -->
<div class="modal fade" id="modalRegistrarEmpresa">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Agregar nueva empresa</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form action="" method="POST" role="form" enctype="multipart/form-data">
                    <!-- RUT empresa -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-industry"></i></div>
                            </div>
                            <input type="text" class="form-control" name="nuevoRut" id="nuevoRut" placeholder="Ingrese el rut de la empresa">
                        </div>
                    </div>

                    <!-- nombre empresa -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-industry"></i></div>
                            </div>
                            <input type="text" class="form-control" name="nuevoNombre" id="nuevoNombre" placeholder="Ingrese el nombre">
                        </div>
                    </div>

                    <!-- alias empresa -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-industry"></i></div>
                            </div>
                            <input type="text" class="form-control" name="nuevoAlias" id="nuevoAlias" placeholder="Ingrese el alias">
                        </div>
                    </div>

                    <!-- alias empresa -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-industry"></i></div>
                            </div>
                            <input type="text" class="form-control" name="nuevaDireccion" id="nuevaDireccion" placeholder="Ingrese la dirección">
                        </div>
                    </div>

                    <!-- giro empresa -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-industry"></i></div>
                            </div>
                            <input type="text" class="form-control" name="nuevoGiro" id="nuevoGiro" placeholder="Ingrese el giro">
                        </div>
                    </div>

                    <!-- div fotografía -->
                    <div class="form-group">
                        <div class="panel">Subir Foto</div>
                        <input type="file" name="nuevaFoto" id="nuevaFoto" class="nuevaFoto">
                        <p class="help-block">Peso máximo de la foto: 2 MB </p>
                        <img src="view/componentes/images/anonimo.jpg" alt="Anonimo" class="img-thumbnail previsualizar">
                    </div>

                    <!-- div de errores -->
                    <div class="form-group" id="errorValidacion">
                    </div>

                    <button type="submit" id="btnCrearEmpresa" class="btn btn-primary">Crear empresa</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal Editar Usuarios -->
<div class="modal fade" id="modalEditarEmpresa">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar empresa</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form action="" method="POST" role="form" enctype="multipart/form-data">
                    <!-- RUT empresa -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-industry"></i></div>
                            </div>
                            <input type="text" class="form-control" name="editarRut" id="editarRut">
                        </div>
                    </div>

                    <!-- nombre empresa -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-industry"></i></div>
                            </div>
                            <input type="text" class="form-control" name="editarNombre" id="editarNombre">
                        </div>
                    </div>

                    <!-- alias empresa -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-industry"></i></div>
                            </div>
                            <input type="text" class="form-control" name="editarAlias" id="editarAlias" readonly>
                        </div>
                    </div>

                    <!-- direccion empresa -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-industry"></i></div>
                            </div>
                            <input type="text" class="form-control" name="editarDireccion" id="editarDireccion">
                        </div>
                    </div>

                    <!-- giro empresa -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-industry"></i></div>
                            </div>
                            <input type="text" class="form-control" name="editarGiro" id="editarGiro">
                        </div>
                    </div>

                    <!-- div fotografía -->
                    <div class="form-group">
                        <div class="panel">Subir Foto</div>
                        <input type="file" name="editarFoto" class="nuevaFoto">
                        <p class="help-block">Peso máximo de la foto: 2 MB </p>
                        <img src="view/componentes/images/anonimo.jpg" alt="Anonimo" class="img-thumbnail previsualizar">
                        <input type="hidden" id="fotoActual" name="fotoActual">
                    </div>

                    <!-- div de errores -->
                    <div class="form-group" id="errorValidacionEditar">
                    </div>

                    <button type="submit" id="btnEditarEmpresa" class="btn btn-primary">Editar Empresa</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>

<!-- JS modulo empresas -->  
<script src="view/js/empresas.js"></script>

<?php
// controller: registrar empresa
$regEmpresa = new ControllerEmpresas();
$regEmpresa->controllerRegistrarEmpresa();

// controller: editar usuario
$editEmpresa = new ControllerEmpresas();
$editEmpresa->controllerEditarEmpresa();

// controller: eliminar empresa
$elimEmpresa = new ControllerEmpresas();
$elimEmpresa->controllerEliminarEmpresa();
?>
<div class="container-fluid contenedor">
    <h1 class="mt-4">Clientes</h1>
    <hr>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRegistrarCliente">Agregar</button><br>
    <br>
    <div class="tabla">
        <table id="tablaUser" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Alias</th>
                    <th>Email</th>
                    <th>Empresa</th>
                    <th>Teléfono</th>
                    <th>Foto</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // método del controller que consulta todos los clientes de la BBDD
                $columnaBD = null;
                $valorBD = null;
                $clientes = ControllerClientes::controllerMostrarClientes($columnaBD, $valorBD);
                $empresas = ControllerEmpresas::controllerMostrarEmpresas($columnaBD, $valorBD);

                // foreach que permite el llenado automático de los usuarios en la tabla                
                foreach ($clientes as $key => $cliente) {
                    // id, nombre y alias
                    echo '
                        <tr>
                        <td>' . $cliente["id_cliente"] . '</td>
                        <td>' . $cliente["nombre_cliente"] . '</td>
                        <td>' . $cliente["alias_cliente"] . '</td>
                        <td>' . $cliente["email_cliente"] . '</td>';

                    // empresas / foreach para recorrer la lista de empresas
                    foreach ($empresas as $key => $empresa) {
                        if ($empresa["id_empresa"] == $cliente["empresa_cliente_fk"]) {
                            echo '<td>' . $empresa["nombre_empresa"] . '</td>';
                            break;
                        }
                    }

                    // teléfono
                    echo '<td>' . $cliente["telefono_cliente"] . '</td>';

                    // foto del usuario si muestra la información o no
                    if ($cliente["foto_cliente"] != null) {
                        echo
                            '<td>
                              <img src="' . $cliente["foto_cliente"] . '" class="img-thumbnail" width="40px" alt="Cliente">
                            </td>';
                    } else {
                        echo
                            '<td>
                              <img src="view/componentes/images/anonimo.jpg" class="img-thumbnail" width="40px" alt="Usuario">
                            </td>';
                    }

                    // estado usuario
                    if ($cliente["estado_cliente"] == 1) {
                        echo '
                        <td>
                            <span class="btnEditarCliente label btn-success btn-xs btnActivar" idCliente="' . $cliente["id_cliente"] . '" estadoCliente="2">Activado</span>
                        </td>';
                    } else if ($cliente["estado_cliente"] == 2) {
                        echo '
                        <td>
                            <span class="btnEditarCliente label btn-danger btn-xs btnActivar" idCliente="' . $cliente["id_cliente"] . '" estadoCliente="1">Desactivado</span>
                        </td>';
                    }

                    // acciones de modificar o eliminar
                    echo '
                    <td>
                        <button class="btn btn-warning btnEditarCliente" idCliente="' . $cliente["id_cliente"] . '" data-toggle="modal" data-target="#modalEditarCliente">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-danger btnEliminarCliente" idCliente="' . $cliente["id_cliente"] . '" fotoCliente="' . $cliente["foto_cliente"] . '" aliasCliente="' . $cliente["alias_cliente"] . '">
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

<!-- Modal Registrar Clientes -->
<div class="modal fade" id="modalRegistrarCliente">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Agregar nuevo cliente</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form action="" method="POST" role="form" enctype="multipart/form-data">
                    <!-- Nombre cliente -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                            </div>
                            <input type="text" class="form-control" name="nuevoNombre" id="nuevoNombre" placeholder="Ingrese nombre del cliente">
                        </div>
                    </div>

                    <!-- Alias cliente -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                            </div>
                            <input type="text" class="form-control" name="nuevoAlias" id="nuevoAlias" placeholder="Ingrese el alias del cliente">
                        </div>
                    </div>

                    <!-- Email cliente -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-at"></i></div>
                            </div>
                            <input type="email" class="form-control" name="nuevoEmail" id="nuevoEmail" placeholder="Ingrese el email del cliente">
                        </div>
                    </div>

                    <!-- Empresa -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="far fa-building"></i></div>
                            </div>
                            <select class="form-control input-lg" name="nuevaEmpresa" id="nuevaEmpresa">
                                <option value="">Seleccione una empresa</option>
                                <?php
                                // foreach para rellenar la tabla de empresas
                                foreach ($empresas as $key => $empresa) {
                                    echo '<option value="' . $empresa["id_empresa"] . '">' . $empresa["nombre_empresa"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Teléfono cliente -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-mobile-alt"></i></div>
                            </div>
                            <input type="number" class="form-control" name="nuevoTelefono" id="nuevoTelefono" placeholder="Ingrese el teléfono del cliente">
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

                    <button type="submit" id="btnCrearCliente" class="btn btn-primary">Crear Usuario</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal Editar Clientes -->
<div class="modal fade" id="modalEditarCliente">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar cliente</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form action="" method="POST" role="form" enctype="multipart/form-data">
                    <!-- Nombre cliente -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                            </div>
                            <input type="text" class="form-control" name="editarNombre" id="editarNombre">
                        </div>
                    </div>

                    <!-- Alias cliente -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user-tie"></i></div>
                            </div>
                            <input type="text" class="form-control" name="editarAlias" id="editarAlias" readonly>
                        </div>
                    </div>

                    <!-- Email cliente -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-at"></i></div>
                            </div>
                            <input type="email" class="form-control" name="editarEmail" id="editarEmail">
                        </div>
                    </div>

                    <!-- Empresa -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="far fa-building"></i></div>
                            </div>
                            <select class="form-control input-lg" name="editarEmpresa" id="editarEmpresa">
                                <option id="editarEmpresaOpt" value="">Seleccione una empresa</option>
                                <?php
                                // foreach para rellenar la tabla de empresas
                                foreach ($empresas as $key => $empresa) {
                                    echo '<option value="' . $empresa["id_empresa"] . '">' . $empresa["nombre_empresa"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Teléfono cliente -->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-mobile-alt"></i></div>
                            </div>
                            <input type="number" class="form-control" name="editarTelefono" id="editarTelefono">
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

                    <button type="submit" id="btnEditarCliente" class="btn btn-primary">Editar cliente</button>
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
<script src="view/js/clientes.js"></script>

<?php
// controller: registrar cliente
$regCliente = new ControllerClientes();
$regCliente->controllerRegistrarCliente();

// controller: editar cliente
$editCliente = new ControllerClientes();
$editCliente->controllerEditarCliente();

// controller: eliminar cliente
//$elimCliente = new ControllerUsuarios();
//$elimCliente->controllerEliminarUsuario();
?>
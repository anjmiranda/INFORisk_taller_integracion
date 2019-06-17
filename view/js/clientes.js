//_____________________________________________________________________________________________________________
// VALIDACIONES
$(document).ready(function () {
    //___________________________________________________________________________________________________________
    // funcion parar validar formulario en Crear cliente opción preventDefault())
    $("#btnCrearCliente").click(function (event) {

        // validar nombre
        var nuevoNombre = $("#nuevoNombre").val();
        expReg = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;
        if (nuevoNombre == "") {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Nombre no puede estar vacío</div>'
            );
        } else if (!expReg.test(nuevoNombre)) {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Nombre no puede contener caracteres especiales</div>'
            );
        }

        // validar alias con expReg
        var nuevoAlias = $("#nuevoAlias").val();
        expReg = /^[a-zA-Z0-9]+$/;
        if (nuevoAlias == "") {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Alias no puede estar vacío</div>'
            );
        } else if (!expReg.test(nuevoAlias)) {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Alias no puede contener espacios o caracteres</div>'
            );
        }

        // validar correo con regExp
        var nuevoEmail = $("#nuevoEmail").val();
        expReg = /^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/;
        if (nuevoEmail == "") {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Email no puede estar vacío</div>'
            );
        } else if (!expReg.test(nuevoEmail)) {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Formato de Email debe ser correcto</div>'
            );
        }

        // validar empresa con expReg
        var nuevaEmpresa = $("#nuevaEmpresa").val();
        expReg = /^[0-9]+$/;
        if (nuevaEmpresa == "") {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Debe seleccionar una empresa</div>'
            );
        }

        // validar telefono con regExp
        var nuevoTelefono = $("#nuevoTelefono").val();
        expReg = /^[0-9]+$/;
        if (nuevoTelefono == "") {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Teléfono no puede estar vacío</div>'
            );
        } else if (!expReg.test(nuevoTelefono)) {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Teléfono solo puede contener números</div>'
            );
        }
    });
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    $("#btnEditarCliente").click(function (event) {
        // validar nombre
        var editarNombre = $("#editarNombre").val();
        expReg = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;
        if (editarNombre == "") {
            event.preventDefault();
            $("#errorValidacionEditar").html(
                '<div class="alert alert-danger alert-dismissible">Nombre no puede estar vacío</div>'
            );
        } else if (!expReg.test(editarNombre)) {
            event.preventDefault();
            $("#errorValidacionEditar").html(
                '<div class="alert alert-danger alert-dismissible">Nombre no puede contener caracteres especiales</div>'
            );
        }

        // validar alias con expReg
        var editarAlias = $("#editarAlias").val();
        expReg = /^[a-zA-Z0-9]+$/;
        if (editarAlias == "") {
            event.preventDefault();
            $("#errorValidacionEditar").html(
                '<div class="alert alert-danger alert-dismissible">Alias no puede estar vacío</div>'
            );
        } else if (!expReg.test(editarAlias)) {
            event.preventDefault();
            $("#errorValidacionEditar").html(
                '<div class="alert alert-danger alert-dismissible">Alias no puede contener espacios o caracteres</div>'
            );
        }

        // validar correo con regExp
        var editarEmail = $("#editarEmail").val();
        expReg = /^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/;
        if (editarEmail == "") {
            event.preventDefault();
            $("#errorValidacionEditar").html(
                '<div class="alert alert-danger alert-dismissible">Email no puede estar vacío</div>'
            );
        } else if (!expReg.test(editarEmail)) {
            event.preventDefault();
            $("#errorValidacionEditar").html(
                '<div class="alert alert-danger alert-dismissible">Formato de Email debe ser correcto</div>'
            );
        }

        // validar empresa con expReg
        var editarEmpresa = $("#editarEmpresa").val();
        expReg = /^[0-9]+$/;
        if (editarEmpresa == "") {
            event.preventDefault();
            $("#errorValidacionEditar").html(
                '<div class="alert alert-danger alert-dismissible">Debe seleccionar una empresa</div>'
            );
        }

        // validar telefono con regExp
        var editarTelefono = $("#editarTelefono").val();
        expReg = /^[0-9]+$/;
        if (editarTelefono == "") {
            event.preventDefault();
            $("#errorValidacionEditar").html(
                '<div class="alert alert-danger alert-dismissible">Teléfono no puede estar vacío</div>'
            );
        } else if (!expReg.test(editarTelefono)) {
            event.preventDefault();
            $("#errorValidacionEditar").html(
                '<div class="alert alert-danger alert-dismissible">Teléfono solo puede contener números</div>'
            );
        }
    });
    //___________________________________________________________________________________________________________
    //___________________________________________________________________________________________________________
    // AJAX
    //___________________________________________________________________________________________________________
    // funcion ajax que permite mostrar los datos desde una BBDD al modal de forma dinámica
    $(document).on("click", ".btnEditarCliente", function () {
        var idCliente = $(this).attr("idCliente");
        var datos = new FormData();
        datos.append("idCliente", idCliente);
        $.ajax({
            url: "ajax/clientes.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                console.log(respuesta);
                // procesamiento de los datos que vienen de la BBDD
                $("#editarNombre").val(respuesta["nombre_cliente"]);
                $("#editarAlias").val(respuesta["alias_cliente"]);
                $("#editarEmail").val(respuesta["email_cliente"]);

                // mantener empresa en caso que no se edite. Opt = option
                $("#editarEmpresaOpt").val(respuesta["empresa_cliente_fk"]);

                $("#editarTelefono").val(respuesta["telefono_cliente"]);

                // si la empresa tiene foto, modificar la previsualización
                if (respuesta["foto_cliente"] != "") {
                    $(".previsualizar").attr("src", respuesta["foto_cliente"]);
                }

                // mantener foto en caso que no se modifique (pasar a controlador)
                $("#fotoActual").val(respuesta["foto_cliente"]);
            }
        });
    });
    //___________________________________________________________________________________________________________
});
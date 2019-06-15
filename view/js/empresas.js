//___________________________________________________________________________________________________________
// VALIDACIONES

$(document).ready(function () {
    //___________________________________________________________________________________________________________
    // funcion parar validar formulario en Crear empresa opción preventDefault())
    $("#btnCrearEmpresa").click(function (event) {
        // validar Rut con regExp de rut CL empresas
        var nuevoRut = $("#nuevoRut").val();
        expReg = /^(\d{2}\.\d{3}\.\d{3}-)([a-zA-Z]{1}$|\d{1}$)/;
        if (nuevoRut == "") {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Rut no puede estar vacío</div>'
            );
        } else if (!expReg.test(nuevoRut)) {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">El formato debe ser 77.777.777-7</div>'
            );
        }

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
                '<div class="alert alert-danger alert-dismissible">El alias solo debe contener mayusculas y minusculas</div>'
            );
        }

        // validar direccion con expReg
        var nuevaDireccion = $("#nuevaDireccion").val();
        expReg = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;
        if (nuevaDireccion == "") {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Direccion no puede estar vacío</div>'
            );
        } else if (!expReg.test(nuevaDireccion)) {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Direccion no puede contener caracteres especiales</div>'
            );
        }

        // validar giro con expReg
        var nuevoGiro = $("#nuevoGiro").val();
        expReg = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;
        if (nuevoGiro == "") {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Giro no puede estar vacío</div>'
            );
        } else if (!expReg.test(nuevoGiro)) {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Giro no puede contener caracteres especiales</div>'
            );
        }
    });
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // funcion parar validar formulario en Crear empresa opción preventDefault())
    $("#btnEditarEmpresa").click(function (event) {

        // validar Rut con regExp de rut CL empresas
        var editarRut = $("#editarRut").val();
        expReg = /^(\d{2}\.\d{3}\.\d{3}-)([a-zA-Z]{1}$|\d{1}$)/;
        if (editarRut == "") {
            event.preventDefault();
            $("#errorValidacionEditar").html(
                '<div class="alert alert-danger alert-dismissible">Rut no puede estar vacío</div>'
            );
        } else if (!expReg.test(editarRut)) {
            event.preventDefault();
            $("#errorValidacionEditar").html(
                '<div class="alert alert-danger alert-dismissible">El formato debe ser 77.777.777-7</div>'
            );
        }

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
                '<div class="alert alert-danger alert-dismissible">Alias solo debe contener mayusculas y minusculas</div>'
            );
        }

        // validar direccion con expReg
        var editarDireccion = $("#editarDireccion").val();
        expReg = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;
        if (editarDireccion == "") {
            event.preventDefault();
            $("#errorValidacionEditar").html(
                '<div class="alert alert-danger alert-dismissible">Direccion no puede estar vacío</div>'
            );
        } else if (!expReg.test(editarDireccion)) {
            event.preventDefault();
            $("#errorValidacionEditar").html(
                '<div class="alert alert-danger alert-dismissible">Direccion no puede contener caracteres especiales</div>'
            );
        }

        // validar giro con expReg
        var editarGiro = $("#editarGiro").val();
        expReg = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;
        if (editarGiro == "") {
            event.preventDefault();
            $("#errorValidacionEditar").html(
                '<div class="alert alert-danger alert-dismissible">Giro no puede estar vacío</div>'
            );
        } else if (!expReg.test(editarGiro)) {
            event.preventDefault();
            $("#errorValidacionEditar").html(
                '<div class="alert alert-danger alert-dismissible">Giro no puede contener caracteres especiales</div>'
            );
        }
    });
    //___________________________________________________________________________________________________________
    // AJAX
    //___________________________________________________________________________________________________________
    // funcion ajax que permite mostrar los datos desde una BBDD al modal de forma dinámica
    $(document).on("click", ".btnEditarEmpresa", function () {
        var idEmpresa = $(this).attr("idEmpresa");
        var datos = new FormData();
        datos.append("idEmpresa", idEmpresa);
        $.ajax({
            url: "ajax/empresas.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                // procesamiento de los datos que vienen de la BBDD
                $("#editarRut").val(respuesta["rut_empresa"]);
                $("#editarNombre").val(respuesta["nombre_empresa"]);
                $("#editarAlias").val(respuesta["alias_empresa"]);
                $("#editarDireccion").val(respuesta["direccion_empresa"]);
                $("#editarGiro").val(respuesta["giro_empresa"]);
                // si la empresa tiene foto, modificar la previsualización
                if (respuesta["foto_empresa"] != "") {
                    $(".previsualizar").attr("src", respuesta["foto_empresa"]);
                }

                // mantener foto en caso que no se modifique (controlador)
                $("#fotoActual").val(respuesta["foto_empresa"]);
            }
        });
    });
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    //  método que permite eliminar empresa
    $(document).on("click", ".btnEliminarEmpresa", function () {
        // variables de id, alias y ubicación de fotos
        var idEmpresa = $(this).attr("idEmpresa");
        var fotoEmpresa = $(this).attr("fotoEmpresa");
        var aliasEmpresa = $(this).attr("aliasEmpresa");

        swal({
            title: '¿Está seguro que desea eliminar esta empresa?',
            text: 'el borrado será de forma permanente',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085D6',
            cancelButtonColor: '#D33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Borrar'
        }).then((result) => {
            if (result.value) {
                // envío de parametros por GET - idEmpresa + fotoEmpresa para eliminiar la empresa 
                window.location = "index.php?ruta=empresas&idEmpresa=" + idEmpresa + "&fotoEmpresa=" + fotoEmpresa + "&aliasEmpresa=" + aliasEmpresa;
            }
        })
    })
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // AJAX método que permite verificar si hay empresas registradas con el mismo alias
    // esto evitará que los directorios de las empresas sean únicos e irrepetibles
    $("#nuevoAlias").change(function () {

        // limpiar mensajes de alerta
        $(".alert").remove();

        var empresa = $(this).val();
        var datos = new FormData();
        datos.append("validarEmpresa", empresa);

        $.ajax({
            url: "ajax/empresas.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                if (respuesta) {
                    // si no encuentra un match, la respuesta vendrá false por lo tanto no hará nada
                    $("#nuevoAlias").parent().after('<div class="alert alert-danger alert-dismissible">Este alias ya existe en la base de datos</div>');
                    $("#nuevoAlias").val("");
                }
            }
        })
    })
    //___________________________________________________________________________________________________________
});
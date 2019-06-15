//___________________________________________________________________________________________________________
// VALIDACIONES

$(document).ready(function () {
    //___________________________________________________________________________________________________________
    // funcion parar validar formulario en Crear empresa opción preventDefault())
    $("#btnCrearEmpresa").click(function (event) {
        // validar Rut con regExp de rut CL empresas
        var nuevoRut = $("#nuevoRut").val();
        expReg = /^(\d{2}\.\d{3}\.\d{3}-)([a-zA-Z]{1}$|\d{1}$)/;
        if (!expReg.test(nuevoRut)) {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">El formato debe ser 77.777.777-7</div>'
            );
        }

        // validar nombre
        var nuevoNombre = $("#nuevoNombre").val();
        expReg = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;
        if (!expReg.test(nuevoNombre)) {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Nombre no puede contener caracteres especiales</div>'
            );
        }

        // validar alias con expReg
        var nuevoAlias = $("#nuevoAlias").val();
        expReg = /^[a-zA-Z0-9]+$/;
        if (!expReg.test(nuevoAlias)) {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">El alias solo debe contener mayusculas y minusculas</div>'
            );
        }

        // validar direccion con expReg
        var nuevaDireccion = $("#nuevaDireccion").val();
        expReg = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;
        if (!expReg.test(nuevaDireccion)) {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Direccion no puede contener caracteres especiales</div>'
            );
        }

        // validar giro con expReg
        var nuevoGiro = $("#nuevoGiro").val();
        expReg = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/;
        if (!expReg.test(nuevoGiro)) {
            event.preventDefault();
            $("#errorValidacion").html(
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
});
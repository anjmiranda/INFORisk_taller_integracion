//___________________________________________________________________________________________________________
// VALIDACIONES

$(document).ready(function () {
    //___________________________________________________________________________________________________________
    // funcion parar validar formulario en incidente opción preventDefault())
    $("#btnCrearIncidente").click(function (event) {
        // validar Titulo con regExp de rut CL empresas
        var nuevoTitulo = $("#nuevoTitulo").val();
        expReg = /^(\d{2}\.\d{3}\.\d{3}-)([a-zA-Z]{1}$|\d{1}$)/;
        if (nuevoTitulo == "") {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Titulo no puede estar vacío</div>'
            );
        } else if (!expReg.test(nuevoTitulo)) {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Titulo no puede poseet caracteres especiales</div>'
            );
        }

        // validar comentarios
        var nuevoComentario = $("#comentariosIncidente").val();
        expReg = /^(\d{2}\.\d{3}\.\d{3}-)([a-zA-Z]{1}$|\d{1}$)/;
        if (nuevoComentario == "") {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Comentarios no pueden estar vacíos</div>'
            );
        } else if (!expReg.test(nuevoComentario)) {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Comentarios no puede contener caracteres especiales</div>'
            );
        }
    });
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    // funcion parar validar formulario en Crear incidente opción preventDefault())
    $("#btnEditarIncidente").click(function (event) {
        // validar Titulo con regExp de rut CL empresas
        var editarTitulo = $("#editarTitulo").val();
        expReg = /^(\d{2}\.\d{3}\.\d{3}-)([a-zA-Z]{1}$|\d{1}$)/;
        if (editarTitulo == "") {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Titulo no puede estar vacío</div>'
            );
        } else if (!expReg.test(editarTitulo)) {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Titulo no puede poseet caracteres especiales</div>'
            );
        }

        // validar comentarios
        var editarComentario = $("#editarComentario").val();
        expReg = /^(\d{2}\.\d{3}\.\d{3}-)([a-zA-Z]{1}$|\d{1}$)/;
        if (editarComentario == "") {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Comentarios no pueden estar vacíos</div>'
            );
        } else if (!expReg.test(editarComentario)) {
            event.preventDefault();
            $("#errorValidacion").html(
                '<div class="alert alert-danger alert-dismissible">Comentarios no puede contener caracteres especiales</div>'
            );
        }
    });
    //___________________________________________________________________________________________________________
    // AJAX
    //___________________________________________________________________________________________________________
    // funcion ajax que permite mostrar los datos desde una BBDD al modal de forma dinámica
    $(document).on("click", ".btnEditarIncidente", function () {
        var idIncidente = $(this).attr("idIncidente");
        var datos = new FormData();
        datos.append("idIncidente", idIncidente);
        $.ajax({
            url: "ajax/incidentes.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                // procesamiento de los datos que vienen de la BBDD
                $("#editarTitulo").val(respuesta["titulo_registro_incidente"]);
                $("#editarTipoIncidente").val(respuesta["tipo_registro_incidente_fk"]);
                $("#editarAfectado").val(respuesta["afectado_registro_incidentes_fk"]);
                $("#editarComentario").val(respuesta["comentarios_registro_incidente"]);
                $("#idActual").val(respuesta["id_registro_incidente"]);
            }
        });
    });
    //___________________________________________________________________________________________________________

    //___________________________________________________________________________________________________________
    //  método que permite eliminar incidente
    $(document).on("click", ".btnEliminarIncidente", function () {
        // variables de id
        var idIncidente = $(this).attr("idIncidente");

        swal({
            title: '¿Está seguro que desea eliminar este incidente?',
            text: 'el borrado será de forma permanente',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085D6',
            cancelButtonColor: '#D33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Borrar'
        }).then((result) => {
            if (result.value) {
                // envío de parametros por GET - idIncidente 
                window.location = "index.php?ruta=incidente&idIncidente=" + idIncidente;
            }
        })
    })
    //___________________________________________________________________________________________________________
});
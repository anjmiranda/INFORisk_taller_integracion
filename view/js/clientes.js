//_____________________________________________________________________________________________________________
// VALIDACIONES
$(document).ready(function () {
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
});
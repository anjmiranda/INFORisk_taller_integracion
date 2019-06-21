$(document).ready(function(){
    var idUsuario = 10;

    $("#idUsuario").change(function(){
        //debugger;
        idUsuario = $("#idUsuario").val()
        var datos = new FormData();
        datos.append("idUsuario", idUsuario);

        $.ajax({
            url: "ajax/archivos.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta){
                console.log(respuesta);
            }
        });
    })


});
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
                //console.log(respuesta);
                //debugger;

                $.each( respuesta, function( llave, objeto ) {
                    //console.log(llave + ": " + respuesta[llave]["id_registro"]);
                    if(objeto['ubicacion_archivo'] == null){
                        $('.descargar'+llave).addClass('disabled');
                        $('.modificar'+llave).addClass('disabled');
                        $('.eliminar'+llave).addClass('disabled');
                    }else{
                        $('.cargar'+llave).addClass('disabled');
                    }
                });

                
                
            }
        });
    })


});
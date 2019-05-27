<?php
  // variables de sesión
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" type="text/css" href="view/componentes/css/estilo.css">
  <title>Inicio InfoRISK</title>
  <!-- Bootstrap core CSS -->
  <!--<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
  <link href="view/componentes/css/bootstrap.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="view/componentes/css/simple-sidebar.css" rel="stylesheet">
  <!-- DATATABLES -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>
  <?php
    // validación de inicio se sesión
    if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){
      // wrapper
      echo '<div class="d-flex" id="wrapper">';

      // aside o lateral
      include "modulos/aside.php";

      // contenido del sitio
      echo '<div id="page-content-wrapper">';

      // header del sitio
      include "modulos/header.php";

      // delivery del contenido del sitio según la url amigable
      if(isset($_GET["ruta"])){
        if($_GET["ruta"] == "inicio"      ||
           $_GET["ruta"] == "usuarios"    ||
           $_GET["ruta"] == "salir"    )
        {
          include "modulos/".$_GET["ruta"].".php"; // se concatena la variable
        }else{
          // si la ruta no coincide con ninguno que está en el módulo, se retorna un 404
          include "modulos/404.php";
        }
      }else{
        // si no retorna algo, se entiende que es primera visita
        include "modulos/inicio.php";
      }

      // cerrar contenido
      echo '</div>';

      // cerrar lateral
      echo '</div>';
    }else{
      include "modulos/login.php";
    }
  ?>

  <!-- Bootstrap core JavaScript -->
  <script src="view/componentes/jquery/jquery.js"></script>
  <script src="view/componentes/js/bootstrap.bundle.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <!-- SweetAlert 2 -->
  <script src="view/componentes/sweetalert2/sweetalert2.all.js"></script>
  <!-- JS modulos -->  
  <script src="view/js/usuarios.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    $(document).ready(function() {
      $('#tablaUser').DataTable();
    });
  </script>

</body>

</html>
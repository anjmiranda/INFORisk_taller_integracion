<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="stylesheet" type="text/css" href="css/estilo.css">

  <title>Principal</title>

  <!-- Bootstrap core CSS -->
  <!--<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
  <link href="css/bootstrap.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

  <!-- DATATABLES -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">MENU</div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Usuarios</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Documentos</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Clientes</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Email</a>
        <a href="#" class="list-group-item list-group-item-action bg-light"></a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <!--<button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>-->
        <img src="images/menu-icono.png" alt="" class="btn " id="menu-toggle" />

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                USUARIO
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">User:</a>
                <a class="dropdown-item" href="#">Nombre:</a>
                <a class="dropdown-item" href="#">Tipo:</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Salir</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid contenedor">
        <h1 class="mt-4">Email</h1>
        <hr>
        <div class="contEmail">
          <form id="form1" >
            <h1>hello! motherfucker</h1>
            <div>
              <label class="label" > Remitente: </label>
              <input type="text" name="email" id="userEmail" disabled="" placeholder="ejemplo@email.cl" >
            </div>
            <div>
              <label class="label" > Para: </label>
              <input type="email" name="destinatario" id="destinatario" >
            </div>
            <div>
              <label class="label" id="documentos" > Documentos: </label>
              <select class="selectpicker" data-live-search="" data-style="btn-info">
                <option data-tokens="ketchup mustard">-Seleccione trabajador-</option>
                <option data-tokens="mustard">Hambuerguesa</option>
                <option data-tokens="frosting">Pollo con papas fritas</option>
              </select>
            </div>
            <div>
              <label class="label" id="mensaje" > Mensaje: </label>
              <label class="labelcomment" ><textarea id="mensaje" ></textarea></label>
            </div>
            <div class="boton" >
              <button type="button" class="btn btn-secondary">Enviar</button>
              <button type="button" class="btn btn-secondary">Cancelar</button>
            </div>
          </form>   
      </div>

        
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="view/jquery/jquery.js"></script>
  <script src="view/js/bootstrap.bundle.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>

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
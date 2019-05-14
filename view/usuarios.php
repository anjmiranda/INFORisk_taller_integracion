<!DOCTYPE html>
<html>
<head>
	<title>USUARIOS</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="../css/estilo.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!-- DATATABLES -->
  <!--<link rel="stylesheet" type="text/css" href="../DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.css">-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>  
</head>
<body>
<div>
<header>
	<nav class="navbar navbar-dark " >
  <!-- Navbar content -->
<a href="../index.php" class="">
	<span>INFORisk</span>
</a>
<ul class="nav nav-pills">
<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Usuario</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#one">User: </a>
        <a class="dropdown-item" href="#two">Nombre</a>
        <a class="dropdown-item" href="#three">Tipo</a>
        <div role="separator" class="dropdown-divider"></div>
        <a class="dropdown-item" href="#three">Salir</a>
      </div>
    </li>
</ul>
</nav>
</header>
</div>
<div class="contenedor">
  <hr>
  <button type="button" class="btn btn-success">Agregar</button>
</div>
<div class="tabla" >
  <table id="tablaUser" class="display" style="width:100%">  
    <thead>
      <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>DIRECCIÓN</th>
        <th>TELÉFONO</th>
        <th>EMAIL</th>
        <th>MODIFICAR</th>
        <th>ELIMINAR</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>hola</td>
        <td>hola2</td>
        <td>hola3</td>
        <td>hola4</td>
        <td>hola5</td>
        <td><button type="button" class="btn btn-warning">Modificar</button></td>
        <td><button type="button" class="btn btn-danger">Eliminar</button></td>
      </tr>
      <tr>
        <td>hola</td>
        <td>hola2</td>
        <td>hola3</td>
        <td>hola4</td>
        <td>hola5</td>
        <td><button type="button" class="btn btn-warning">Modificar</button></td>
        <td><button type="button" class="btn btn-danger">Eliminar</button></td>
      </tr>
      <?php
      //require("usuarios.controller.php");

      ?>
    </tbody>
  </table>
 <script type="text/javascript">
  $(document).ready(function() {
    $('#tablaUser').DataTable();
  }); 
</script>
</div>
<div>
  <hr>
</div>
</body>
</html>
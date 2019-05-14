<!DOCTYPE html>
<html>
<head>
	<title>ejemplo inforisk</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/estilo.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<header>
	<nav class="navbar navbar-dark " >
  <!-- Navbar content -->
<a href="index.php" class="">
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
<div class="d-flex" id="wrapper" >
	<!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"> MENU </div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="view/usuarios.php" class="list-group-item list-group-item-action bg-light">Usuarios</a>
        <a href="view/documentos.php" class="list-group-item list-group-item-action bg-light">Documentos</a>
        <a href="view/clientes.php" class="list-group-item list-group-item-action bg-light">Clientes</a>
        <a href="view/email.php" class="list-group-item list-group-item-action bg-light">Email</a>
        <a href="#" class="list-group-item list-group-item-action bg-light"></a>
      </div>
    </div>
</div>
<!--
<aside>
    <section class="col-md-3 hidden-xs hidden-sm">
    	<div class="list-group">
        <ul class="sidebar-menu">
            <li>
                <a href="inicio">
                    <i class="fa fa-home"></i>
                    <span>Dashboard-inicio</span>
                </a>
            </li>
            <li>
                <a href="usuarios">
                    <i class="fa fa-user"></i>
                    <span>Usuarios</span>
                </a>
            </li>
            <li>
                <a href="proyectos">
                    <i class="fa fa-th"></i>
                    <span>Documentos</span>
                </a>
            </li>
            <li>
                <a href="productos">
                    <i class="fa fa-product-hunt"></i>
                    <span>Clientes</span>
                </a>
            </li>
            <li>
                <a href="clientes">
                    <i class="fa fa-users"></i>
                    <span>Email</span>
                </a>
            </li>
        </ul>
        </div>
    </section>
</aside>-->
</body>
</html>
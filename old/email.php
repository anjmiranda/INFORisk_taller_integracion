<!DOCTYPE html>
<html>
<head>
	<title>USUARIOS</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/estilo.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!-- DATATABLES -->
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
<div class="contEmail" >
	<hr>
  <form id="form1" >
  	<h1>hello! motherfucker</h1>
  	<div>
  		<label class="label" > Remitente: </label>
  		<input type="text" name="email" id="userEmail" >
  	</div>
  	<div>
  		<label class="label" > Para: </label>
  		<input type="email" name="destinatario" id="destinatario" >
  	</div>
  	<div>
  		<label class="label" id="documentos" > Documentos: </label>
  		<select>
  		<option>--Seleccione--</option>
  		<option>...</option>
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
</body>
</html>

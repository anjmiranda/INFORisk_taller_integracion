<!-- Barra de navegación -->
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
                    <a class="dropdown-item">Usuario: <?php echo $_SESSION["usuario"]; ?></a>
                    <a class="dropdown-item">Nombre: <?php echo $_SESSION["nombre"]; ?></a>
                    <a class="dropdown-item">Último inicio: <?php echo $_SESSION["ultimo_log"]; ?></a>
                    <a class="dropdown-item" href="salir">Salir</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
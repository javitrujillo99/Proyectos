<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="navbar-toggler logoPequeño">
        <a class="navbar-brand" href="index.php"><img class="logo" src="images/iconos/Momazos_Logo_Completo.png" alt="Logo de MOMAZOS y ya"></a>
    </div>
    <button class="navbar-toggler btn btn-primary" type="button" data-toggle="collapse"
            data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand d-none d-md-block" href="index.php"><img class="logo"
        src="images/iconos/Momazos_Logo_Completo.png" alt="Ir a pagina principal de MOMAZOS tu web de memes"></a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <?php
            if (isset($_SESSION['usuario']) &&
                ($_SESSION['usuario'][0]->rol == "administrador" || $_SESSION['usuario'][0]->rol == "editor")) {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="subirMeme.php">Añadir contenido</a>
                </li>
                <?php
            }
            ?>
            <li class="nav-item">
                <a class="nav-link" href="categorias.php">Categorias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="aleatorio.php">Aleatorio</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Más
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="herramientasYTutoriales.php">Herramientas y tutoriales</a>
                    <a class="dropdown-item" href="NoticiasMemables.php">Noticias "memables"</a>
                    <a class="dropdown-item" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Juegos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                        <a class="dropdown-item" href="juegoPedro.php">Digimon</a>
                        <a class="dropdown-item" href="juegoAlberto.php">Emparejados</a>
                        <a class="dropdown-item" href="juegoJavi.php">3 en raya</a>
                        <a class="dropdown-item" href="juegoAntonio.php">Pong</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Información
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="contacta.php">Contacta con nosotros</a>
                    <a class="dropdown-item" href="quienessomos.php">Quienes somos</a>
                    <a class="dropdown-item" href="terminos.php">Terminos legales</a>
                </div>
            </li>
        </ul>
        <?php
        if (isset($_SESSION['usuario'])) {
            ?>
            <form action="logout.php" class="form-inline my-2 my-lg-0 miCuenta">
                <!--<button class="btn btn-outline-primary my-2 my-sm-0 login" type="submit">Log out</button>-->
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a id="logout" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLinkUsuario" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['usuario'][0]->nombre; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="micuenta.php">Mi cuenta</a>
                            <a class="dropdown-item" onclick="signOut();" href="logout.php">Cerrar sesión</a>
                        </div>
                    </li>
                </ul>
            </form>
            <?php
        } else {
            ?>
            <form action="login.php" class="form-inline my-2 my-lg-0">
                <button class="btn btn-outline-primary  my-2 my-sm-0 login" id="usuario" type="submit">Log in</button>
            </form>
            <?php
        }
        ?>
    </div>
</nav>
<script>startApp();</script>
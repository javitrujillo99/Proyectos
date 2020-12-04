<?php
session_start();
require_once("funciones/categorias/funciones_categorias.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
<?php include("includes/navigation.php"); ?>
<div class="container">
    <div class="row content">
        <div class="col-12">
            <h2 class="aside-title">CATEGORIAS</h2>
            <form action="" method="POST">
                <?php
                $categorias = getCategorias();
                foreach ($categorias as $c) {
                    ?>
                    <a href="aleatorio.php?id_cat=<?php echo $c->id; ?>">
                        <div class=row id="linea">
                            <div class="col-2"><img src="images/iconos/categorias/<?php echo $c->logo; ?>" width="50" alt="icono"></i></button>
                            </div>
                            <div class="col-10 my-auto"><?php echo $c->nombre ?></div>
                        </div>
                    </a>
                    <?php
                }
                ?>
                <!--
                <a href="aleatorio.php">
                    <div class=row id="linea">
                        <div class="col-2"><img src="images/iconos/categorias/gamers.png" width="50"></i></button></div>
                        <div class="col-10 my-auto">Gamers</div>
                    </div>
                </a>
                <a href="aleatorio.php">
                    <div class=row id="linea">
                        <div class="col-2"><img src="images/iconos/categorias/programing.png" width="50"></i></button></div>
                        <div class="col-10 my-auto">Informaticos</div>
                    </div>
                </a>
                <a href="aleatorio.php">
                    <div class=row id="linea">
                        <div class="col-2"><img src="images/iconos/categorias/films.png" width="50"></i></button></div>
                        <div class="col-10 my-auto">Peliculas</div>
                    </div>
                </a>
                <a href="aleatorio.php">
                    <div class=row id="linea">
                        <div class="col-2"><img src="images/iconos/categorias/alcohol.png" width="50"></i></button></div>
                        <div class="col-10 my-auto">Borracheras</div>
                    </div>
                </a>
                <a href="aleatorio.php">
                    <div class=row id="linea">
                        <div class="col-2"><img src="images/iconos/categorias/tortuga.png" width="50"></i></button></div>
                        <div class="col-10 my-auto">Dibujos animados</div>
                    </div>
                </a>
                -->
        </div>
    </div>
</div>
<div class="footer text-center">
    <p>&copy; <?php print date("Y"); ?> <a href="https://iesmarquesdecomares.org/"> IES Marqués de Comares.</a></p>
</div>
</body>
</html>
<?php
session_start();
include "funciones/contenido/funciones_contenido.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>
<body>
<?php include("includes/navigation.php"); ?>
<div class="container">
    <div class="fixed-bottom text-right">
        <a href="index.php">
            <button type="button" class="btn btn-circle btn-xl"><i class="fa fa-caret-left"></i>
            </button>
        </a>
    </div>
    <div class="row content">
        <div class="col-10 aside">
            <?php
            $memeSemana = getcontenidoSemana();
            ?>
            <a class="enlaceAMeme" href="meme.php?id=<?php echo $memeSemana->id ?>">
                <h3 class="aside-title">Meme de la semana</h3>
                <img src="images/memes/<?php echo $memeSemana->imagen?>" alt="Sample Image" class="item-image"/>
                <div class="row">
                    <div class="col text-right">
                        <a class="fuente" href="<?php echo $memeSemana->fuente ?>">Fuente: <?php echo $memeSemana->fuente?></a>
                    </div>
                </div>
                <p>Este meme se ha merecido el galardón a meme de la semana tras ser el más votado
                por nuestros visitantes. ¡Enhorabuena al creador!</p>
            </a>
        </div>
        <div class="col-10 aside">
            <h3 class="aside-title">Ranking de usuarios</h3>
            <ol class="text-center">
                <li id="primero">Pedro</li>
                <li id="segundo">Alberto</li>
                <li id="tercero">Trujillo</li>
                <li>Cobos</li>
                <li>Alberto</li>
                <li>Carlos</li>
            </ol>
        </div>
        <div class="col-10 aside">
            <p>&copy; <?php print date("Y"); ?> <a href="https://iesmarquesdecomares.org/"> IES Marqués de Comares.</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>
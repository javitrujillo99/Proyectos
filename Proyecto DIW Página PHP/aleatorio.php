<?php
session_start();
include("funciones/contenido/funciones_contenido.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>
<body>
<?php include("includes/navigation.php"); ?>
<div class="container">
    <div class="row">
        <div class="col memes">
            <div class="row">
                <?php
                if (isset($_GET['id_cat'])){
                    $contenido = getContenidoAleatorioCategorias($_GET['id_cat']);
                }else{
                    $contenido = getContenidoAleatorio();
                }
                foreach ($contenido as $c){
                    ?>
                    <div class="col-md-5">
                        <div class="card m-20">
                            <a class="enlaceAMeme" href="meme.php?id=<?php echo $c->id ?>">
                                <img src="images/memes/<?php echo $c->imagen;?>" alt="<?php echo $c->descripcion; ?>" class="card-image m-20"/>
                                <div class="row">
                                    <div class="col text-left">
                                        <div class="fuente">Fuente: <?php echo $c->fuente; ?></div>
                                    </div>
                                </div>
                                <p class="card-content"><?php echo $c->descripcion; ?></p>
                            </a>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>
</div>
</body>
</html>
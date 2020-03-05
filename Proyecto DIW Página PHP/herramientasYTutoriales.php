<?php
session_start();
include("funciones/Conexion.php");

if (isset($_POST['enviar']) && isset($_SESSION['usuario'])){
    $usuario = $_SESSION['usuario'][0]->id;
    $comentario = $_POST['comentario'];
    $c = new Conexion();
    $resultado = $c->query("INSERT INTO `tcomentarios` (`id`, `id_usuario`, `comentario`) VALUES (NULL, $usuario, '$comentario')");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("includes/head-tag-contents.php"); ?>
    <script src="js/video.js"></script>
    <style>
        #imagen2 {
            width: 630px;
            height: 370px; }
    </style>
</head>
<body>
<?php include("includes/navigation.php"); ?>
<div class="container">
    <h1>Herramientas y Tutoriales</h1>
    <a href="masComentarios.php">
        <span class="enlace">Cuéntanos cómo haces tú los memes.</span>
    </a>
    <div class="row">
        <div class="col-sm-8">
            <div class="row" id="columna">
                <h4>¿Cómo hacer memes?</h4>
                <img src="images/herramientasYTutoriales/Captura.PNG" width="500" alt="Como hacer memes" class="item-image"/>
                <p>Existen páginas como por ejemplo <a href="https://imgur.com/memegen/create/nTxcG3I">Imgur</a> en
                    las
                    que se puede hacer
                    memes desde plantillas a partir de otros memes, o personalizar otros, siempre sin ser desde 0.
                </p>
                <p>Por supuesto, siempre queda también la opción de hacerlos desde 0 con Photoshop o cualquier otro
                    editor
                    de fotos.</p>
            </div>
            <div class="row" id="columna">
                <h4>Tutorial de hacer memes</h4>
                <div id="video-container">
                    <!-- Video -->
                    <video id="video">
                        <source src="videos/ComoHacerMemesFacilmente_1.webm" type="video/webm">
                        <source src="videos/ComoHacerMemesFacilmente.ogv" type="video/ogv">
                        <source src="videos/ComoHacerMemesFacilmente.mp4" type="video/mp4">
                        <p>
                            Your browser doesn't support HTML5 video.
                            <a href="videos/ComoHacerMemesFacilmente.mp4">Download</a> the video instead.
                        </p>
                    </video>
                    <!-- Video Controls -->
                    <div class="row" id="video-controls">
                        <div class="col-l-1">
                            <button type="button" id="play-pause" class="play">Play</button>
                        </div>
                        <div class="col-l-7">
                            <label for="seek-bar" style="display:none">Barra de video</label>
                            <input type="range" id="seek-bar" value="0">
                        </div>
                        <div class="col-l-1">
                            <button type="button" id="mute">Mute</button>
                        </div>
                        <div class="col-l-2">
                            <label for="volume-bar" style="display:none">Barra de volumen</label>
                            <input type="range" id="volume-bar" min="0" max="1" step="0.1" value="1">
                        </div>
                        <div class="col-l-1">
                            <button type="button" id="full-screen">Full</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="columna">
                <h4>Facebook saca su propia herramienta para crear memes</h4>
                <img id="imagen2" src="images/herramientasYTutoriales/face.png" alt="Imagen facebook">
                   <p>Facebook ha sacado su propio editor de memes. <a href="https://www.20minutos.es/noticia/4102092/0/facebook-se-fija-en-los-memes-y-prueba-una-app-propia-para-disenarlos/">Link de la noticia...</a></p>
            </div>
           
            <div class="row" id="columna">
                <h4>Memes con Photoshop</h4>
                    <img id="imagen2" src="images/herramientasYTutoriales/photo.jpg" alt="Memes con PhotoShop">
                <p>Siempre está la opción de crear los memes desde 0 sin ningún tipo de aplicación asistente para hacer memes.
                </p>
            </div>
            <div class="row" id="columna">
                <h4>Memes con APKs</h4>
                <img src="images/herramientasYTutoriales/meme.jpeg" width="500" alt="Sample Image" class="item-image"/>
                <p>Aparte de creadores de memes online, también se pueden crear memes mediante aplicaciones para móvil u ordenador descargables.
                Una de la más famosas es Meme Generator Free.
                <a href="https://meme-generator-free.uptodown.com/android">Enlace para Android...</a>
                </p>
            </div>
        </div>
        <div class="col-sm-4" id="derecha">
            <h3>Coméntanos cómo haces tú los memes</h3>
            <form action="" method="post">
            <label for="comentario" style="display:none">Comentario</label>
            <textarea placeholder="Deja tu comentario aquí..." name="comentario" id="comentario" required></textarea>
            <input type="submit" name="enviar" value="Comentar">
            </form>
            <hr class="linea">
            <p id="pie">
            <?php 
            if (isset($_SESSION['usuario']) && $_SESSION['usuario'][0]->rol == 'administrador') {
                ?>
                <a href="t_comentarios.php">Más comentarios...</a>
                <?php
            }
            ?>
            </p>
        </div>
    </div>
</div>
<div class="footer text-center">
    <p>&copy; <?php print date("Y"); ?> <a href="https://iesmarquesdecomares.org/"> IES Marqués de Comares.</a></p>
    <a href="javascript:void(0);" id="scroll" title="Scroll to Top" style="display: none;">Top<span></span></a>
</div>
</body>
</html>
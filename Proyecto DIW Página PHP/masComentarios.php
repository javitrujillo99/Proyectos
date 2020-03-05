<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("includes/head-tag-contents.php");?>
</head>
<body>
<?php include("includes/navigation.php");?>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>Coméntanos cómo haces tú los memes</h1>
                <h2>AQUI IRIAN TODOS LOS COMENTARIOS</h2>
                <textarea placeholder="Deja tu comentario aquí..." rows="2" cols="130"></textarea>
                <input type="submit" name="enviar" value="Comentar">
            </div>
        </div>
    </div>
</body>
</html>
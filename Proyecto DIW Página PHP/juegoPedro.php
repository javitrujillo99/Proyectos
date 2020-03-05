<?php
session_start();
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
        <div class="col text-center mt-2">
            <h2>Digimon (Pedro Serrano Pacheco)</h2>
            <h3>Se habra acabado el curso y todavia no lo habra subido xDDD</h3>
            <canvas id="canvas">
                Your browser doesn't support Canvas, try another or update
            </canvas>
        </div>
    </div>
    <div class="row">
        <div class="col text-right">
            <input class="btn btn-pong" type="button" id="1" name="1" value="1 Jugador">
        </div>
        <div class="col">
            <input class="btn btn-pong" type="button" id="2" name="2" value="2 Jugadores">
        </div>
    </div>
</div>
<script src="js/pong-script.js"></script>
<div class="footer text-center">
    <p>&copy; <?php print date("Y"); ?> <a href="https://iesmarquesdecomares.org/"> IES Marqués de Comares.</a></p>
</div>
</body>
</html>
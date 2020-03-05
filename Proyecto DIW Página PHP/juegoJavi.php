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
            <h2>3 EN RAYA (Francisco Javier Trujillo Muñoz)</h2>
            <canvas id="miCanvasJavi"></canvas>
        </div>
    </div>
</div>
<script src="js/juegoJavi.js"></script>
<div class="footer text-center">
    <p>&copy; <?php print date("Y"); ?> <a href="https://iesmarquesdecomares.org/"> IES Marqués de Comares.</a></p>
</div>
</body>
</html>
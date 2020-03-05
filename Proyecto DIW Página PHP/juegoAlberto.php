<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("includes/head-tag-contents.php"); ?>
	
	<meta charset="UTF-8">
	<title>Juego Alberto</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

	<link rel='stylesheet' href='./css/style_JuegoAlberto.css'>

</head>
<body>
<?php include("includes/navigation.php"); ?>


<!-- partial:index.partial.html -->
<div class="wrap">
<div class="game"></div>
	
	<div class="modal-overlay">
		<div class="modal">
			<h2 class="winner">¡¡¡Has Ganado!!!</h2>
			<button class="restart">Reiniciar Juego</button>
		</div>
	</div>
	
  </div>
  <script src="js/juegoAlberto.js"></script>


<div class="footer text-center">
    <p>&copy; <?php print date("Y"); ?> <a href="https://iesmarquesdecomares.org/"> IES Marqués de Comares.</a></p>
</div>
</body>
</html>


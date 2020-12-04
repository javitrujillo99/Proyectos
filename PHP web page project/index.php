<?php
session_start();
if( isset($_POST['novedades'])){
    setcookie('novedades',"algo",time() + 2629800);
    header('Location:index.php');}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>
<body>

<?php include("includes/navigation.php"); ?>
<?php include("content.php"); ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
<script>
    window.cookieconsent.initialise({
        "palette": {
            "popup": {
                "background": "black"
            },
            "button": {
                "background": "#2b33eb"

            }
        },
        "position": "bottom-right",
        "content": {
            "message": "Esta web utiliza cookies para mejorar su experiencia de usuario, si sigues navegando será como si las hubieras aceptado ;D",
            "dismiss": "Seguir navegando",
            "link": "Saber más"
        }
    });
</script>
</html>
<script src="js/login-google.js"></script>
<?php
session_start();

//  Redirige a la pagina principal si entras con la URL de manera directa
if (!isset($_SESSION["usuario"])) {    
    header('location:login.php');
}
?>
<?php
echo 'Cerrando sesion ...';
session_unset();
session_destroy();
setcookie(session_name(), $_COOKIE[session_name()], time() - 13600);
header('location:index.php');

?>
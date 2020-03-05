<?php
include "../Conexion.php";

$conexion = new Conexion();
$datos = [];

$usuario=$_GET['usuario'];
//$resultado=mysqli_query($conexion,"select * from usuario where id=$usuario");
$resultado = $conexion->query("select * from usuario where id=$usuario");
if ($objeto = $resultado->fetch(PDO::FETCH_OBJ)){
    echo json_encode($objeto);
}
?>
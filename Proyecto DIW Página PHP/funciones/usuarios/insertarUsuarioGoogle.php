<?php
session_start();
include "../Conexion.php";
include "funciones_usuario.php";
//ALTA DE UN ALUMNO

//recogemos los datos
$nombre= $_GET['nombre'];
$apellido1= $_GET['apellido1'];
$correo= $_GET['correo'];

//crear conexión a la Bd
$conexion = new Conexion();

// creamos inserción en la BD
if (!passRepetida($correo)){
    $conexion->query("INSERT INTO usuario(nombre, apellido1, correo, rol) values('$nombre','$apellido1','$correo','lector')");
}

$usuario = getUsuarioPorEmail($correo);
$_SESSION['usuario'] = $usuario;
?>
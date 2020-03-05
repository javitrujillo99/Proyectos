<?php
require_once("funciones/Conexion.php");

function registrar($username, $password, $correo) {
    $c = new Conexion();
    $c->query("INSERT INTO usuario(username, password, correo, rol) VALUES ('$username', '$password', '$correo', 'lector')");
}
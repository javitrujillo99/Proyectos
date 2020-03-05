<?php
require_once("funciones/Conexion.php");

function getCategorias(){
    $categorias = [];
    $c = new Conexion();
    $resultado = $c->query("SELECT * FROM categoria");
    while ($objeto = $resultado->fetch(PDO::FETCH_OBJ)) {
        $categorias[] = $objeto;
    }
    return $categorias;
}



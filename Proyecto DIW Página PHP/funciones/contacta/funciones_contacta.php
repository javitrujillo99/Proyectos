<?php
require_once("funciones/Conexion.php");
/**
 * Created by PhpStorm.
 * User: root
 * Date: 14/01/20
 * Time: 14:44
 */


 /**
 * @param $id del contenido
 * @return mixed|null Objeto o nulo dependiendo si existe o no
 */

 // Añade el formulario contacta a la base de datos
function addContacta($nombre, $email, $asunto, $comentario) {
    $c = new Conexion();
    $c->query("INSERT INTO contacta(nombre, email, asunto, comentario) VALUES ('$nombre', '$email', '$asunto', '$comentario')");
}

// Obtiene los comentarios de Contacta
function getContacta() {
    $contacta = [];
    $c = new Conexion();
    $resultado = $c->query("SELECT * FROM contacta");

    while ($objeto = $resultado->fetch(PDO::FETCH_OBJ)) {
        $contacta[] = $objeto;
    }
    return $contacta;
}
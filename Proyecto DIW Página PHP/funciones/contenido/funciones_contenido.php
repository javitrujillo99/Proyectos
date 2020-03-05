<?php
require_once("funciones/Conexion.php");

/**
 * @return array Con el contenido ordenado con el ultimo primero
 */
function getContenidoLast()
{
    $c = new Conexion();
    $resultado = $c->query("SELECT * FROM contenido ORDER BY id desc LIMIT 10");
    while ($objeto = $resultado->fetch(PDO::FETCH_OBJ)) {
        $contenido[] = $objeto;
    }
    return $contenido;
}

/**
 * @return array Con el contenido de manera aleatoria cada llamada
 */
function getContenidoAleatorio()
{
    $c = new Conexion();
    $resultado = $c->query("SELECT * FROM contenido ORDER BY RAND() LIMIT 10");
    while ($objeto = $resultado->fetch(PDO::FETCH_OBJ)) {
        $contenido[] = $objeto;
    }
    return $contenido;
}

/**
 * @return array Con el contenido de manera aleatoria cada llamada
 */
function getContenidoAleatorioCategorias($categoria)
{
    $c = new Conexion();
    $resultado = $c->query("SELECT * FROM contenido WHERE categoria=$categoria ORDER BY RAND() LIMIT 10");
    while ($objeto = $resultado->fetch(PDO::FETCH_OBJ)) {
        $contenido[] = $objeto;
    }
    return $contenido;
}

/**
 * @param $id del contenido
 * @return mixed|null Objeto o nulo dependiendo si existe o no
 */
function getContenidoId($id)
{
    $c = new Conexion();
    $resultado = $c->query("SELECT * FROM contenido where id=$id");
    if ($objeto = $resultado->fetch(PDO::FETCH_OBJ)) {
       return $objeto;
    }else{
        return null;
    }
}

/**
 * @return mixed|null Objeto o nulo dependiendo si existe o no
 */
function getcontenidoSemana(){
    $c = new Conexion();
    $resultado = $c->query("SELECT * FROM contenido, configuracion where configuracion.campo='meme_semana' and configuracion.valor=contenido.id");
    if ($objeto = $resultado->fetch(PDO::FETCH_OBJ)) {
        return $objeto;
    }else{
        return null;
    }
}

function addContenido($id_usuario, $descripcion, $imagen, $fuente, $categoria) {
    $c = new Conexion();
    $c->query("INSERT INTO contenido(id_usuario, descripcion, imagen, fuente, categoria) VALUES ($id_usuario, '$descripcion', '$imagen', '$fuente', $categoria)");
}

function nuevoMemeSemana($id){
    try {
        $c = new Conexion();
        $c->exec("UPDATE configuracion SET valor=$id WHERE campo='meme_semana'");
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

function borrarMeme($id){
    try {
        $c = new Conexion();
        $c->exec("DELETE FROM valoracion WHERE id_contenido=$id");
        $c->exec("DELETE FROM valoracion_mg WHERE id_contenido=$id");
        $c->exec("DELETE FROM contenido WHERE id=$id");
        return true;
    } catch (PDOException $e) {
        return false;
    }
}
function getIdPorPublicaciones($publicaciones) {
    try {
        $c = new Conexion();
        $numero = null;
        $resultado = $c->query("SELECT id_usuario FROM contenido HAVING COUNT(id_usuario) > $publicaciones");
        if ($objeto = $resultado->fetch(PDO::FETCH_OBJ)) {
            return $objeto->id_usuario;
        }
    } catch (PDOException $e) {
        return false;
    }
}

function getPublicacionesPorUsuario($id_usuario) {
    $c = new Conexion();
    $numero = null;
    $resultado = $c->query("SELECT COUNT(*) contador, id_usuario FROM contenido WHERE id_usuario = $id_usuario");
    if ($objeto = $resultado->fetch(PDO::FETCH_OBJ)) {
        return $objeto;
    }
    else {
        return null;
    }
}
function novedades(){

}
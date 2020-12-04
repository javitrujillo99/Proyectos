<?php
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

 /*
function getValoracionId($id) {
    $c = new Conexion();
    $resultado = $c->query("SELECT val.id, val.comentario, usu.username FROM valoracion val, usuario usu where val.id_usuario=usu.id && val.id_contenido=$id");


    if ($objeto = $resultado->fetch(PDO::FETCH_OBJ)) {
       return $objeto;
    }
    else{
        return null;
    }
    
}
*/

// Obtiene todos los comentarios de los usuarios que ha comentado el meme
function getValoracionId($id) {
    $valoraciones = [];
    $c = new Conexion();
    $resultado = $c->query("SELECT val.id, val.comentario, usu.username FROM valoracion val, usuario usu where val.id_usuario=usu.id && val.id_contenido=$id order by val.id desc");

    while ($objeto = $resultado->fetch(PDO::FETCH_OBJ)) {
        $valoraciones[] = $objeto;
    }
    return $valoraciones;
}

// Obtiene todos los megustas que tiene este meme en total
function getTotalMeGustas($id) {
    $c = new Conexion();
    $resultado = $c->query("SELECT SUM(megusta) FROM valoracion_mg where id_contenido=$id && megusta=1");

    if ($objeto = $resultado->fetch(PDO::FETCH_OBJ)) {
       return $objeto;
    }
    else{
        return 0;
    }   
}


// Obtiene si este usuario ha dado megusta o no_megusta al meme
function getMeGustaId($id, $id_usuario) {
    $c = new Conexion();
    $resultado = $c->query("SELECT val_mg.megusta FROM valoracion_mg val_mg, usuario usu where val_mg.id_usuario=usu.id && val_mg.id_contenido=$id && val_mg.id_usuario=$id_usuario");

    if ($objeto = $resultado->fetch(PDO::FETCH_OBJ)) {
       return $objeto;
    }
    else{
        return null;
    }   
}

// Crearan un registro megusta para el usuario si no existe ninguno
function setMeGustaId($id, $id_usuario, $valor_megusta) {
    $c = new Conexion();
    $resultado = $c->query("INSERT INTO valoracion_mg  (`id`, `id_usuario`, `id_contenido`, `megusta`) VALUES (NULL, $id_usuario, $id, $valor_megusta)");
}

// Cambia de estado de megusta a no_megusta y viceversa segun lo desee el usuario
function updateMeGustaId($id, $id_usuario, $valor_megusta) {
    $c = new Conexion();
    $resultado = $c->query("UPDATE valoracion_mg val_mg, usuario usu SET val_mg.megusta = $valor_megusta where val_mg.id_usuario=usu.id && val_mg.id_contenido=$id && val_mg.id_usuario=$id_usuario");
}

// Añade el comentario del usuario a la base de datos
function addValoracion($id_usuario, $id_contenido, $comentario) {
    $c = new Conexion();
    $c->query("INSERT INTO valoracion(id_usuario, id_contenido, comentario) VALUES ($id_usuario, '$id_contenido', '$comentario')");
}

// Elimina el comentario del usuario de la base de datos
function delValoracion($id_comentario){
    try {
        $c = new Conexion();
        $c->exec("DELETE FROM valoracion WHERE id=$id_comentario");
        return true;
    }
    catch (PDOException $e) {
        return false;
    }
}



// Obtiene si este usuario ha dado megusta o no_megusta al meme
function getN_Comentario() {
    $n_comentarios = [];
    $c = new Conexion();
    $resultado = $c->query("SELECT * FROM ncomentarios");

    while ($objeto = $resultado->fetch(PDO::FETCH_OBJ)) {
        $n_comentarios[] = $objeto;
    }
    return $n_comentarios;
}

// Obtiene si este usuario ha dado megusta o no_megusta al meme
function getT_Comentario() {
    $t_comentarios = [];
    $c = new Conexion();
    $resultado = $c->query("SELECT * FROM tcomentarios");

    while ($objeto = $resultado->fetch(PDO::FETCH_OBJ)) {
        $t_comentarios[] = $objeto;
    }
    return $t_comentarios;
}

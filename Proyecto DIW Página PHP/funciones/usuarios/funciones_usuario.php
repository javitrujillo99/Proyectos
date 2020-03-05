<?php
//require_once("funciones/Conexion.php");

function getUsuario($id)
{
    $usuarios = null;
    $c = new Conexion();
    $resultado = $c->query("SELECT * FROM usuario where id=$id");
    while ($objeto = $resultado->fetch(PDO::FETCH_OBJ)) {
        $usuarios = $objeto;
    }
    return $usuarios;
}

function getUsuarios()
{
    $usuarios = [];
    $c = new Conexion();
    $resultado = $c->query("SELECT * FROM usuario where rol not like 'administrador'");
    while ($objeto = $resultado->fetch(PDO::FETCH_OBJ)) {
        $usuarios[] = $objeto;
    }
    return $usuarios;
}

function delUsuario($id)
{
    try {
        $c = new Conexion();
        $c->exec("DELETE FROM valoracion WHERE id_usuario=$id");
        $c->exec("UPDATE contenido SET id_usuario=1 WHERE id_usuario=$id");
        $c->exec("DELETE FROM usuario WHERE id=$id");
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

function getUsernamePorId($id) {
    $usuario = null;
    $c = new Conexion();
    $resultado = $c->query("SELECT username FROM usuario where id=$id");
    while ($objeto = $resultado->fetch(PDO::FETCH_OBJ)) {
        $usuario = $objeto->username;
    }
    return $usuario;
}

/*function getIdUsuarios() {
    $id = [];
    $c = new Conexion();
    $resultado = $c->query("SELECT id FROM usuario");
    while ($objeto = $resultado->fetch(PDO::FETCH_OBJ)) {
        $id[] = $objeto->id;
    }
    return $id;
}
*/

function getUsuarioPorEmail($email) {
    $usuario = [];
    $c = new Conexion();
    $resultado = $c->query("SELECT * FROM usuario WHERE correo='$email'");
    while ($objeto = $resultado->fetch(PDO::FETCH_OBJ)) {
        $usuario[] = $objeto;
    }
    return $usuario;
}

function updateUsuario($datos)
{
    $datos['cp'] = intval($datos['cp']);
    $datos['telefono'] =  intval($datos['telefono']);

    try {
        $c = new Conexion();
        $c->exec("UPDATE usuario SET username='" . $datos['username'] .
            //"', password='" . $datos['password'] .
            "', nombre='" . $datos['nombre'] .
            "', apellido1='" . $datos['apellido1'] .
            "', apellido2='" . $datos['apellido2'] .
            "', correo='" . $datos['correo'] .
            "', fecha_nacimiento='" . $datos['fecha'] .
            "', pais='" . $datos['pais'] .
            "', codigo_postal=" . $datos['cp'] .
            ", telefono=" . $datos['telefono'] .
            ", rol='" . $datos['rol'] .
            "' WHERE id=" . $datos['id']);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

function getUser()
{
    $usuarios = [];
    $correo = $_POST['email'];
    $contra = md5($_POST['pass']);
    $c = new Conexion();
    $resultado = $c->query("SELECT * FROM usuario where correo = '$correo' AND password = '$contra'");
    while ($objeto = $resultado->fetch(PDO::FETCH_OBJ)) {
        $usuarios[] = $objeto;
    }
    return $usuarios;
}

function updatePass($datos)
{
    try {
        $c = new Conexion();
        $c->exec("UPDATE usuario SET password='" . $datos['password'] . "' WHERE id=" . $datos['id']);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

function passRepetida($correo){
    try{
        $c = new Conexion();
        $resultado = $c->query("SELECT * FROM usuario where correo='$correo'");
        if ($resultado->fetch(PDO::FETCH_OBJ)) {
            return true;
        }else{
            return false;
        }
    }catch (PDOException $e){
        return false;
    }
}

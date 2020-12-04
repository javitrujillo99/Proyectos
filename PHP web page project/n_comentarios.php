<?php
session_start();
include "funciones/Conexion.php";
include "funciones/usuarios/funciones_usuario.php";
include "funciones/valoraciones/funciones_valoraciones.php";

if (!isset($_SESSION['usuario']) || $_SESSION['usuario'][0]->rol != 'administrador') {
    header("Location:index.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<style>
    div.error {
        float: none;
        color: red;
        padding-left: .5em;
        vertical-align: middle;
        font-size: 12px;
    }

    #passwordModalPass {
        margin: 10px;
    }

    #repitepasswordModalPass {
        margin: 10px;
    }
</style>

<body>
<?php include("includes/navigation.php"); ?>
<div class="container">

    <a href="micuenta.php">Volver a Mi Cuenta</a>
    <h2>Listado de N Comentarios</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Username</th>
            <th scope="col">Comentario</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $n_comentarios = getN_Comentario();
        if (empty($n_comentarios)) {
            echo "<div class='alert alert-danger'>No hay T Mensajes en la base de datos</div>";
        } else {
            foreach ($n_comentarios as $n) {
                ?>
                <tr>
                    <th scope="row"><?php echo $n->id; ?></th>
                    <td><?php echo $n->id_usuario; ?></td>
                    <td><?php echo $n->comentario; ?></td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>


</div>
<script src="js/jquery.validate.min.js"></script>
</body>
</html>
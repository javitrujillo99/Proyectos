<?php
session_start();
include "funciones/Conexion.php";
include "funciones/usuarios/funciones_usuario.php";
include "funciones/contacta/funciones_contacta.php";

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
    <h2>Listado de Mensajes Contacta</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Asunto</th>
            <th scope="col">Comentario</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $contacta = getContacta();
        if (empty($contacta)) {
            echo "<div class='alert alert-danger'>No hay Mensajes de Contacta en la base de datos</div>";
        } else {
            foreach ($contacta as $c) {
                ?>
                <tr>
                    <th scope="row"><?php echo $c->id; ?></th>
                    <td><?php echo $c->nombre; ?></td>
                    <td><?php echo $c->email; ?></td>
                    <td><?php echo $c->asunto; ?></td>
                    <td><?php echo $c->comentario; ?></td>
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
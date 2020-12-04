<?php
session_start();
include "funciones/Conexion.php";
include "funciones/usuarios/funciones_usuario.php";

if (!isset($_SESSION['usuario'])) {
    header("Location:index.php");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>
<body>
<?php include("includes/navigation.php"); ?>
<div class="container">

    <?php

    if (isset($_SESSION['usuario']) && $_SESSION['usuario'][0]->rol == 'administrador') {
        echo "<a href='administracion.php'>Ir a la zona de administración</a><br>";
        echo "<a href='n_comentarios.php'>Ir a la zona de mensajeria N</a><br>";
        echo "<a href='t_comentarios.php'>Ir a la zona de mensajeria T</a><br>";
        echo "<a href='contacta_mensajes.php'>Ir a la zona de mensajeria Contacta</a><br>";
    }

    if (isset($_POST['editarModal'])) {
        if (updateUsuario(array("id" => $_POST['idModal'],
            "username" => $_POST['usernameModal'],
            "nombre" => $_POST['nombreModal'],
            "apellido1" => $_POST['apellido1Modal'],
            "apellido2" => $_POST['apellido2Modal'],
            "correo" => $_POST['correoModal'],
            "fecha" => $_POST['fechaModal'],
            "pais" => $_POST['paisModal'],
            "cp" => $_POST['cpModal'],
            "telefono" => $_POST['telefonoModal'],
            "rol" => $_POST['rolModal']
        ))) {
            $_SESSION['usuario'] = getUsuario($_POST['idModal']);
            echo "<div class='alert alert-success'>Datos ingresados con éxito</div>";
        } else {
            echo "<div class='alert alert-danger'>Error al editar el usuario</div>";
        }
    }

    if (empty($_SESSION['usuario'][0]->nombre) ||
        empty($_SESSION['usuario'][0]->apellido1) ||
        empty($_SESSION['usuario'][0]->apellido2) ||
        empty($_SESSION['usuario'][0]->correo) ||
        empty($_SESSION['usuario'][0]->fecha_nacimiento) ||
        empty($_SESSION['usuario'][0]->pais) ||
        empty($_SESSION['usuario'][0]->codigo_postal) ||
        empty($_SESSION['usuario'][0]->telefono)
    ) {
        echo "<div class='alert alert-danger'>
                    Te faltan algunos datos por rellenar en tu perfil.
                    <button type=\"button\" class=\"btn btn-danger editar\" data-toggle=\"modal\"
                        data-target=\"#editarModal\">Completa tu perfil
                    </button>
                </div>";
    }

    ?>

    <h2>Tus datos</h2>
    <div class="row datos">
        <div class="col-md-4">
            <strong>Username: </strong><?php echo $_SESSION['usuario'][0]->username; ?>
        </div>
        <div class="col-md-4">
            <strong>Nombre: </strong><?php echo $_SESSION['usuario'][0]->nombre; ?>
        </div>
        <div class="col-md-4">
            <strong>Apellido 1: </strong><?php echo $_SESSION['usuario'][0]->apellido1; ?>
        </div>
        <div class="col-md-4">
            <strong>Apellido 2: </strong><?php echo $_SESSION['usuario'][0]->apellido2; ?>
        </div>
        <div class="col-md-4">
            <strong>Correo: </strong><?php echo $_SESSION['usuario'][0]->correo; ?>
        </div>
        <div class="col-md-4">
            <strong>Fecha de nacimiento: </strong><?php echo $_SESSION['usuario'][0]->fecha_nacimiento; ?>
        </div>
        <div class="col-md-4">
            <strong>Pais: </strong><?php echo $_SESSION['usuario'][0]->pais; ?>
        </div>
        <div class="col-md-4">
            <strong>Código postal: </strong><?php echo $_SESSION['usuario'][0]->codigo_postal; ?>
        </div>
        <div class="col-md-4">
            <strong>Telefono: </strong><?php echo $_SESSION['usuario'][0]->telefono; ?>
        </div>
    </div>
    <button type="button" class="btn btn-success editar" data-toggle="modal"
            data-target="#editarModal">Editar mis datos
    </button>



    <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Edite los campos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">

                        <div class="form-group">
                            <label for="idModalEditar" class="col-form-label">Id:</label>
                            <input type="text" class="form-control" id="idModalEditar" name="idModal"
                                   value="<?php echo $_SESSION['usuario'][0]->id; ?>" readonly>
                            <label for="usernameModalEditar" class="col-form-label">Username:</label>
                            <input type="text" class="form-control" id="usernameModalEditar" name="usernameModal"
                                   value="<?php echo $_SESSION['usuario'][0]->username; ?>">
                            <!--
                            <label for="passwordModalEditar" class="col-form-label">Password:</label>
                            <input type="text" class="form-control" id="passwordModalEditar" name="passwordModal">
                            -->
                            <label for="nombreModalEditar" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombreModalEditar" name="nombreModal"
                                   value="<?php echo $_SESSION['usuario'][0]->nombre; ?>">
                            <label for="apellido1ModalEditar" class="col-form-label">Apellido 1:</label>
                            <input type="text" class="form-control" id="apellido1ModalEditar" name="apellido1Modal"
                                   value="<?php echo $_SESSION['usuario'][0]->apellido1; ?>">
                            <label for="apellido2ModalEditar" class="col-form-label">Apellido 2:</label>
                            <input type="text" class="form-control" id="apellido2ModalEditar" name="apellido2Modal"
                                   value="<?php echo $_SESSION['usuario'][0]->apellido2; ?>">
                            <label for="correoModalEditar" class="col-form-label">Correo electrónico:</label>
                            <input type="text" class="form-control" id="correoModalEditar" name="correoModal"
                                   value="<?php echo $_SESSION['usuario'][0]->correo; ?>">
                            <label for="fechaModalEditar" class="col-form-label">Fecha de nacimiento:</label>
                            <input type="text" class="form-control" id="fechaModalEditar" name="fechaModal"
                                   value="<?php echo $_SESSION['usuario'][0]->fecha_nacimiento; ?>">
                            <label for="paisModalEditar" class="col-form-label">Pais:</label>
                            <input type="text" class="form-control" id="paisModalEditar" name="paisModal"
                                   value="<?php echo $_SESSION['usuario'][0]->pais; ?>">
                            <label for="cpModalEditar" class="col-form-label">Código postal:</label>
                            <input type="number" class="form-control" id="cpModalEditar" name="cpModal"
                                   value="<?php echo $_SESSION['usuario'][0]->codigo_postal; ?>">
                            <label for="telefonoModalEditar" class="col-form-label">Telefono:</label>
                            <input type="number" class="form-control" id="telefonoModalEditar" name="telefonoModal"
                                   value="<?php echo $_SESSION['usuario'][0]->telefono; ?>">
                            <input type="text" class="form-control" id="rolModalEditar" name="rolModal"
                                   value="<?php echo $_SESSION['usuario'][0]->rol; ?>" hidden>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" name="editarModal" class="btn btn-success">Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>

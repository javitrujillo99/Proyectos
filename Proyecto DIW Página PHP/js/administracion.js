$(function () {
    $("#formPass").validate({
        errorElement: 'div',
        rules: {
            'passwordModal': { required: true, minlength: 5 }
        },
        messages: {
            'passwordModal': 'Este campo es obligatorio y mínimo 5 caracteres.'
        },
        debug: true,
        submitHandler: function (form) {
            console.log("Enviado formulario");
            form.submit();
        }
    });
});

$("#passwordModalPass").keyup(function (e) {
    if ($(this).val().length >= 5) {
        $("#repitepasswordModalPass").removeAttr("hidden");
    } else {
        $("#repitepasswordModalPass").attr("hidden", "hidden");
    }
});

$("#repitepasswordModalPass").keyup(function (e) {
    if ($(this).val() == $("#passwordModalPass").val()) {
        $("#botonPass").removeAttr("disabled");
        $("#error").fadeOut();
    } else {
        $("#botonPass").attr("disabled", "disabled");
        $("#error").fadeIn();
    }
});



$(".editar").click(function ($e) {
    $("#idModalEditar").val($e.currentTarget.value);

    $e.preventDefault();
    var datousuario = new Object();
    //datousuario.usuario = $("#usuario").val();
    datousuario.usuario = $e.currentTarget.value;
    dato_str_usuario = JSON.stringify(datousuario);
    console.log("Antes del get");
    $.get("funciones/usuarios/datosUsuario.php", JSON.parse(dato_str_usuario),
        function (respuestaJson) {
        }
    ).done(function (respuestaJson) {
            json = JSON.parse(respuestaJson);
            $("#usernameModalEditar").val(json.username);
            //$("#passwordModalEditar").val(json.password);
            $("#nombreModalEditar").val(json.nombre);
            $("#apellido1ModalEditar").val(json.apellido1);
            $("#apellido2ModalEditar").val(json.apellido2);
            $("#correoModalEditar").val(json.correo);
            $("#fechaModalEditar").val(json.fecha_nacimiento);
            $("#paisModalEditar").val(json.pais);
            $("#cpModalEditar").val(json.codigo_postal);
            $("#telefonoModalEditar").val(json.telefono);
            $("#rolModalEditar").val(json.rol);
        }
    ).fail(function () {
            alert("Falla");
            console.log("Falla");
        }
    )

});

$(".borrar").click(function ($e) {
    $("#idModalBorrar").val($e.currentTarget.value);
});
$(".pass").click(function ($e) {
    $("#idPass").val($e.currentTarget.value);
});
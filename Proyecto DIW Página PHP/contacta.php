<?php
// Sesion
session_start();

// Funciones que usaremos
//include "funciones/contenido/funciones_contenido.php";
//include "funciones/valoraciones/funciones_valoraciones.php";
include "funciones/contacta/funciones_contacta.php";
//include "funciones/usuarios/funciones_usuario.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("includes/head-tag-contents.php"); ?>

    <!-- Quill -->

    <meta name="twitter:description" content="Quill is a free, open source rich text editor built for the modern web.">
<meta name="twitter:image" content="https://quilljs.com/assets/images/brand-asset.png">
<meta property="og:type" content="website">
<meta property="og:url" content="https://quilljs.com/standalone/full/">
<meta property="og:image" content="https://quilljs.com/assets/images/brand-asset.png">
<meta property="og:title" content="Full Editor - Quill">
<meta property="og:site_name" content="Quill">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai-sublime.min.css" />

    <link rel="stylesheet" href="https://cdn.quilljs.com/1.3.6/quill.snow.css" />

    <style>
    body > #standalone-container {
        margin: 50px auto;
        max-width: 720px;
    }
    #editor-container {
        height: 350px;
    }
    </style>



</head>
<body>
<?php include("includes/navigation.php"); ?>

<div class="container">
    <div class="row content ">
        <div class="col-12">
            <h2>Contacta con nosotros</h2>

            <script type="text/javascript">
            /*
            $('#Enviar').click(function() { 
                $.ajax({
                    url: "contacta.php", //Archivo PHP al que le enviarás el texto en <p>
                    type: "GET",
                    data: {save: "1", content: [COLOR="#008000"]$('#editor-container').text()[/COLOR]}
                });
            });*/

            $comentario = document.getElementById("editor-container");

            </script>

            <?php
            // Si se ha pulsado el boton de Enviar de Contacta
            if (isset($_POST['Enviar'])) {

                $nombre = $_POST['nombre']; // Recogemos el nombre
                $email = $_POST['email']; // Recogemos el email
                $asunto = $_POST['asunto']; // Recogemos el asunto
                //$comentario = advancedEditor.getText();
                //$comentario = $_GET['content']; //Variable que almacena el contenido escrito en <p>

                $comentario = $_POST['description']; // Recogemos el comentario
                

                //$comentario = "JavaScript: quill.root.innerHTML"; // Recogemos el comentario
                //$comentario = JavaScript: quill; // Recogemos el comentario
                

                // Si algun campo esta vacio lanzamos un error
                if ($nombre == null || $asunto == null || $comentario == null) {
                    echo "<div class='alert alert-danger'>Debe rellenar los campos obligatorios</div>";
                }
                // En caso contrario llamamas a la funcion que lo guarde pasandole nombre, email, asunto y el comentario
                else {
                    addContacta($nombre, $email, $asunto, $comentario);
                    echo "<div class='alert alert-success'>Tu propuesta ha sido recibida correctamente</div>";
                }
            }
            ?>

            <div class="col-md-4 col-sm-12">
                <hr>
            </div>
            <div>
                <div>
                    <p>
                        ¿Tienes algo que decirnos? ¿Una propuesta, una petición, una queja?
                        Este es el lugar adecuado, rellena el
                        siguiente formulario y contactaremos contigo lo antes posible.
                    </p>
                    <p>
                        Antes de enviar tu duda, asegúrate que no esté resuelta en nuestra sección de
                        <a href="terminos.php" title="Preguntas frecuentes">preguntas frecuentes</a>.
                    </p>
                </div>
            </div>

            

            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6 col-sm-12 text-md-right"><label for="nombre">Nombre</lavel></div>
                    <div class="col-md-6 col-sm-12 text-md-left"><input class="formulario form-control"" type="text" id="nombre" name="nombre" placeholder="Nombre"></div>
                </div>
                <hr>
                <div class="row">
                    <div class="formulario col-md-6 col-sm-12 text-md-right"><label for="email">Email</lavel></div>
                    <div class="formulario col-md-6 col-sm-12 text-md-left"><input class="formulario form-control"" type="text" id="email" name="email" placeholder="email (opcional)"></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 col-sm-12 text-md-right"><label for="asunto">Asunto</lavel></div>
                    <div class="col-md-6 col-sm-12 text-md-left">
                        <select id="asunto" name="asunto">
                            <option value="">Escoge</option>
                            <option value="Colaboración">Colaboración</option>
                            <option value="Comportamiento inadecuado">Comportamiento inadecuado</option>
                            <option value="Duda">Duda</option>
                            <option value="Felicitación">Felicitación</option>
                            <option value="Petición">Petición</option>
                            <option value="Propuesta">Propuesta</option>
                            <option value="Publicidad">Publicidad</option>
                            <option value="Red de blogs">Red de blogs</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                </div>
                <hr>
                <!--
                <div class="row">
                    <div class="col-md-6 col-sm-12 text-md-right">Comentarios</div>
                    <div class="col-md-6 col-sm-12 text-md-left">
                        <textarea class="formulario" name="comentarios" placeholder="Comentarios" rows="10" cols="30"></textarea>
                    </div>
                </div>
                -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 text-md-center"><label for="id_description">Comentarios</lavel></div>
                    <input name='description' id="id_description" required="" type="hidden">
                    <div class="col-md-12 col-sm-12 text-md-center">
                        <div id="standalone-container">
                            <div id="toolbar-container">
                                <span class="ql-formats">
                                    <select class="ql-font"></select>
                                    <select class="ql-size"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-bold"></button>
                                    <button class="ql-italic"></button>
                                    <button class="ql-underline"></button>
                                    <button class="ql-strike"></button>
                                </span>
                                    <span class="ql-formats">
                                    <select class="ql-color"></select>
                                    <select class="ql-background"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-script" value="sub"></button>
                                    <button class="ql-script" value="super"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-header" value="1"></button>
                                    <button class="ql-header" value="2"></button>
                                    <button class="ql-blockquote"></button>
                                    <button class="ql-code-block"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-list" value="ordered"></button>
                                    <button class="ql-list" value="bullet"></button>
                                    <button class="ql-indent" value="-1"></button>
                                    <button class="ql-indent" value="+1"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-direction" value="rtl"></button>
                                    <select class="ql-align"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-link"></button>
                                    <button class="ql-image"></button>
                                    <button class="ql-video"></button>
                                    <button class="ql-formula"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-clean"></button>
                                </span>
                            </div>
                            <div id="editor-container"></div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-12 col-sm-12 text-md-center"><input type="submit" id="Enviar" name="Enviar" value="Enviar" class="btn btn-primary"/></div>
                </div>
            </form>
            <hr class="col-4">
            <br>

            



            <!-- Redes-->
            <div class="row text-center">
                <div class="col-md col-sm-6">
                    <a href="https://www.twitch.tv/linustech"><i class="fa fa-twitch redes" style="color:purple"></i><p class="col-md-12">Twitch</p></a>
                </div>
                <div class="col-md col-sm-6">
                    <a href="https://www.facebook.com/LinusTech"><i class="fa fa-facebook-square redes" style="color:blue"></i><p class="col-md-12">Facebook</p></a>
                </div>
                <div class="col-md col-sm-6">
                    <a href="https://github.com/psp-97/proyectoDIW.git"><i class="fa fa-git-square redes" style="color:burlywood"></i><p class="col-md-12">GitHub</p></a>
                </div>
                <div class="col-md col-sm-6">
                    <a href="https://www.instagram.com/linustech/"><i class="fa fa-instagram redes" style="color:purple"></i><p class="col-md-12">Instagram</p></a>
                </div>
                <div class="col-md col-sm-6">
                    <a href="https://twitter.com/LinusTech"><i class="fa fa-twitter-square redes" style="color:cyan"></i><p class="col-md-12">Twiter</p></a>
                </div>
                <div class="col-md col-sm-6">
                    <a href="https://www.youtube.com/user/LinusTechTips/videos"><i class="fa fa-youtube-play redes" style="color:red"></i><p class="col-md-12">Youtube</p></a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Quill -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
  var quill = new Quill('#editor-container', {
    modules: {
      formula: true,
      syntax: true,
      toolbar: '#toolbar-container'
    },
    placeholder: 'Comentarios...',
    theme: 'snow'
  }).on('text-change', function () {
                $('#id_description').val($('#editor-container .ql-editor').html());
            });
  

  //$(document).on("click", "#SubmitButton", function(e) { e.preventDefault(); var $comentario = advancedEditor.getText(); var title = $("#title").val(); console.log(title, question); });
</script>


<!-- Footer -->

<div class="footer text-center">
    <p>&copy; <?php print date("Y"); ?> <a href="https://iesmarquesdecomares.org/"> IES Marqués de Comares.</a></p>
</div>
</body>
</html>
var startApp = function () {
  gapi.load('auth2', function () {
    // Retrieve the singleton for the GoogleAuth library and set up the client.
    auth2 = gapi.auth2.init({
      client_id: '706535834432-hg6gc9jnh7rfmtbeb2rvd9nkt6clbfjc.apps.googleusercontent.com',
      cookiepolicy: 'single_host_origin',
      // Request scopes in addition to 'profile' and 'email'
      //scope: 'additional_scope'
    });
    attachSignin(document.getElementById('googleSignInBtn'));
  });
}

function attachSignin(element) {
  console.log(element.id);
  auth2.attachClickHandler(element, {},
    function (googleUser) {

    }, function (error) {
      
    });
  auth2.isSignedIn.listen(signinChanged);
}

var signinChanged = function (val) {
  console.log('Signin state changed to ', val);
  if (auth2.isSignedIn.get()) {
    var profile = auth2.currentUser.get().getBasicProfile();
    console.log("Antes de consoles");
    console.log('ID: ' + profile.getId());
    console.log('Full Name: ' + profile.getName());
    console.log('Given Name: ' + profile.getGivenName());
    console.log('Family Name: ' + profile.getFamilyName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail());

    console.log("Antes de datosUsuario");
    var datousuario = new Object();
    datousuario.nombre = profile.getGivenName();
    datousuario.apellido1 = profile.getFamilyName();
    datousuario.correo = profile.getEmail();
    dato_str_usuario = JSON.stringify(datousuario);
    console.log("Antes del get");
    console.log(dato_str_usuario);

    $.get("funciones/usuarios/insertarUsuarioGoogle.php", JSON.parse(dato_str_usuario),
        function (respuestaJson) {
        }
    ).done(function (respuestaJson) {
          console.log("Datos insertados correctamente");
          location.reload();
        }
    ).fail(function () {
      alert("Falla");
      console.log("Falla");
    });




    /*$(".editar").click(function ($e) {
      $e.preventDefault();
      var datousuario = new Object();
      //datousuario.usuario = $("#usuario").val();
      datousuario.nombre = profile.getGivenName();
      datousuario.apellido1 = profile.getFamilyName();
      datousuario.correo = profile.getEmail();
      dato_str_usuario = JSON.stringify(datousuario);
      console.log("Antes del get");
      $.get("funciones/login/insertarUsuarioGoogle.php", JSON.parse(dato_str_usuario),
        function (respuestaJson) {
        }
      ).done(function (respuestaJson) {
        alert("Datos insertados correctamente");
        console.log("Datos insertados correctamente");
      }
      ).fail(function () {
        alert("Falla");
        console.log("Falla");
      }
      )

    });*/
    document.getElementById('dropdownLoginLI').style.display = 'none';
  } else {
    console.log('Not signed in.');
    document.getElementById('dropdownLoginLI').style.display = 'block';
  }
}

function signOut() {
  console.log("Logout");
  if (auth2.isSignedIn.get())
    auth2.disconnect();

}
import { DocumentReference, AngularFirestore } from '@angular/fire/firestore';
import { map, take, debounceTime } from 'rxjs/operators';
import { Auth } from './../../../models/auth';
import { Router } from '@angular/router';
import { Component, OnInit } from '@angular/core';
import { AuthService } from './../../../services/auth.service';
import { FormGroup, FormControl, Validators, AbstractControl } from '@angular/forms';

// Declaramos las variables para jQuery
declare var jQuery:any;
declare var $:any;


@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})

export class RegisterComponent implements OnInit {

  constructor(private router: Router, private authservice: AuthService, private afs: AngularFirestore) { }
  
  public newUserForm = new FormGroup({
    email: new FormControl('', [Validators.required, Validators.email], CustomValidator.email(this.afs)),
    password: new FormControl('', Validators.required),
    nombre: new FormControl('', Validators.required),
    apellidos: new FormControl('', Validators.required),
    sexo: new FormControl(''),
  })
  ngOnInit() {
    this.repetir();
  }

  get email(){
    return this.newUserForm.get('email');
  }

  saveUser() {
    //this.validate();
    if (this.newUserForm.invalid) {
      return;
    }

    let auth: Auth = this.newUserForm.value;
    console.log('email:' + auth.email);
    this.authservice.saveUser(auth)
    .then(response => this.handleSuccessfulSaveUser(response, auth))
    .catch(err => console.error(err));
  }

  handleSuccessfulSaveUser(response: DocumentReference, auth: Auth) {

  }

  onAddUser(form:Auth) {
    console.log('email:' + form.email);
    this.authservice.registerUser(form)
    .then((res) => {
      this.router.navigate(['']);
    }).catch( err => console.log('err', err.message));
  }

  repetir() {
    $(document).ready(function () {
      var password = $("input[name='password']");
      var confirmPassword = $("input[name='confirmar']");
      $("html").keyup(function () { 
        if (password.val() != "" && password.val() == confirmPassword.val()) {
            $("#guardar").removeAttr("disabled");
        }
      });
    });
}

  validate() {
    console.log("Entra validacion");
    $(function() {
      $("#formulario").validate({
        // Specify validation rules
        rules: {
          nombre: {
            required: true
          },
          apellidos: {
            required: true
          },
          email: {
            required: true,
            email: true
          },
          password: {
            required: true,
            minlength: 6
          }
        },
        // Specify validation error messages
        messages: {
          nombre: {
            required: "Debes introducir el nombre"
          },
          apellidos: {
            required: "Debes introducir los apellidos"
        },
          password: {
            required: "Debes introducir la contraseña",
            minlength: "Tu contraseña debe tener mínimo 6 caracteres"
          },
          email: "Debes introducir un email"
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
          form.submit();
        }
      });
    });
    console.log("Sale validacion");
  }

}

export class CustomValidator{
  static email(afs: AngularFirestore){
    return (control: AbstractControl) => {
      const email = control.value.toLowerCase();
      return afs.collection('usuarios', ref => ref.where('email', '==', email))
      .valueChanges().pipe(
        debounceTime(500),
        take(1),
        map(arr => arr.length ? { emailAvailable: false } : null ),
      )
    }
  }
}

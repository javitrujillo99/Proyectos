import { FormGroup, FormControl, Validators } from '@angular/forms';
import { AuthService } from './../../services/auth.service';
import { Auth } from './../../models/auth';
import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import Swal from 'sweetalert2';
import { resolve } from 'url';

declare var jQuery:any;
declare var $:any;

@Component({
  selector: 'app-usuarios',
  templateUrl: './usuarios.component.html',
  styleUrls: ['./usuarios.component.css']
})
export class UsuariosComponent implements OnInit {
  public usuarios: Observable<Auth[]>

  constructor(private authSvc: AuthService) { }

  public editUserForm = new FormGroup({
    email: new FormControl('', [Validators.required, Validators.email],/* CustomValidator.email(this.afs)*/),
    nombre: new FormControl('', Validators.required),
    apellidos: new FormControl('', Validators.required),
    sexo: new FormControl(''),
  })

  ngOnInit() {
    this.usuarios = this.authSvc.getAllUsers();
  }

  onEditUsuario(auth: Auth) {
    console.log("Edit user", auth);
    /*
    HE PROBADO CON SWEETALERT2 PERO NO PUEDO, NECESITO EL ARCHIVO APP.MATERIAL
    Y LO HAGO CON MATERIAL
  */
    Swal.fire({
      title: 'Editar usuario',
      html:
        '<div>'+
          '<form name="formulario" id="formulario" [formGroup]="editUserForm">'+
            /*'<div class="alert alert-danger" *ngIf="document.getElementById(`email`).touched && document.getElementById(`email`).errors?.required">'+
              'El email es obligatorio'+
            '</div>'+*/
            'Nombre:'+
            '<input type="text" id="nombre" name="nombre" value= "' + auth.nombre + '"class="swal2-input">'+
            'Apellidos:'+
            '<input type="text" id="apellidos" name="apellidos" value="' + auth.apellidos + '"class="swal2-input">'+
            'Sexo:'+
            '<input type="text" id="sexo" value="' + auth.sexo + '"class="swal2-input">'+
          '</form>'+
        '</div>',
        /*input: 'select',
        inputOptions: {
          apples: 'Hombre',
          bananas: 'Mujer',
        },
      inputPlaceholder: 'Selecciona sexo',
      inputAttributes: {
        id:'sexo'
      }, */
      confirmButtonText: "Editar usuario",
      showCancelButton: true,
      cancelButtonColor: '#ff0000',
      confirmButtonColor: '#0000ff',
      }).then(result => {
      if (result.value) {
        var nombre = (<HTMLInputElement>document.getElementById('nombre')).value;
        var apellidos = (<HTMLInputElement>document.getElementById('apellidos')).value;
        var sexo = (<HTMLSelectElement>document.getElementById('sexo')).value;
        console.log('Nombre: ' + nombre);
        console.log('Apellidos: ' + apellidos);
        console.log('Sexo: ' + sexo);
        auth.nombre = nombre;
        auth.apellidos = apellidos;
        auth.sexo = sexo;
        this.authSvc.editUsuarioById(auth).then(() =>{
          Swal.fire('Editado', 'El usuario ha sido editado correctamente', "success" );
        }).catch((error) => {
          Swal.fire('Error', 'Ha ocurrido un error', "error");
        });
      }
    });
  }

  onDeleteUsuario(auth: Auth) {
    console.log("Delete user", auth);
    Swal.fire({
      title: '¿Estás seguro?',
      text: 'No habrá vuelta atrás',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#0000ff',
      cancelButtonColor: '#ff0000',
      confirmButtonText: 'Sí, estoy seguro'
    }).then(result => {
      if (result.value) {
        this.authSvc.deleteUsuarioById(auth).then(() =>{
          Swal.fire('Borrado', 'El usuario ha sido borrado correctamente', "success" );
        }).catch((error) => {
          Swal.fire('Error', 'Ha ocurrido un error', "error");
        });
      }
    });
  }

}

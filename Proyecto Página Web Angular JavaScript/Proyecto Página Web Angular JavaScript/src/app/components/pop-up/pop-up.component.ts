import { Auth } from './../../models/auth';
import { Component, OnInit, Inject } from '@angular/core';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { AngularFireAuth } from '@angular/fire/auth';
import { auth } from 'firebase/app';
import { AuthService } from '../../services/auth.service';
import { Router } from '@angular/router';
import { FormGroup, FormControl, Validators } from '@angular/forms';

@Component({
  selector: 'app-pop-up',
  templateUrl: './pop-up.component.html',
  styleUrls: ['./pop-up.component.css']
})
export class PopUpComponent implements OnInit {

  constructor(
    public dialogRef: MatDialogRef<PopUpComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any,
    public afAuth: AngularFireAuth,
    private router: Router,
    private authService: AuthService
    ) {  }

    public loginForm = new FormGroup({
      email: new FormControl('', [Validators.required, Validators.email]),
      password: new FormControl('', Validators.required),
    })

  ngOnInit() {

  }

  closeDialog() {
    this.dialogRef.close();
  }

  onLogin(auth: Auth): void {
    this.authService.loginEmailUser(auth.email, auth.password)
      .then( (res)=> {
        this.router.navigate(['']);
      }).catch( err => console.log('err', err.message));
  }

  onLogout() {
    this.authService.logoutUser();
  }

}

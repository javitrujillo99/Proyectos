import { Component, OnInit } from '@angular/core';
import { MatDialog } from '@angular/material/dialog';
import { PopUpComponent } from '../pop-up/pop-up.component';
import { AuthService } from '../../services/auth.service';
import { AngularFireAuth } from '@angular/fire/auth';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {

  email:string;
  pass:string;

  constructor(public dialog: MatDialog, private authService: AuthService, private afsAuth: AngularFireAuth) {}

  public isLogged: boolean = false;

  openDialog(): void {
    const dialogRef = this.dialog.open(PopUpComponent, {
      data: {
        email:this.email,
        pass:this.pass
      }
    });

    dialogRef.afterClosed().subscribe(result => {
      console.log('The dialog was closed');
      console.log(result);
    });
  }


  ngOnInit() {
    this.getCurrentUser();
  }

  getCurrentUser() {
    this.authService.isAuth().subscribe( auth => {
      if (auth) {
        console.log("User logged");
        this.isLogged = true;
      } else {
        console.log("User NOT logged");
        this.isLogged = false;
      }
    })
  }

  onLogout() {
    this.afsAuth.auth.signOut();
  }

}

import { AuthGuard } from './guards/auth.guard';
import { UsuariosComponent } from './components/usuarios/usuarios.component';
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ContenidoComponent } from './components/contenido/contenido.component';
import { PeliculaComponent } from './components/pelicula/pelicula.component';
import { PopUpComponent } from './components/pop-up/pop-up.component';
import { RegisterComponent } from './components/users/register/register.component';

const routes: Routes = [
  { path: '', component: ContenidoComponent },
  { path: 'usuarios', component: UsuariosComponent},
  { path: 'pelicula/:id', component: PeliculaComponent },
  { path: 'user/login', component: PopUpComponent },
  { path: 'user/register', component: RegisterComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }

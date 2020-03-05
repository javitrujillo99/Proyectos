import { map } from 'rxjs/operators';
import { AuthService } from './../services/auth.service';
import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, UrlTree, Router } from '@angular/router';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthGuard implements CanActivate {
  constructor(private authSvc: AuthService, private router: Router) {}
  canActivate(): Observable<boolean> {
    return this.authSvc.userData$.pipe(
      map(user => {
        if (!user) {
          this.router.navigate(['/']);
          return false;
        }
        return true;
      })
    );
  }
}

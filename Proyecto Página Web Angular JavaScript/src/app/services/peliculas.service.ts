import { Observable } from 'rxjs';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class PeliculasService {

  constructor(protected http: HttpClient) { }

  getPeliculas(): Observable<any> {
    return this.http.get('http://localhost/PhpstormProjects/peliculas/public/api/v1/peliculas');
  }

  getPeliculaPorId(id) {
    return this.http.get('http://localhost/PhpstormProjects/peliculas/public/api/v1/peliculas/'+id);
  }
}

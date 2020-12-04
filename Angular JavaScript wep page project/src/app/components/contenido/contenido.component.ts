import { PeliculasService } from './../../services/peliculas.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-contenido',
  templateUrl: './contenido.component.html',
  styleUrls: ['./contenido.component.css']
})
export class ContenidoComponent implements OnInit {

  peliculas: any[] = [];

  constructor(protected pelSvc: PeliculasService) { }

  ngOnInit() {
    this.pelSvc.getPeliculas().subscribe(
      (data) => {
        this.peliculas = data;
        console.log(data);
      },
      (error) => {
        console.error(error);
      }
    );
  }

}

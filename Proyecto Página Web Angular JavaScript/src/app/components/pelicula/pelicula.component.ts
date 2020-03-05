import { PeliculasService } from './../../services/peliculas.service';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-pelicula',
  templateUrl: './pelicula.component.html',
  styleUrls: ['./pelicula.component.css']
})
export class PeliculaComponent implements OnInit {

  pelicula: any = [];

  constructor(protected pelSvc: PeliculasService, private rutaActiva: ActivatedRoute) { }

  id = this.rutaActiva.snapshot.params.id;

  ngOnInit() {
    
    this.pelSvc.getPeliculaPorId(this.id).subscribe(
      (data) => {
        console.log(this.id);
        this.pelicula = data;
        console.log(data);
      },
      (error) => {
        console.error(error);
      }
    );
  }

}

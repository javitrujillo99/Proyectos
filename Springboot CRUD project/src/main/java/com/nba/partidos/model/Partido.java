package com.nba.partidos.model;



import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;

@Entity
@Table(name="partido")
public class Partido {
	@Id
	@GeneratedValue(strategy = GenerationType.AUTO)
	private int id;
	private String fecha;
	private String hora;
	private int precio;
	
	@JoinColumn(name = "id_equipo_local")
	@ManyToOne
	private Equipo equipoLocal;
	
	
	@JoinColumn(name = "id_equipo_visitante")
	@ManyToOne
	private Equipo equipoVisitante;
	
	public Partido() {
		super();
	}

	public Partido(int id, String fecha, String hora, Equipo equipoLocal, Equipo equipoVisitante, int precio) {
		super();
		this.id = id;
		this.fecha = fecha;
		this.hora = hora;
		this.equipoLocal = equipoLocal;
		this.equipoVisitante = equipoVisitante;
		this.precio = precio;
	}

	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public String getFecha() {
		return fecha;
	}

	public void setFecha(String fecha) {
		this.fecha = fecha;
	}

	public String getHora() {
		return hora;
	}

	public void setHora(String hora) {
		this.hora = hora;
	}
	
	public Equipo getEquipoLocal() {
		return equipoLocal;
	}
	
	public void setEquipoLocal(Equipo equipoLocal) {
		this.equipoLocal = equipoLocal;
	}
	
	public Equipo getEquipoVisitante() {
		return equipoVisitante;
	}
	
	public void setEquipoVisitante(Equipo equipoVisitante) {
		this.equipoVisitante = equipoVisitante;
	}

	public int getPrecio() {
		return precio;
	}

	public void setPrecio(int precio) {
		this.precio = precio;
	}
	
	
}

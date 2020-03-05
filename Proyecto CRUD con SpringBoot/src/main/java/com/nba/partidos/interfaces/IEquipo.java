package com.nba.partidos.interfaces;

import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Repository;

import com.nba.partidos.model.Equipo;

@Repository
public interface IEquipo extends CrudRepository<Equipo, Integer>{
	
}

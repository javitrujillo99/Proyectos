package com.nba.partidos.interfaces;

import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Repository;

import com.nba.partidos.model.Partido;

@Repository
public interface IPartido extends CrudRepository<Partido, Integer>{

}

package com.nba.partidos.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.nba.partidos.interfaceService.IEquipoService;
import com.nba.partidos.interfaces.IEquipo;
import com.nba.partidos.model.Equipo;

@Service
public class EquipoService implements IEquipoService{

	@Autowired
	private IEquipo data;
	
	@Override
	public List<Equipo> listar() {
		return (List<Equipo>) data.findAll();
	}


}

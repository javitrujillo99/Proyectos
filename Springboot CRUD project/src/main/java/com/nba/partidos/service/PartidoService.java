package com.nba.partidos.service;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.nba.partidos.interfaceService.IpartidoService;
import com.nba.partidos.interfaces.IPartido;
import com.nba.partidos.model.Partido;

@Service
public class PartidoService implements IpartidoService{
	
	@Autowired
	private IPartido data;
	
	@Override
	public List<Partido> listar() {
		return (List<Partido>)data.findAll();
	}

	@Override
	public Optional<Partido> listarId(int id) {
		return data.findById(id);
	}

	@Override
	public int save(Partido p) {
		int res = 0;
		Partido partido = data.save(p);
		if(!partido.equals(null)) {
			res = 1;
		}
		return res;
	}

	@Override
	public void delete(int id) {
		data.deleteById(id);
	}

}

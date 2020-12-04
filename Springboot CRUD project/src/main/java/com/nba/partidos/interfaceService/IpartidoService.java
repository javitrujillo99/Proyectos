package com.nba.partidos.interfaceService;

import java.util.List;
import java.util.Optional;

import com.nba.partidos.model.Partido;

public interface IpartidoService {
	public List<Partido>listar();
	public Optional<Partido>listarId(int id);
	public int save(Partido p);
	public void delete(int id);
}

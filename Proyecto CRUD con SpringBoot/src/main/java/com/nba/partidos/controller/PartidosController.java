package com.nba.partidos.controller;

import java.util.List;
import java.util.Optional;

import javax.validation.Valid;

import org.apache.juli.logging.LogFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import com.nba.partidos.interfaceService.IEquipoService;
import com.nba.partidos.interfaceService.IpartidoService;
import com.nba.partidos.model.Equipo;
import com.nba.partidos.model.Partido;


@Controller
@RequestMapping
public class PartidosController {
	
	private static final org.apache.juli.logging.Log LOGGER = LogFactory.getLog(PartidosController.class);
	
	@Autowired
	private IpartidoService serviceP;
	
	@Autowired
	private IEquipoService serviceE;
	
	@GetMapping("/partidos")
	public String listar(Model model) {
		List<Partido>partidos=serviceP.listar();
		model.addAttribute("partidos", partidos);
		return "index";
	}
	
	@GetMapping("/crearPartido")
	public String crearPartido(Model model) {
		List<Equipo>equipos=serviceE.listar();
		model.addAttribute("partido", new Partido());
		model.addAttribute("equipos", equipos);
		return "formulario";
	}
	
	@PostMapping("/save")
	public String save(@Valid Partido p, Model model) {
		serviceP.save(p);
		return "redirect:/partidos";
	}
	
	@GetMapping("/editar/{id}")
	public String editar(@PathVariable int id, Model model) {
		Optional<Partido>partido=serviceP.listarId(id);
		List<Equipo>equipos=serviceE.listar();
		model.addAttribute("partido", partido);
		model.addAttribute("equipos", equipos);
		return "formulario";
	}
	
	@GetMapping("/eliminar/{id}")
	public String delete(@PathVariable int id, Model model) {
		serviceP.delete(id);
		return "redirect:/partidos";
	}

}

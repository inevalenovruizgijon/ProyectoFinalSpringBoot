package com.example.demo.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.example.demo.entity.Skin;
import com.example.demo.entity.Tipo;
import com.example.demo.repository.SkinRepository;
import com.example.demo.repository.TipoRepository;

/**
 * Controlador REST que expone APIs para obtener tipos y skins de la tienda.
 * Permite consultas vía HTTP GET sobre categorías y tipos de skins.
 */
@RestController
@RequestMapping("/api")
public class MarketRestController {

    @Autowired
    private TipoRepository tipoRepository;

    @Autowired
    private SkinRepository skinRepository;

    /**
     * Obtiene la lista de tipos pertenecientes a una categoría específica.
     *
     * @param categoriaId ID de la categoría
     * @return Lista de objetos Tipo asociados a la categoría
     */
    @GetMapping("/tipos/{categoriaId}")
    public List<Tipo> obtenerTipos(@PathVariable Long categoriaId) {
        return tipoRepository.findByCategoriaId(categoriaId);
    }

    /**
     * Obtiene la lista de skins pertenecientes a un tipo específico.
     *
     * @param tipoId ID del tipo
     * @return Lista de objetos Skin asociados al tipo
     */
    @GetMapping("/skins/{tipoId}")
    public List<Skin> obtenerSkins(@PathVariable Long tipoId) {
        return skinRepository.findByTipoId(tipoId);
    }
}
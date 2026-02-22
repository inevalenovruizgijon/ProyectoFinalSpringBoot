package com.example.demo.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

import com.example.demo.entity.Skin;
import com.example.demo.repository.SkinRepository;

import io.swagger.v3.oas.annotations.Operation;
import io.swagger.v3.oas.annotations.tags.Tag;

/**
 * Controlador REST para gestionar las skins de Counter-Strike 2.
 * Proporciona endpoints para CRUD y búsquedas filtradas.
 */
@RestController
@RequestMapping("/api/skins")
@Tag(name = "Skins CS2", description = "Gestión skins Counter-Strike 2")
public class SkinRestController {

    @Autowired 
    private SkinRepository repo;

    /**
     * Obtiene una skin por su ID.
     *
     * @param id ID de la skin
     * @return Skin si existe, o null si no se encuentra
     */
    @GetMapping("/{id}")
    @Operation(summary = "Obtener skin por ID", description = "Retorna skin o null si no existe")
    public Skin get(@PathVariable Long id) {
        return repo.findById(id).orElse(null);
    }

    /**
     * Añade una nueva skin a la base de datos.
     *
     * @param skin Objeto Skin en formato JSON
     * @return La skin guardada en la base de datos
     */
    @PostMapping
    @Operation(summary = "Añadir nueva skin", description = "Guarda skin en BD")
    public Skin add(@RequestBody Skin skin) {
        return repo.save(skin);
    }

    /**
     * Elimina una skin por su ID.
     *
     * @param id ID de la skin a eliminar
     */
    @DeleteMapping("/{id}")
    @Operation(summary = "Borrar skin por ID")
    public void delete(@PathVariable Long id) {
        repo.deleteById(id);
    }

    /**
     * Busca skins cuyo nombre contiene un patrón específico.
     * La búsqueda no distingue mayúsculas/minúsculas.
     *
     * @param pattern Patrón de búsqueda en el nombre de la skin
     * @return Lista de skins que coinciden con el patrón
     */
    @GetMapping("/search")
    @Operation(summary = "Buscar skins", description = "Patrón case-insensitive en nombre")
    public List<Skin> search(@RequestParam String pattern) {
        return repo.findByNombreContainingIgnoreCase(pattern);
    }

    /**
     * Obtiene todas las skins pertenecientes a una categoría específica.
     *
     * @param categoriaId ID de la categoría
     * @return Lista de skins de la categoría indicada
     */
    @GetMapping("/byCategoria/{categoriaId}")
    @Operation(summary = "Obtener skins por categoría")
    public List<Skin> getByCategoria(@PathVariable Long categoriaId) {
        return repo.findByTipoCategoriaId(categoriaId);
    }

    /**
     * Obtiene todas las skins pertenecientes a un tipo específico.
     *
     * @param tipoId ID del tipo
     * @return Lista de skins del tipo indicado
     */
    @GetMapping("/byTipo/{tipoId}")
    @Operation(summary = "Obtener skins por tipo")
    public List<Skin> getByTipo(@PathVariable Long tipoId) {
        return repo.findByTipoId(tipoId);
    }
}
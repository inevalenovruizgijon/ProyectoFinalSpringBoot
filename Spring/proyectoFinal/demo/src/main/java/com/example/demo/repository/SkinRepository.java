package com.example.demo.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.demo.entity.Skin;

/**
 * Repositorio JPA para la entidad {@link Skin}.
 * Proporciona métodos para operaciones CRUD y consultas personalizadas.
 */
public interface SkinRepository extends JpaRepository<Skin, Long> {

    /**
     * Busca skins cuyo nombre contenga el patrón especificado (case-insensitive).
     * 
     * @param pattern Subcadena que se busca en el nombre
     * @return Lista de skins que coinciden con el patrón
     */
    List<Skin> findByNombreContainingIgnoreCase(String pattern);

    /**
     * Obtiene todas las skins asociadas a un tipo específico.
     * 
     * @param tipoId ID del tipo
     * @return Lista de skins del tipo dado
     */
    List<Skin> findByTipoId(Long tipoId);

    /**
     * Obtiene todas las skins asociadas a una categoría específica.
     * 
     * @param categoriaId ID de la categoría
     * @return Lista de skins de la categoría dada
     */
    List<Skin> findByTipoCategoriaId(Long categoriaId);
}
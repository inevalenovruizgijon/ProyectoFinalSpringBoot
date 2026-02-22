package com.example.demo.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.demo.entity.Tipo;

public interface TipoRepository extends JpaRepository<Tipo, Long> {
    List<Tipo> findByCategoriaId(Long categoriaId);
}

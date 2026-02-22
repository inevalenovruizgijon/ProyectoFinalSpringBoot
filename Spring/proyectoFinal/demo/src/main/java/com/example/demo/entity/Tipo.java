package com.example.demo.entity;

import java.util.List;

import com.fasterxml.jackson.annotation.JsonIgnore;
import com.fasterxml.jackson.annotation.JsonIgnoreProperties;

import jakarta.persistence.CascadeType;
import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
import jakarta.persistence.OneToMany;
import jakarta.persistence.Table;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

/**
 * Entidad que representa un Tipo de Skin.
 * Cada tipo pertenece a una categoría y puede tener varias skins asociadas.
 */
@Entity
@Data
@NoArgsConstructor
@AllArgsConstructor
@Table(name = "tipo")
public class Tipo {

    /**
     * Identificador único del tipo (autogenerado).
     */
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    /**
     * Nombre del tipo.
     */
    @Column(nullable = false)
    private String nombre;

    /**
     * Categoría a la que pertenece el tipo.
     * Se ignoran los tipos al serializar la categoría para evitar bucles infinitos.
     */
    @ManyToOne
    @JoinColumn(name = "categoria_id", nullable = false)
    @JsonIgnoreProperties("tipos")
    private Categoria categoria;

    /**
     * Lista de skins que pertenecen a este tipo.
     * Se ignora al serializar para evitar bucles infinitos Skin -> Tipo -> Skin.
     */
    @OneToMany(mappedBy = "tipo", cascade = CascadeType.ALL)
    @JsonIgnore
    private List<Skin> skins;
}
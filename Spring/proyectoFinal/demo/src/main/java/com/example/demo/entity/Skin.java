package com.example.demo.entity;

import jakarta.persistence.DiscriminatorColumn;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Inheritance;
import jakarta.persistence.InheritanceType;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
import jakarta.persistence.Table;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

/**
 * Entidad que representa una Skin de Counter-Strike.
 * Contiene información como nombre, precio, rareza, imagen y relaciones con Tipo, Categoría y propietario.
 */
@Entity
@Data
@NoArgsConstructor
@AllArgsConstructor
@Table(name = "skin")
public class Skin {

    /**
     * Identificador único de la skin (autogenerado).
     */
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    /**
     * Nombre de la skin.
     */
    private String nombre;

    /**
     * URL de la imagen de la skin.
     */
    private String imagenUrl;

    /**
     * Precio de la skin.
     */
    private double precio;

    /**
     * Rareza de la skin (por ejemplo, común, rara, épica).
     */
    private String rareza;

    /**
     * Relación Many-to-One con la entidad Tipo.
     */
    @ManyToOne
    @JoinColumn(name = "tipo_id", nullable = false)
    private Tipo tipo;

    /**
     * Relación Many-to-One con la entidad Categoría.
     */
    @ManyToOne
    @JoinColumn(name = "categoria_id", nullable = false)
    private Categoria categoria;

    /**
     * Relación Many-to-One con la entidad User (propietario de la skin). Opcional.
     */
    @ManyToOne
    @JoinColumn(name = "owner_id")
    private User owner;

    /**
     * Constructor práctico para crear una skin sin ID ni propietario.
     *
     * @param nombre    Nombre de la skin
     * @param precio    Precio de la skin
     * @param imagenUrl URL de la imagen
     * @param tipo      Tipo de la skin
     * @param categoria Categoría de la skin
     * @param rareza    Rareza de la skin
     */
    public Skin(String nombre, double precio, String imagenUrl, Tipo tipo, Categoria categoria, String rareza) {
        this.nombre = nombre;
        this.precio = precio;
        this.imagenUrl = imagenUrl;
        this.tipo = tipo;
        this.categoria = categoria;
        this.rareza = rareza;
    }
}
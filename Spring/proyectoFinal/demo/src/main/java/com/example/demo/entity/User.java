package com.example.demo.entity;

import java.util.ArrayList;
import java.util.List;

import jakarta.persistence.CascadeType;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.Id;
import jakarta.persistence.OneToMany;
import jakarta.persistence.Table;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

/**
 * Entidad que representa un usuario del sistema.
 * Un usuario tiene un correo, un nombre, una contraseña y puede poseer varias skins.
 */
@Entity
@Data
@NoArgsConstructor
@AllArgsConstructor
@Table(name = "users")
public class User {

    /**
     * Identificador único del usuario (autogenerado).
     */
    @Id
    @GeneratedValue
    private Long id;

    /**
     * Correo electrónico del usuario, usado para login y notificaciones.
     */
    private String correo;

    /**
     * Nombre de usuario.
     */
    private String nombre;

    /**
     * Contraseña del usuario (debería estar encriptada en la base de datos).
     */
    private String contrasena;

    /**
     * Lista de skins que posee el usuario.
     * CascadeType.ALL asegura que se propaguen los cambios al eliminar o actualizar.
     * orphanRemoval = true elimina skins huérfanas cuando se quita del usuario.
     */
    @OneToMany(mappedBy = "owner", cascade = CascadeType.ALL, orphanRemoval = true)
    private List<Skin> skins = new ArrayList<>();

    /**
     * Constructor práctico sin ID, para crear un usuario nuevo.
     * @param correo Correo electrónico del usuario
     * @param nombre Nombre del usuario
     * @param contrasena Contraseña del usuario
     */
    public User(String correo, String nombre, String contrasena) {
        this.correo = correo;
        this.nombre = nombre;
        this.contrasena = contrasena;
        this.skins = new ArrayList<>();
    }
}
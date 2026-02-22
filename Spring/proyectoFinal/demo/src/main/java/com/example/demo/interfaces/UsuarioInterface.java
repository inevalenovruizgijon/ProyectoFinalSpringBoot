package com.example.demo.interfaces;

/**
 * Interfaz que define los métodos básicos que una clase User debe implementar.
 * Proporciona acceso al correo, nombre y contraseña del usuario.
 */
public interface UsuarioInterface {

    /**
     * Obtiene el correo electrónico del usuario.
     * @return correo del usuario
     */
    String getCorreo();

    /**
     * Obtiene el nombre del usuario.
     * @return nombre del usuario
     */
    String getNombre();

    /**
     * Obtiene la contraseña del usuario.
     * @return contraseña del usuario
     */
    String getContrasena();
}
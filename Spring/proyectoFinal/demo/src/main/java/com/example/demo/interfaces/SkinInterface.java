package com.example.demo.interfaces;

/**
 * Interfaz que define los métodos básicos que una clase Skin debe implementar.
 * Proporciona acceso al nombre, precio e imagen de la skin.
 */
public interface SkinInterface {

    /**
     * Obtiene el nombre de la skin.
     * @return nombre de la skin
     */
    String getNombre();

    /**
     * Obtiene el precio de la skin.
     * @return precio de la skin en euros
     */
    double getPrecio();

    /**
     * Obtiene la URL de la imagen de la skin.
     * @return URL de la imagen de la skin
     */
    String getImagenUrl();
}
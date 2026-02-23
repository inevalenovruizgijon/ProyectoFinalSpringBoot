package com.example.demo.controller;

import java.util.List;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;

import com.example.demo.repository.CategoriaRepository;

/**
 * Controlador que gestiona la navegación principal del menú de la aplicación.
 * Permite acceder a las vistas de compra, venta de skins y al menú principal.
 */
@Controller
public class MenuController {
    
    private final CategoriaRepository categoriaRepository;

    /**
     * Constructor que inyecta el repositorio de categorías.
     * 
     * @param categoriaRepository Repositorio para acceder a las categorías de skins
     */
    public MenuController(CategoriaRepository categoriaRepository) {
        this.categoriaRepository = categoriaRepository;
    }

    /**
     * Muestra la página de compra.
     *
     * @return Nombre de la vista "comprar"
     */
    @GetMapping("/menu/comprar")
    public String mostrarComprar() {
        return "comprar";
    }
    
    /**
     * Muestra el menú principal de la aplicación.
     *
     * @return Nombre de la vista "menu"
     */
    @GetMapping("/menu")
    public String mostrarMenu() {
        return "menu";
    }

    /**
     * Muestra la página para vender una skin.
     * Se envía al modelo la lista de categorías para poder seleccionarlas.
     *
     * @param model Modelo para enviar datos a la vista
     * @return Nombre de la vista "vender"
     */
    @GetMapping("/vender")
    public String mostrarVender(Model model) {
        model.addAttribute("categorias", categoriaRepository.findAll());
        return "vender";
    }

}
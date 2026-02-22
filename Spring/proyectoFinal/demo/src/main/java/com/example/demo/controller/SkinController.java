package com.example.demo.controller;

import java.security.Principal;
import java.util.ArrayList;
import java.util.Comparator;
import java.util.List;
import java.util.Locale;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.MessageSource;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.ResponseBody;

import com.example.demo.entity.Categoria;
import com.example.demo.entity.Skin;
import com.example.demo.entity.Tipo;
import com.example.demo.entity.User;
import com.example.demo.repository.CategoriaRepository;
import com.example.demo.repository.SkinRepository;
import com.example.demo.repository.TipoRepository;
import com.example.demo.repository.UserRepository;
import com.example.demo.service.EmailService;

import jakarta.servlet.http.HttpSession;

/**
 * Controlador principal del proyecto Demo para la gestión de skins.
 * Contiene métodos para añadir skins al carrito, realizar compras,
 * vender skins y mostrar las vistas de carrito y comprar.
 */
@Controller
public class SkinController {
    @Autowired
private MessageSource messageSource;

    @Autowired
    private EmailService emailService;

    @Autowired
    private SkinRepository skinRepo;  // Inyecta repo JPA

    @Autowired
    private UserRepository userRepo;

    @Autowired
    private CategoriaRepository categoriaRepository;  // Repo de categoría

    @Autowired
    private TipoRepository tipoRepository;           // Repo de tipo

    /**
     * Añade una skin al carrito de sesión.
     *
     * @param id      ID de la skin a añadir
     * @param session Sesión HTTP para almacenar el carrito
     * @return Redirección a la página de comprar
     */
    @PostMapping("/añadirCarrito")
    public String añadirAlCarrito(@RequestParam Long id, HttpSession session) {
        Optional<Skin> optSkin = skinRepo.findById(id);
        if (optSkin.isPresent()) {
            List<Skin> carrito = (List<Skin>) session.getAttribute("carrito");
            if (carrito == null) carrito = new ArrayList<>();
            carrito.add(optSkin.get());
            session.setAttribute("carrito", carrito);
        }
        return "redirect:/comprar";
    }

    /**
     * Procesa la compra de una skin individual.
     * Envía un email de confirmación, elimina la skin de la BD
     * y la elimina del carrito de sesión si estaba allí.
     *
     * @param id        ID de la skin a comprar
     * @param session   Sesión HTTP para manejar el carrito
     * @param principal Usuario autenticado
     * @param model     Modelo para enviar mensajes a la vista
     * @return Vista del carrito
     */
    @PostMapping("/comprar")
    public String procesarCompra(@RequestParam Long id, HttpSession session, Principal principal, Model model, Locale locale) {
        Optional<Skin> optSkin = skinRepo.findById(id);
        if (optSkin.isPresent()) {
            Skin skin = optSkin.get();

            User usuario = userRepo.findByNombre(principal.getName());
            String emailUsuario = usuario.getCorreo();

            emailService.enviarEmail(
                emailUsuario,
                "Compra realizada",
                "Has comprado la skin: " + skin.getNombre() + " por " + skin.getPrecio() + " €"
            );

            skinRepo.deleteById(id);

            List<Skin> carrito = (List<Skin>) session.getAttribute("carrito");
            if (carrito != null) {
                carrito.remove(skin);
                session.setAttribute("carrito", carrito);
            }

            model.addAttribute("mensaje", messageSource.getMessage("mensaje.compraExito", null, locale));
        } else {
            model.addAttribute("mensaje", messageSource.getMessage("mensaje.skinNoExiste", null, locale));
        }

        return "carrito";
    }
    /**
     * Procesa la venta de una nueva skin.
     * Asigna la categoría desde el tipo seleccionado y guarda la skin en la BD.
     *
     * @param tipoId    ID del tipo de la skin
     * @param skinNombre Nombre de la skin
     * @param precio    Precio de la skin
     * @return Redirección al menú principal
     */
    @PostMapping("/venderSkin")
    public String procesarVender(@RequestParam Long tipoId,
                                 @RequestParam String skinNombre,
                                 @RequestParam double precio) {

        Tipo tipo = tipoRepository.findById(tipoId)
                .orElseThrow(() -> new IllegalArgumentException("Tipo no encontrado"));

        Skin nueva = new Skin();
        nueva.setNombre(skinNombre);
        nueva.setTipo(tipo);
        nueva.setCategoria(tipo.getCategoria());
        nueva.setPrecio(precio);

        skinRepo.save(nueva);

        return "redirect:/menu";
    }

    /**
     * Muestra el carrito con todas las skins añadidas.
     *
     * @param session Sesión HTTP con el carrito
     * @param model   Modelo para enviar datos a la vista
     * @return Vista del carrito
     */
    @GetMapping("/carrito")
    public String mostrarCarrito(HttpSession session, Model model) {
        List<Skin> carrito = (List<Skin>) session.getAttribute("carrito");
        if (carrito == null) carrito = new ArrayList<>();
        model.addAttribute("carrito", carrito);

        double total = carrito.stream().mapToDouble(Skin::getPrecio).sum();
        model.addAttribute("totalCarrito", total);

        return "carrito";
    }

    /**
     * Compra todas las skins del carrito.
     * Envía un email con todas las skins compradas y limpia el carrito.
     *
     * @param session   Sesión HTTP con el carrito
     * @param principal Usuario autenticado
     * @param model     Modelo para enviar mensajes a la vista
     * @return Vista del carrito
     */
     @PostMapping("/comprarCarrito")
    public String comprarTodo(HttpSession session, Principal principal, Model model, Locale locale) {

        List<Skin> carrito = (List<Skin>) session.getAttribute("carrito");

        if (carrito == null || carrito.isEmpty()) {
            model.addAttribute("mensaje", messageSource.getMessage("mensaje.carritoVacio", null, locale));
            model.addAttribute("carrito", new ArrayList<>());
            model.addAttribute("totalCarrito", 0.0);
            return "carrito";
        }

        User usuario = userRepo.findByNombre(principal.getName());
        String emailUsuario = usuario.getCorreo();

        StringBuilder mensajeEmail = new StringBuilder("Has comprado las siguientes skins:\n\n");
        for (Skin skin : carrito) {
            mensajeEmail.append("- ").append(skin.getNombre())
                        .append(" por ").append(skin.getPrecio()).append(" €\n");
            skinRepo.deleteById(skin.getId());
        }

        try {
            emailService.enviarEmail(
                emailUsuario,
                "Compra del carrito realizada",
                mensajeEmail.toString()
            );
        } catch (Exception e) {
            model.addAttribute("mensaje", messageSource.getMessage("mensaje.emailError", null, locale));
            session.removeAttribute("carrito");
            model.addAttribute("carrito", new ArrayList<>());
            model.addAttribute("totalCarrito", 0.0);
            return "carrito";
        }

        session.removeAttribute("carrito");
        model.addAttribute("mensaje", messageSource.getMessage("mensaje.carritoComprado", null, locale));
        model.addAttribute("carrito", new ArrayList<>());
        model.addAttribute("totalCarrito", 0.0);

        return "carrito";
    }

    /**
     * Devuelve los tipos asociados a una categoría (API REST).
     *
     * @param categoriaId ID de la categoría
     * @return Lista de tipos de la categoría
     */
    @GetMapping("/api/categorias/{categoriaId}/tipos")
    @ResponseBody
    public List<Tipo> obtenerTiposPorCategoria(@PathVariable Long categoriaId) {
        return tipoRepository.findByCategoriaId(categoriaId);
    }

    /**
     * Muestra la página de compra con todas las skins disponibles.
     * Permite ordenar por nombre o precio.
     *
     * @param orden Parámetro opcional para el orden ("nombreAsc", "nombreDesc", "precioAsc", "precioDesc")
     * @param model Modelo para enviar los datos a la vista
     * @return Vista de compra
     */
    @GetMapping("/comprar")
    public String mostrarComprar(@RequestParam(required = false) String orden, Model model) {
        List<Skin> listaSkins = skinRepo.findAll();

        if (orden != null) {
            switch (orden) {
                case "nombreAsc":
                    listaSkins.sort(Comparator.comparing(Skin::getNombre));
                    break;
                case "nombreDesc":
                    listaSkins.sort(Comparator.comparing(Skin::getNombre).reversed());
                    break;
                case "precioAsc":
                    listaSkins.sort(Comparator.comparingDouble(Skin::getPrecio));
                    break;
                case "precioDesc":
                    listaSkins.sort(Comparator.comparingDouble(Skin::getPrecio).reversed());
                    break;
            }
        }

        model.addAttribute("skinsDisponibles", listaSkins);
        return "comprar";
    }

}
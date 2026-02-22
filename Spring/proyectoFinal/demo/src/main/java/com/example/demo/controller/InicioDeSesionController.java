package com.example.demo.controller;

import java.util.Locale;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.MessageSource;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

import com.example.demo.entity.User;
import com.example.demo.service.UserService;

import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse; 
import jakarta.servlet.http.HttpSession;

/**
 * Controlador para el inicio de sesión y creación de cuentas de usuario.
 * Maneja las rutas de login, registro y gestión de sesión.
 */
@Controller
public class InicioDeSesionController {

    @Autowired
    private MessageSource messageSource;
    @Autowired
    private UserService userService;  

    /**
     * Muestra la página de inicio de sesión.
     *
     * @return nombre de la vista "inicioDeSesion"
     */
    @GetMapping("/")
    public String mostrarLogin(HttpServletRequest request, Model model) {
        model.addAttribute("currentUrl", request.getRequestURI());
        return "inicioDeSesion";
}

    /**
     * Muestra la página de creación de cuenta.
     *
     * @return nombre de la vista "crearCuenta"
     */
    @GetMapping("/crearCuenta")
    public String mostrarCrearCuenta() {
        return "crearCuenta";
    }

    /**
     * Crea una nueva cuenta de usuario.
     * Valida que el nombre y el correo no estén registrados previamente.
     *
     * @param correo Correo electrónico del usuario
     * @param nombre Nombre de usuario
     * @param contrasena Contraseña del usuario
     * @param response HttpServletResponse (no usado actualmente)
     * @param model Modelo para pasar atributos a la vista
     * @return vista de inicio de sesión si la cuenta se crea correctamente, 
     *         o vista de creación de cuenta si hay errores
     */
    @PostMapping("/crearNuevaCuenta")
public String crearCuenta(@RequestParam String correo, 
                          @RequestParam String nombre, 
                          @RequestParam String contrasena, 
                          HttpServletResponse response, 
                          Model model,
                          Locale locale) {
    if (userService.existsByNombre(nombre)) {
        model.addAttribute("error", messageSource.getMessage("error.nombreExiste", null, locale));
        return "crearCuenta";
    }
    if (userService.existsByCorreo(correo)) {
        model.addAttribute("error", messageSource.getMessage("error.correoExiste", null, locale));
        return "crearCuenta";
    }
    userService.register(correo, nombre, contrasena);
    return "inicioDeSesion";
}

    /**
     * Inicia sesión de un usuario existente.
     * Valida nombre y contraseña, y guarda el usuario en la sesión.
     *
     * @param nombre Nombre de usuario
     * @param contrasena Contraseña del usuario
     * @param session HttpSession para guardar la información del usuario activo
     * @param model Modelo para pasar atributos a la vista
     * @return vista "menu" si el login es correcto, 
     *         o vista "inicioDeSesion" si hay error
     */
   @PostMapping("/iniciarSesion")
public String iniciarSesion(@RequestParam String nombre, 
                            @RequestParam String contrasena, 
                            HttpSession session, 
                            Model model,
                            Locale locale) {
    User user = userService.findByNombreAndContrasena(nombre, contrasena);
    if (user != null) {
        session.setAttribute("usuarioActivo", user.getNombre());
        model.addAttribute("usuario", user.getNombre());
        return "menu";
    } else {
        model.addAttribute("error", messageSource.getMessage("error.loginIncorrecto", null, locale));
        return "inicioDeSesion";
    }
}
}
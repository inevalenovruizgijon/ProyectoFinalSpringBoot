package com.example.demo.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Service;

import com.example.demo.entity.User;
import com.example.demo.repository.UserRepository;

/**
 * Servicio para gestionar operaciones relacionadas con usuarios.
 * Proporciona métodos para registro, búsqueda, verificación y anonimización de usuarios.
 */
@Service
public class UserService {

    @Autowired
    private UserRepository userRepository;

    @Autowired
    private PasswordEncoder encoder;

    /**
     * Busca un usuario por nombre y contraseña.
     * La contraseña se compara usando {@link PasswordEncoder#matches(CharSequence, String)}.
     *
     * @param nombre          Nombre del usuario.
     * @param rawContrasena   Contraseña sin codificar.
     * @return El usuario si las credenciales son correctas, o {@code null} si no existen o no coinciden.
     */
    public User findByNombreAndContrasena(String nombre, String rawContrasena) {
        User user = userRepository.findByNombre(nombre);
        if (user != null && encoder.matches(rawContrasena, user.getContrasena())) {
            return user;
        }
        return null;
    }

    /**
     * Registra un nuevo usuario en la base de datos.
     * Lanza {@link IllegalArgumentException} si el nombre o correo ya existen.
     *
     * @param correo      Correo electrónico del usuario.
     * @param nombre      Nombre del usuario.
     * @param rawPassword Contraseña sin codificar.
     * @return El usuario guardado en la base de datos.
     */
    public User register(String correo, String nombre, String rawPassword) {
        if (existsByNombre(nombre) || existsByCorreo(correo)) {
            throw new IllegalArgumentException("Usuario o correo ya existen");
        }
        User user = new User(correo, nombre, encoder.encode(rawPassword));
        return userRepository.save(user);
    }

    /**
     * Verifica si ya existe un usuario con un nombre determinado.
     *
     * @param nombre Nombre del usuario.
     * @return {@code true} si existe, {@code false} en caso contrario.
     */
    public boolean existsByNombre(String nombre) {
        return userRepository.findByNombre(nombre) != null;
    }

    /**
     * Verifica si ya existe un usuario con un correo determinado.
     *
     * @param correo Correo electrónico del usuario.
     * @return {@code true} si existe, {@code false} en caso contrario.
     */
    public boolean existsByCorreo(String correo) {
        return userRepository.findByCorreo(correo) != null;
    }

    /**
     * Guarda un usuario en la base de datos.
     *
     * @param user Usuario a guardar.
     * @return Usuario guardado.
     */
    public User save(User user) {
        return userRepository.save(user);
    }

    /**
     * Obtiene todos los usuarios de la base de datos.
     *
     * @return Lista de todos los usuarios.
     */
    public List<User> findAll() {
        return userRepository.findAll();
    }

    /**
     * Anonimiza todos los datos de los usuarios.
     * Establece {@code nombre}, {@code correo} y {@code contrasena} a {@code null}.
     */
    public void clearAllUserData() {
        List<User> users = userRepository.findAll();
        for (User user : users) {
            user.setNombre(null);
            user.setCorreo(null);
            user.setContrasena(null);
            userRepository.save(user);
        }
    }
}
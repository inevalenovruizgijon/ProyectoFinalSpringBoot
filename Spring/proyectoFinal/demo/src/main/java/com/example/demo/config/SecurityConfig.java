package com.example.demo.config;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.config.annotation.web.configuration.EnableWebSecurity;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.security.web.SecurityFilterChain;

import com.example.demo.entity.User;
import com.example.demo.repository.UserRepository;

/**
 * Clase de configuración de seguridad de Spring Security para la aplicación.
 * Configura la autenticación de usuarios, el cifrado de contraseñas y las reglas de acceso a rutas.
 */
@Configuration
@EnableWebSecurity
public class SecurityConfig {

    /**
     * Bean de codificador de contraseñas BCrypt.
     * Se usa para almacenar contraseñas cifradas en la base de datos.
     *
     * @return BCryptPasswordEncoder
     */
    @Bean
    public BCryptPasswordEncoder encoder() {
        return new BCryptPasswordEncoder();
    }

    /**
     * Configura la carga de usuarios desde la base de datos para autenticación.
     * 
     * @param userRepo Repositorio de usuarios
     * @return UserDetailsService que Spring Security usa para autenticar
     */
    @Bean
    public UserDetailsService userDetailsService(UserRepository userRepo) {
        return username -> {
            User user = userRepo.findByNombre(username);
            if (user == null) throw new UsernameNotFoundException("User not found");
            return org.springframework.security.core.userdetails.User
                    .withUsername(user.getNombre())
                    .password(user.getContrasena())
                    .roles("USER")  // Todos los usuarios tendrán rol USER
                    .build();
        };
    }

    /**
     * Configura la seguridad HTTP de la aplicación.
     * Define qué rutas son públicas, cuál es la página de login, logout y la gestión de sesiones.
     *
     * @param http HttpSecurity
     * @return SecurityFilterChain configurada
     * @throws Exception en caso de error de configuración
     */
    @Bean
    public SecurityFilterChain filter(HttpSecurity http) throws Exception {
        http
            // Reglas de autorización
            .authorizeHttpRequests(auth -> auth
                .requestMatchers(
                    "/", 
                    "/inicioSesion",
                    "/iniciarSesion", 
                    "/crearCuenta", 
                    "/crearNuevaCuenta",   
                    "/inicioDeSesion.css"
                ).permitAll()  // Rutas públicas
                .anyRequest().authenticated() // Resto de rutas requieren login
            )

            // Configuración de formulario de login
            .formLogin(form -> form
                .loginPage("/")                      // Página de login
                .loginProcessingUrl("/iniciarSesion") // URL que procesa POST
                .usernameParameter("nombre")          // Campo del formulario para username
                .passwordParameter("contrasena")      // Campo del formulario para password
                .defaultSuccessUrl("/menu", true)     // Página a redirigir al login exitoso
                .failureUrl("/?error")                // Página en caso de error
                .permitAll()
            )

            // Configuración de logout
            .logout(logout -> logout
                .logoutUrl("/logout")
                .logoutSuccessUrl("/?logout")
                .permitAll()
            )

            // Configuración de sesiones
            .sessionManagement(session -> session
                .maximumSessions(1)          // Máximo una sesión por usuario
                .maxSessionsPreventsLogin(false) // Permite login reemplazando sesión existente
            );

        return http.build();
    }
}
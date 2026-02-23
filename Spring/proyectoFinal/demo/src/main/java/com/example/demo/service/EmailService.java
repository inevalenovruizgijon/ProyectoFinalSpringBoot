package com.example.demo.service;


import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.mail.SimpleMailMessage;
import org.springframework.mail.javamail.JavaMailSender;
import org.springframework.stereotype.Service;
import org.springframework.web.client.RestTemplate;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.http.*;
import org.springframework.stereotype.Service;
import org.springframework.web.client.RestTemplate;


/**
 * Servicio para el envío de correos electrónicos.
 * Utiliza {@link JavaMailSender} de Spring para enviar emails simples.
 */
@Service
public class EmailService {

    @Value("${brevo.api.key}")
    private String apiKey;

    public void enviarEmail(String destinatario, String asunto, String contenido) {

        RestTemplate restTemplate = new RestTemplate();
        String url = "https://api.brevo.com/v3/smtp/email";

        HttpHeaders headers = new HttpHeaders();
        headers.setContentType(MediaType.APPLICATION_JSON);
        headers.set("api-key", apiKey);

        Map<String, Object> body = Map.of(
                "sender", Map.of("email", "nevalenov.iaroslav@gmail.com"),
                "to", new Object[]{ Map.of("email", destinatario) },
                "subject", asunto,
                "htmlContent", contenido
        );

        HttpEntity<Map<String, Object>> request =
                new HttpEntity<>(body, headers);

        restTemplate.postForEntity(url, request, String.class);
    }

}
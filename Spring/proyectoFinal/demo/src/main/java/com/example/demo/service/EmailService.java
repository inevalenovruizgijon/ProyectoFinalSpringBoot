package com.example.demo.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.mail.SimpleMailMessage;
import org.springframework.mail.javamail.JavaMailSender;
import org.springframework.stereotype.Service;

/**
 * Servicio para el envío de correos electrónicos.
 * Utiliza {@link JavaMailSender} de Spring para enviar emails simples.
 */
@Service
public class EmailService {

    @Autowired
    private JavaMailSender mailSender;

    /**
     * Envía un correo electrónico simple a un destinatario.
     *
     * @param destino Dirección de correo electrónico del destinatario.
     * @param asunto  Asunto del correo electrónico.
     * @param mensaje Cuerpo del correo electrónico.
     */
    public void enviarEmail(String destino, String asunto, String mensaje) {
        SimpleMailMessage mail = new SimpleMailMessage();
        mail.setTo(destino);
        mail.setSubject(asunto);
        mail.setText(mensaje);
        mailSender.send(mail);
    }
}
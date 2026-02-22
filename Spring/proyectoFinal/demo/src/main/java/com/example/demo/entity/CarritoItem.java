package com.example.demo.entity;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.Id;
import jakarta.persistence.ManyToOne;
import lombok.Data;

@Entity 
@Data
public class CarritoItem {
    @Id @GeneratedValue Long id;
    @ManyToOne Skin skin;
    @ManyToOne User user;
    int cantidad;
}

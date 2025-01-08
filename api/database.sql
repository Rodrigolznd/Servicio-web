CREATE DATABASE servicios_web;

USE servicios_web;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
INSERT INTO usuarios (usuario, password) VALUES
('admin', PASSWORD('admin123')),
('user', PASSWORD('user123'));

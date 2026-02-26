CREATE DATABASE chefika;

USE chefika;

CREATE TABLE platos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(6,2) NOT NULL,
    imagen VARCHAR(255)
);
INSERT INTO platos (nombre, descripcion, precio, imagen)
VALUES 
('Paella Valenciana', 'Paella tradicional con mariscos frescos', 14.50, 'paella.jpg'),
('Hamburguesa Gourmet', 'Carne premium con queso cheddar', 12.00, 'burger.jpg'),
('Tarta de Queso', 'Postre casero con frutos rojos', 6.50, 'tarta.jpg');
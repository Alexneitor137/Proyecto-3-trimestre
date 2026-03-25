-- Creación de la base de datos
CREATE DATABASE IF NOT EXISTS chefika_db;
USE chefika_db;

-- Tabla para el Menú
CREATE TABLE platos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2) NOT NULL,
    imagen VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla para las Reservas
CREATE TABLE reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_cliente VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    email VARCHAR(100),
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    num_personas INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

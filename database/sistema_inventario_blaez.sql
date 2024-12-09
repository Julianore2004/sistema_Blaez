-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Base de datos: `sistema_inventario_blaez`

-- --------------------------------------------------------

-- Tabla: categorias
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCategoria` varchar(255) NOT NULL,
  `descripcion_categoria` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Datos iniciales para categorias
INSERT INTO `categorias` (`id`, `nombreCategoria`, `descripcion_categoria`, `date_added`) VALUES
(1, 'Repuestos', 'Equipos para el hogar', '2016-12-19 00:00:00'),
(4, 'Equipos', 'Equipos stihl', '2016-12-19 21:06:37'),
(5, 'Accesorios', 'Accesorios stihl', '2016-12-19 21:06:39');

-- --------------------------------------------------------

-- Tabla: estudiantes
CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombrecompleto` varchar(255) NOT NULL,
  `programa_de_estudios` varchar(255) NOT NULL,
  `semestre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Datos iniciales para estudiantes
INSERT INTO `estudiantes` (`id`, `nombrecompleto`, `programa_de_estudios`, `semestre`) VALUES
(1, 'Juan Pérez', 'Ingeniería de Sistemas', '7° Semestre');

-- --------------------------------------------------------

-- Tabla: inventario
CREATE TABLE `inventario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_patrimonial` varchar(50) NOT NULL,
  `denominacion` varchar(255) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL,
  `serie` varchar(100) NOT NULL,
  `dimensiones` varchar(100) NOT NULL,
  `valor` varchar(50) NOT NULL,
  `situacion` varchar(100) NOT NULL,
  `estado_de_observacion` varchar(255) NOT NULL,
  `observaciones` varchar(100) NOT NULL,
  `imagen` varchar(500) NOT NULL,
  `id_estudiante` int(11),
  `id_categoria` int(11),
  PRIMARY KEY (`id`),
  KEY `id_estudiante` (`id_estudiante`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `fk_inventario_categorias` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_inventario_estudiantes` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

-- Tabla: modulo
CREATE TABLE `modulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `id_inventario` int(11),
  `imagen` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_inventario` (`id_inventario`),

  CONSTRAINT `fk_modulo_inventario` FOREIGN KEY (`id_inventario`) REFERENCES `inventario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

-- Tabla: users
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `user_password_hash` varchar(255) NOT NULL,
  `user_email` varchar(64) NOT NULL,
  `date_added` datetime NOT NULL,
  `rol` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Datos iniciales para users
INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_name`, `user_password_hash`, `user_email`, `date_added`, `rol`) VALUES
(1, 'Obed', 'Alvarado', 'admin', '$2y$10$MPVHzZ2ZPOWmtUUGCq3RXu31OTB.jo7M9LZ7PmPQYmgETSNn19ejO', 'admin@admin.com', '2016-12-19 15:06:00', 'admin');

COMMIT;

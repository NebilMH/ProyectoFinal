SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `proyecto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proyecto`;

CREATE TABLE `ejercicios` (
  `id` int(11) NOT NULL,
  `urlP` varchar(70) COLLATE utf8mb4_spanish_ci NOT NULL,
  `imagen` varchar(70) COLLATE utf8mb4_spanish_ci NOT NULL,
  `titulo` varchar(70) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO `ejercicios` (`id`, `urlP`, `imagen`, `titulo`) VALUES
(1, 'abdominales.php', 'abdominales_.jpg', 'Abdominales'),
(3, 'biceps.php', 'biceps_.jpg', 'Biceps'),
(4, 'triceps.php', 'triceps_.jpg', 'Triceps'),
(5, 'teres.php', 'teres_.jpg', 'Teres'),
(6, 'trapecio.php', 'trapecio_.jpg', 'Trapecio'),
(7, 'isquiotibiales.php', 'isquiotibiales_.jpg', 'Isquiotibiales'),
(9, 'hombro.php', 'hombro_.jpg', 'Hombro'),
(10, 'pectorales.php', 'pectoral_.jpg', 'Pectorales'),
(13, 'dorsales.php', 'dorsales_.jpg', 'Dorsales'),
(14, 'gemelos.php', 'gemelos_.jpg', 'Gemelos');

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `seccion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre_producto` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `imagen` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO `productos` (`id`, `seccion`, `nombre_producto`, `descripcion`, `imagen`, `precio`) VALUES
(21, 'packs', 'Pack - Shaker', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto53.png', 21.95),
(22, 'packs', 'Pack - Shaker', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto52.png', 21.95),
(23, 'packs', 'Egg White Protein', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto48.png', 29.99),
(24, 'packs', 'Pack - Shaker + Proteina', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto47.png', 39.99),
(29, 'packs', 'Keep Hammering', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto30.png', 31.99),
(30, 'packs', 'Ammo', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto27.png', 19.99),
(31, 'shakers', 'Shaker Blanco', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto60.png', 14.95),
(32, 'shakers', 'Shaker Rojo', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto59.png', 14.95),
(33, 'shakers', 'Shaker Azul', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto58.png', 14.95),
(34, 'shakers', 'Shaker Negro + Naranja', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto57.png', 14.95),
(36, 'barritas', 'Peanut Butter Bliss', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto44.png', 35.95),
(37, 'barritas', 'Triple Chocolate Mudslide', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto43.png', 35.95),
(38, 'barritas', 'Conquer Caramel Crunch', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto26.png', 35.95),
(39, 'nuevos', 'Blue', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto42.png', 25.99),
(40, 'nuevos', 'Yellow', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto41.png', 29.95),
(41, 'nuevos', 'Peach', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto40.png', 29.95),
(42, 'nuevos', 'Watermelon', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto54.png', 9.99),
(43, 'ultimos', 'Blue Raspberry', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto55.png', 9.99),
(44, 'ultimos', 'Energy Focus', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto51.png', 9.95),
(45, 'ultimos', 'Yeti', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto23.png', 29.99),
(46, 'ultimos', 'Blue Yeti', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto24.png', 29.99),
(52, 'barritas', 'Frosted Cinnamon Swirl', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio illo totam doloribus voluptates possimus!', 'producto45.png', 35.95);

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'admin'),
(2, 'usuario');

CREATE TABLE `soporte` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `asunto` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `mensaje` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO `soporte` (`id`, `nombre`, `email`, `asunto`, `mensaje`) VALUES
(11, 'sdasdasd', 'nene21222122@gmail.com', 'dasda', 'asdasdad'),
(12, 'sdasdasd', 'nene21222122@gmail.com', 'asdsad', 'adada'),
(13, 'sada', 'nene21222122@gmail.com', 'dasda', 'asdasd'),
(14, 'sdasdasd', 'nene21222122@gmail.com', 'dsadadsd', 'sdasdasd');

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contraseña` varchar(254) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO `usuarios` (`id`, `id_rol`, `nombre`, `apellido`, `email`, `usuario`, `contraseña`) VALUES
(1, 1, 'Administrador', 'Administrador', 'admin@gmail.com', 'Admin', 'admin');


ALTER TABLE `ejercicios`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rol` (`rol`);

ALTER TABLE `soporte`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios_roles` (`id_rol`);


ALTER TABLE `ejercicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;


ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

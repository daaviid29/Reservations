-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2022 a las 19:10:34
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `example`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `idResource` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idTimeSlot` int(11) NOT NULL,
  `date` date NOT NULL,
  `remarks` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservations`
--

INSERT INTO `reservations` (`id`, `idResource`, `idUser`, `idTimeSlot`, `date`, `remarks`) VALUES
(1, 4, 3, 1, '2022-11-07', 'ninguna'),
(2, 5, 3, 7, '2022-11-08', 'Charla Explicativa sobre Seguridad Informática'),
(3, 1, 5, 1, '2022-11-07', 'ninguna'),
(4, 6, 11, 4, '2022-11-07', 'Alumnos de 1º de ESO A'),
(5, 5, 11, 20, '2022-11-10', 'Charla Sobre Desarrollo Web');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `location` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `resources`
--

INSERT INTO `resources` (`id`, `name`, `description`, `location`, `image`) VALUES
(1, 'Carrito de Ordenadores', 'Carrito de Carga de Portátiles', 'Planta 0', 'Assets/images/Resources/carrito-ordenadores.jpg'),
(2, 'Carrito de Ordenadores', 'Carrito de Carga de Portátiles', 'Planta 1', 'Assets/images/Resources/carrito-ordenadores.jpg'),
(3, 'Carrito de Ordenadores', 'Carrito de Carga de Portátiles', 'Planta 2', 'Assets/images/Resources/carrito-ordenadores.jpg'),
(4, 'Biblioteca', 'Reserva del espacio de la biblioteca ', 'Planta 1', 'Assets/images/Resources/477-1-978x652.jpg'),
(5, 'Salón de Actos', 'Reserva del espacio del salón de Actos', 'Planta 1', 'Assets/images/Resources/salon de actos.png'),
(6, 'Aulateca', 'Aulateca', 'Planta 0', 'Assets/images/Resources/sala_de_informatica.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `timeslots`
--

CREATE TABLE `timeslots` (
  `id` int(11) NOT NULL,
  `dayofweek` varchar(1000) NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `timeslots`
--

INSERT INTO `timeslots` (`id`, `dayofweek`, `starttime`, `endtime`) VALUES
(1, 'Lunes', '08:05:00', '09:05:00'),
(2, 'Lunes', '09:05:00', '10:05:00'),
(3, 'Lunes', '10:05:00', '11:05:00'),
(4, 'Lunes', '11:35:00', '12:35:00'),
(5, 'Lunes', '12:35:00', '13:35:00'),
(6, 'Lunes', '13:35:00', '14:35:00'),
(7, 'Martes', '08:05:00', '09:05:00'),
(8, 'Martes', '09:05:00', '10:05:00'),
(9, 'Martes', '10:05:00', '11:05:00'),
(10, 'Martes', '11:35:00', '12:35:00'),
(11, 'Martes', '12:35:00', '13:35:00'),
(12, 'Martes', '13:35:00', '14:35:00'),
(13, 'Miercoles', '08:05:00', '09:05:00'),
(14, 'Miercoles', '09:05:00', '10:05:00'),
(15, 'Miercoles', '10:05:00', '11:05:00'),
(16, 'Miercoles', '11:35:00', '12:35:00'),
(17, 'Miercoles', '12:35:00', '13:35:00'),
(18, 'Miercoles', '13:35:00', '14:35:00'),
(19, 'Jueves', '08:05:00', '09:05:00'),
(20, 'Jueves', '09:05:00', '10:05:00'),
(21, 'Jueves', '10:05:00', '11:05:00'),
(22, 'Jueves', '11:35:00', '12:35:00'),
(23, 'Jueves', '12:35:00', '13:35:00'),
(24, 'Jueves', '13:35:00', '14:35:00'),
(25, 'Viernes', '08:05:00', '09:05:00'),
(26, 'Viernes', '09:05:00', '10:05:00'),
(27, 'Viernes', '10:05:00', '11:05:00'),
(28, 'Viernes', '11:35:00', '12:35:00'),
(29, 'Viernes', '12:35:00', '13:35:00'),
(30, 'Viernes', '13:35:00', '14:35:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `realname` varchar(1000) NOT NULL,
  `lastname` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `realname`, `lastname`, `image`, `type`) VALUES
(1, 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'Assets/images/Users/PaolaQ_3mayo-961 copia.jpg', 0),
(2, 'soledadgarcia', 'soledad@iescelia.org', '6b2091bc3deac2bb9d76041ed955f0c0', 'Soledad', 'Amorós García', 'Assets/images/Users/Recurso 1.png', 1),
(3, 'danielandela', 'daniel@iescelia.org', '6b2091bc3deac2bb9d76041ed955f0c0', 'Daniel', 'Andela López', 'Assets/images/Users/Recurso 1.png', 1),
(4, 'josemariadorado', 'josemaria@iescelia.org', '6b2091bc3deac2bb9d76041ed955f0c0', 'Jose María', 'Dorado Ruiz', 'Assets/images/Users/Recurso 1.png', 1),
(5, 'nataliaarques', 'nataliaarques@iescelia.org', '6b2091bc3deac2bb9d76041ed955f0c0', 'Natalia', 'Arqués López', 'Assets/images/Users/Recurso 1.png', 1),
(6, 'estherbarahona', 'estherbarahona@iescelia.org', '6b2091bc3deac2bb9d76041ed955f0c0', 'Esther', 'Barahona Gutierrez', 'Assets/images/Users/Recurso 1.png', 1),
(7, 'luisbordona', 'luisbordona@iescelia.org', '6b2091bc3deac2bb9d76041ed955f0c0', 'Luis', 'Bordona Martín', 'Assets/images/Users/Recurso 1.png', 1),
(8, 'pablocano', 'pablocano@iescelia.org', '6b2091bc3deac2bb9d76041ed955f0c0', 'Pablo', 'Cano López', 'Assets/images/Users/Recurso 1.png', 1),
(9, 'arturocarrasco', 'arturocarrasco@iescelia.org', '6b2091bc3deac2bb9d76041ed955f0c0', 'Arturo', 'Carrasco perez', 'Assets/images/Users/Recurso 1.png', 1),
(10, 'auroracortazar', 'auroracortazar@iescelia.org', '6b2091bc3deac2bb9d76041ed955f0c0', 'Aurora', 'Cortázar Luque', 'Assets/images/Users/Recurso 1.png', 1),
(11, 'alfonsocuevas', 'alfonsocuevas@iescelia.org', '6b2091bc3deac2bb9d76041ed955f0c0', 'Alfonso', 'Cuevas Garrido', 'Assets/images/Users/Recurso 1.png', 1),
(12, 'pedroluisdrasin', 'pedroluisdrasin@iescelia.org', '6b2091bc3deac2bb9d76041ed955f0c0', 'Pedro Luís', 'Drasín Matos', 'Assets/images/Users/Recurso 1.png', 1),
(13, 'benitoencinas', 'benitoencinas@iescelia.org', '6b2091bc3deac2bb9d76041ed955f0c0', 'Benito', 'Encinas López', 'Assets/images/Users/Recurso 1.png', 1),
(14, 'david', 'daaviidpuga29@gmail.com', '2d8ca4781dd9c30d562930f8e3b8131f', 'David', 'Puga Ruano', 'Assets/images/Users/PaolaQ_3mayo-954 copia.jpg', 0),
(15, 'pedromartinez', 'pedromartinez@iescelia.org', '6b2091bc3deac2bb9d76041ed955f0c0', 'Pedro ', 'Martínez Perez', 'Assets/images/Users/Recurso 1.png', 0),
(16, 'sergiomartinez', 'sergiomartinez@iescelia.org', '6b2091bc3deac2bb9d76041ed955f0c0', 'Sergio', 'Martínez Ruiz', 'Assets/images/Users/Recurso 1.png', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`,`idResource`,`idTimeSlot`,`date`);

--
-- Indices de la tabla `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `timeslots`
--
ALTER TABLE `timeslots`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `timeslots`
--
ALTER TABLE `timeslots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

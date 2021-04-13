-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2021 a las 02:14:10
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sead`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cli` int(10) NOT NULL,
  `cli_nom` varchar(50) NOT NULL,
  `cli_num` varchar(10) NOT NULL,
  `cli_dir` varchar(255) NOT NULL,
  `cli_cor` varchar(50) NOT NULL,
  `cli_pas` varchar(50) NOT NULL,
  `cli_tip` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cli`, `cli_nom`, `cli_num`, `cli_dir`, `cli_cor`, `cli_pas`, `cli_tip`) VALUES
(1, 'Admin', '0000000000', 'null', 'admin@admin.com', '12523916', 1),
(2, 'isaac popotitos parker', '5566644477', 'monedita de oro #455, entre la 4ta y amanecer ranchero', 'Rojo3ds@hhhhgmai.com', '12345', 0),
(4, 'Felipe', '5566644477', 'Caja de zapatos de la esquina #334', '', '', 0),
(7, 'Isaac Rodriguez rivera', '5577489635', 'monedita de oro #375, entre amanecer ranchero y la 4ta', 'isaacrr507@gmail.com', '12523916', 0),
(10, 'Pedro antonio clavel mejia', '5577881123', 'Caja de zapatos #455, colonia foraneo', 'PACM1@gmail.com', '12523166', 0),
(11, 'Felipe santiago celis', '7575727427', 'monedita de oro #455, entre la 4ta y amanecer ranchero', 'FSC@gmail.com', '12345', 0),
(12, 'abraham', '44444', 'adfghjk', 'PACM@gmail.com', '12345', 0),
(13, 'Diana Cinthya Guzman Ramirez', '5523172607', 'La mariquita #374, entre rancho grande y maÃ±anitas', 'dianacgrcuco@gmail.com', '12345', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comidas`
--

CREATE TABLE `comidas` (
  `id_com` int(11) NOT NULL,
  `com_nom` varchar(50) NOT NULL,
  `com_des` varchar(255) NOT NULL,
  `com_pre` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comidas`
--

INSERT INTO `comidas` (`id_com`, `com_nom`, `com_des`, `com_pre`) VALUES
(1, 'test enchiladas', 'tortilla remojada en salsa verde con pollo, cebolla, lechuga y rabano', 45),
(2, 'test2', 'dfghjk', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_ped` int(11) NOT NULL,
  `ped_fec` date NOT NULL,
  `id_com` int(11) NOT NULL,
  `ped_can` int(5) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `ped_hra` time NOT NULL,
  `estatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_ped`, `ped_fec`, `id_com`, `ped_can`, `id_cliente`, `ped_hra`, `estatus`) VALUES
(1, '2021-03-02', 1, 4, 7, '05:03:00', 1),
(2, '2021-03-04', 1, 1, 7, '18:08:00', 0),
(4, '2021-03-04', 2, 1, 4, '22:51:00', 0),
(5, '2021-03-05', 1, 2, 10, '15:00:00', 1),
(6, '2021-03-05', 1, 3, 7, '16:20:00', 0),
(7, '2021-03-07', 2, 5, 13, '20:08:00', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cli`);

--
-- Indices de la tabla `comidas`
--
ALTER TABLE `comidas`
  ADD PRIMARY KEY (`id_com`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_ped`),
  ADD KEY `ped_fk1` (`id_cliente`),
  ADD KEY `comped_FK2` (`id_com`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `comidas`
--
ALTER TABLE `comidas`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_ped` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `comped_FK2` FOREIGN KEY (`id_com`) REFERENCES `comidas` (`id_com`),
  ADD CONSTRAINT `ped_fk1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

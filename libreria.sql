-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-03-2017 a las 16:04:11
-- Versión del servidor: 5.5.54-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `libreria`
--
CREATE DATABASE IF NOT EXISTS `libreria` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `libreria`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

DROP TABLE IF EXISTS `autores`;
CREATE TABLE IF NOT EXISTS `autores` (
  `id_autor` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `autor` varchar(25) NOT NULL,
  `bio` text,
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id_autor`, `autor`, `bio`) VALUES
(1, 'Don DeLillo', ''),
(2, 'Frank Herbert', ''),
(3, 'Barack Obama, Barack Obam', ''),
(4, 'Henry Miller', ''),
(5, 'Christine Greig', ''),
(6, 'Jane Donnelly', ''),
(7, 'Karen Van Der Zee', ''),
(8, 'Emma Richmond', ''),
(9, 'Helena Dawson', ''),
(10, 'Jessica Hart', ''),
(11, 'Helen Bianchin', ''),
(12, 'Catherine O''Connor', ''),
(13, 'Helen Brooks', ''),
(14, 'Lee Stafford', ''),
(15, 'Lindsay Armstrong', ''),
(16, 'Alison Fraser', ''),
(17, 'Marisa Carroll', ''),
(18, 'Diana Hamilton', ''),
(19, 'Debbie Macomber', ''),
(20, 'Carol Gregor', ''),
(21, 'Victoria Gordon', ''),
(22, 'Emma Goldrick', ''),
(23, 'Penny Jordan', ''),
(24, 'Cathy Williams', ''),
(25, 'Carole Mortimer', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

DROP TABLE IF EXISTS `editoriales`;
CREATE TABLE IF NOT EXISTS `editoriales` (
  `id_editorial` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `editorial` varchar(255) NOT NULL,
  PRIMARY KEY (`id_editorial`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `editoriales`
--

INSERT INTO `editoriales` (`id_editorial`, `editorial`) VALUES
(1, 'Penguin Books'),
(2, 'Ace Books'),
(3, 'Three Rivers Press'),
(4, 'Grove Press'),
(5, 'Harlequin Presents'),
(6, 'Harlequin'),
(7, 'Harlequin Books'),
(8, 'Harlequin Romance'),
(9, 'Harlequin Enterprises, Limited'),
(10, 'MacMillan Publishing Company'),
(11, 'Mills & Boon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

DROP TABLE IF EXISTS `generos`;
CREATE TABLE IF NOT EXISTS `generos` (
  `id_genero` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `genero` varchar(255) NOT NULL,
  PRIMARY KEY (`id_genero`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id_genero`, `genero`) VALUES
(1, 'novela'),
(2, 'terror'),
(3, 'romance'),
(4, 'ciencia ficción'),
(5, 'erótico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

DROP TABLE IF EXISTS `libros`;
CREATE TABLE IF NOT EXISTS `libros` (
  `id_libro` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `libro` varchar(255) NOT NULL,
  `fecha` varchar(60) NOT NULL,
  `caratula` varchar(255) DEFAULT NULL,
  `inventario` int(4) unsigned NOT NULL DEFAULT '1',
  `precio` float(9,2) unsigned DEFAULT NULL,
  `paginas` int(4) unsigned DEFAULT NULL,
  `descripcion` text,
  `codigo` varchar(50) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `estado` int(1) unsigned NOT NULL DEFAULT '1' COMMENT '1 activo - 2 inactivo',
  `autor_id` int(11) unsigned NOT NULL,
  `editorial_id` int(11) unsigned NOT NULL,
  `genero_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_libro`),
  KEY `autor_id` (`autor_id`,`editorial_id`,`genero_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `libro`, `fecha`, `caratula`, `inventario`, `precio`, `paginas`, `descripcion`, `codigo`, `url`, `estado`, `autor_id`, `editorial_id`, `genero_id`) VALUES
(1, 'Libra', '1989', NULL, 1, 0.00, 0, '', '', '', 1, 1, 1, 1),
(2, 'Dune', '1987', '', 1, 0.00, 0, '', '', '', 1, 2, 2, 1),
(3, 'The Audacity of Hope', 'November 6, 2007', '', 1, 0.00, 0, '', '', '', 1, 3, 3, 1),
(4, 'Tropic of Cancer', 'July 1987', '', 1, 0.00, 0, '', '', '', 1, 4, 4, 1),
(5, 'The Paris Type', '1995', '', 1, 0.00, 0, '', '', '', 1, 5, 5, 1),
(6, 'When We''re Alone', 'January 1, 1990', '', 1, 0.00, 0, '', '', '', 1, 6, 6, 1),
(7, 'The Imperfect Bride', 'July 1, 1992', '', 1, 0.00, 0, '', '', '', 1, 7, 6, 1),
(8, 'Deliberate Provocation', 'January 1, 1994', '', 1, 0.00, 0, '', '', '', 1, 8, 6, 1),
(9, 'Web of Fate', '1993', '', 1, 0.00, 0, '', '', '', 1, 9, 7, 1),
(10, 'A Sweeter Prejudice', '1991', '', 1, 0.00, 0, '', '', '', 1, 10, 8, 1),
(11, 'The Stefanos Marriage', 'December 2, 1991', '', 1, 0.00, 0, '', '', '', 1, 11, 6, 1),
(12, 'Obligation to Love', '1995', '', 1, 0.00, 0, '', '', '', 1, 12, 9, 1),
(13, 'Sweet Betrayal', 'February 1994', '', 1, 0.00, 0, '', '', '', 1, 13, 10, 1),
(14, 'The Willing Captive', 'January 1994', '', 1, 0.00, 0, '', '', '', 1, 14, 10, 1),
(15, 'The Gentle Trap', 'October 1990', '', 1, 0.00, 0, '', '', '', 1, 8, 10, 1),
(16, 'Dark Captor', 'June 1, 1993', '', 1, 0.00, 0, '', '', '', 1, 15, 6, 1),
(17, 'A Lifetime and Beyond', 'December 1, 1988', 'a-lifetime-and-beyond.jpg', 1, 30.50, 0, '', '', 'a-lifetime-and-beyond', 1, 16, 6, 1),
(18, 'Forbidden Attraction', 'February 1, 2008', '', 1, 0.00, 0, '', '', '', 1, 17, 6, 1),
(19, 'The devil has his due', '1991', '', 1, 0.00, 0, '', '', '', 1, 18, 11, 1),
(20, 'The forgetful bride', 'November 1, 1991', '', 1, 0.00, 0, '', '', '', 1, 19, 6, 1),
(21, 'Pretence Of Love', 'April 1, 1991', '', 1, 0.00, 0, '', '', '', 1, 20, 6, 1),
(22, 'Gift-wrapped', '1993', '', 1, 0.00, 0, '', '', '', 1, 21, 7, 1),
(23, 'A sensible wife', '1993', '', 1, 10.00, 0, '', '', '', 1, 10, 7, 1),
(24, 'Rent-A-Bride Ltd', 'November 1, 1985', '', 1, 0.00, 0, '', '', '', 1, 22, 6, 1),
(25, 'The flawed marriage', '1983', '', 1, 0.00, 0, '', '', '', 1, 23, 6, 1),
(26, 'A powerful attraction', '1991', '', 1, 20.00, 0, '', '', '', 1, 24, 7, 1),
(27, 'Unfair assumptions', '1992', '', 1, 0.00, 0, '', '', '', 1, 8, 7, 1),
(28, 'Fated attraction', '1991', '', 1, 0.00, 0, '', '', '', 1, 25, 6, 1),
(29, 'No other haven', '1966', '', 1, 0.00, 0, '', '', '', 1, 26, 6, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

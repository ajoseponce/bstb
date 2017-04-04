-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-04-2015 a las 23:10:40
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `punto_venta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicativos`
--

CREATE TABLE IF NOT EXISTS `aplicativos` (
  `id_aplicativo` int(5) NOT NULL AUTO_INCREMENT,
  `nombre_menu` varchar(50) NOT NULL,
  `nombre_action` varchar(50) NOT NULL,
  `tabla` varchar(50) NOT NULL,
  PRIMARY KEY (`id_aplicativo`),
  KEY `id_aplicativo` (`id_aplicativo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `aplicativos`
--

INSERT INTO `aplicativos` (`id_aplicativo`, `nombre_menu`, `nombre_action`, `tabla`) VALUES
(1, 'Usuarios', 'lista_usuario', ''),
(2, 'Ventas', 'carga_pedidos', ''),
(3, 'Productos', 'lista_productos', ''),
(4, 'Listar Ventas', 'lista_pedidos', ''),
(5, 'Clientes', 'lista_clientes', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la persona en el dominio.',
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '' COMMENT 'Primer nombre de la persona.',
  `onombre` varchar(30) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Otros nombres de la persona.',
  `apellido` varchar(40) CHARACTER SET latin1 NOT NULL DEFAULT '' COMMENT 'Apellido de soltero de la persona.',
  `oapellido` varchar(25) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Otros apellidos de la persona.',
  `dni` varchar(10) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT '0000-00-00' COMMENT 'Fecha de nacimiento de la persona.',
  `sexo` char(1) CHARACTER SET latin1 DEFAULT '' COMMENT 'Codigo, sera seleccionado de la tabla persona_sexo.',
  `domicilio` varchar(80) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Calle donde vive la persona.',
  `pais_nacimiento` char(2) CHARACTER SET latin1 DEFAULT '' COMMENT 'Id pais. Sera seleccionado de la tabla pais.',
  `telefono_particular` varchar(30) CHARACTER SET latin1 DEFAULT '0' COMMENT 'Numero telefonico particular de la persona.',
  `telefono_celular` varchar(30) CHARACTER SET latin1 DEFAULT '0' COMMENT 'Numero telefonico del celular de la persona.',
  `cod_estado` char(5) CHARACTER SET latin1 NOT NULL DEFAULT 'A' COMMENT 'Id estado. Sera seleccionado de la tabla persona_estado.',
  `usuario` int(10) unsigned zerofill NOT NULL DEFAULT '0000000000' COMMENT 'Identificador del usuario que efectua el alta, la modificacion o la baja del registro. Ref. tabla, usuario_datos_generales.',
  `fecha_alta` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Guarda la fecha en la que se produjo el alta del registro.',
  `fecha_ultima_modificacion` datetime DEFAULT '0000-00-00 00:00:00' COMMENT 'Guarda la fecha en la que se produjo la ultima modificacion sobre el registro.',
  `id_dominio` int(11) DEFAULT '1',
  PRIMARY KEY (`id_cliente`),
  KEY `cod_estado` (`cod_estado`),
  KEY `sexo` (`sexo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='personas.; InnoDB free: 11264 kB; (`cod_estado`) REFE' AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `onombre`, `apellido`, `oapellido`, `dni`, `fecha_nacimiento`, `sexo`, `domicilio`, `pais_nacimiento`, `telefono_particular`, `telefono_celular`, `cod_estado`, `usuario`, `fecha_alta`, `fecha_ultima_modificacion`, `id_dominio`) VALUES
(1, 'Jose', NULL, 'ponce', NULL, NULL, '0000-00-00', NULL, NULL, NULL, '0', '0', 'A', 0000000001, '2014-11-25 18:27:53', '0000-00-00 00:00:00', 1),
(2, 'Consumidor Final', NULL, '', NULL, NULL, '0000-00-00', NULL, NULL, NULL, '0', '0', 'B', 0000000001, '2014-11-26 00:27:32', '0000-00-00 00:00:00', 1),
(3, 'florencia ', NULL, 'ripoll', NULL, NULL, '0000-00-00', NULL, NULL, NULL, '0', '0', 'A', 0000000001, '2014-11-26 02:46:17', '0000-00-00 00:00:00', 1),
(4, 'santino', NULL, 'ponce', NULL, NULL, '0000-00-00', NULL, NULL, NULL, '0', '0', 'A', 0000000001, '2015-03-05 22:30:00', '0000-00-00 00:00:00', 1),
(5, 'Jose', NULL, 'Perez', NULL, NULL, '0000-00-00', NULL, NULL, NULL, '0', '0', 'B', 0000000001, '2015-03-05 22:38:51', '0000-00-00 00:00:00', 1),
(6, 'Jose', NULL, 'Perez', NULL, NULL, '0000-00-00', NULL, NULL, NULL, '0', '0', 'B', 0000000001, '2015-03-05 22:39:28', '0000-00-00 00:00:00', 1),
(7, 'Jose', NULL, 'Perez', NULL, NULL, '0000-00-00', NULL, NULL, NULL, '3743434', '0', 'A', 0000000001, '2015-03-05 22:42:02', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador`
--

CREATE TABLE IF NOT EXISTS `contador` (
  `id_registro` int(5) NOT NULL,
  `turno` int(5) NOT NULL,
  KEY `id_registro` (`id_registro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE IF NOT EXISTS `mesas` (
  `id_mesa` int(4) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY (`id_mesa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id_mesa`, `descripcion`, `estado`) VALUES
(1, 'mesa 1', 'O'),
(2, 'mesa 2', 'O');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_cabecera`
--

CREATE TABLE IF NOT EXISTS `pedido_cabecera` (
  `id_pedido` int(5) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(5) NOT NULL,
  `estado` enum('A','C') NOT NULL,
  `fecha_pedido` datetime NOT NULL,
  `usuario` int(5) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `id_pedido` (`id_pedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `pedido_cabecera`
--

INSERT INTO `pedido_cabecera` (`id_pedido`, `id_cliente`, `estado`, `fecha_pedido`, `usuario`) VALUES
(1, 2, 'A', '2015-03-05 10:55:26', 1),
(2, 1, 'A', '2015-03-05 11:28:14', 1),
(3, 1, 'A', '2015-03-05 19:26:40', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_detalle`
--

CREATE TABLE IF NOT EXISTS `pedido_detalle` (
  `id_pedido_detalle` int(5) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(5) NOT NULL,
  `id_producto` int(5) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`id_pedido_detalle`),
  KEY `id_pedido` (`id_pedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `pedido_detalle`
--

INSERT INTO `pedido_detalle` (`id_pedido_detalle`, `id_pedido`, `id_producto`, `cantidad`, `precio`) VALUES
(1, 1, 2, 1, 85),
(2, 1, 3, 2, 120),
(3, 2, 3, 1, 60),
(4, 3, 7, 5, 600),
(5, 3, 7, 2, 240),
(6, 3, 1, 2, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
  `id_persona` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la persona en el dominio.',
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '' COMMENT 'Primer nombre de la persona.',
  `onombre` varchar(30) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Otros nombres de la persona.',
  `apellido` varchar(40) CHARACTER SET latin1 NOT NULL DEFAULT '' COMMENT 'Apellido de soltero de la persona.',
  `oapellido` varchar(25) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Otros apellidos de la persona.',
  `dni` varchar(10) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT '0000-00-00' COMMENT 'Fecha de nacimiento de la persona.',
  `sexo` char(1) CHARACTER SET latin1 DEFAULT '' COMMENT 'Codigo, sera seleccionado de la tabla persona_sexo.',
  `domicilio` varchar(80) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Calle donde vive la persona.',
  `pais_nacimiento` char(2) CHARACTER SET latin1 DEFAULT '' COMMENT 'Id pais. Sera seleccionado de la tabla pais.',
  `telefono_particular` varchar(30) CHARACTER SET latin1 DEFAULT '0' COMMENT 'Numero telefonico particular de la persona.',
  `telefono_celular` varchar(30) CHARACTER SET latin1 DEFAULT '0' COMMENT 'Numero telefonico del celular de la persona.',
  `cod_estado` char(5) CHARACTER SET latin1 NOT NULL DEFAULT 'A' COMMENT 'Id estado. Sera seleccionado de la tabla persona_estado.',
  `usuario` int(10) unsigned zerofill NOT NULL DEFAULT '0000000000' COMMENT 'Identificador del usuario que efectua el alta, la modificacion o la baja del registro. Ref. tabla, usuario_datos_generales.',
  `fecha_alta` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Guarda la fecha en la que se produjo el alta del registro.',
  `fecha_ultima_modificacion` datetime DEFAULT '0000-00-00 00:00:00' COMMENT 'Guarda la fecha en la que se produjo la ultima modificacion sobre el registro.',
  `id_dominio` int(11) DEFAULT '1',
  PRIMARY KEY (`id_persona`),
  KEY `cod_estado` (`cod_estado`),
  KEY `sexo` (`sexo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='personas.; InnoDB free: 11264 kB; (`cod_estado`) REFE' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `nombre`, `onombre`, `apellido`, `oapellido`, `dni`, `fecha_nacimiento`, `sexo`, `domicilio`, `pais_nacimiento`, `telefono_particular`, `telefono_celular`, `cod_estado`, `usuario`, `fecha_alta`, `fecha_ultima_modificacion`, `id_dominio`) VALUES
(1, 'Jose', NULL, 'ponce', NULL, NULL, '0000-00-00', NULL, NULL, NULL, '0', '0', 'A', 0000000001, '2014-11-25 18:27:53', '0000-00-00 00:00:00', 1),
(2, 'joshep', NULL, 'pol', NULL, NULL, '0000-00-00', NULL, NULL, NULL, '0', '0', 'A', 0000000001, '2014-11-26 00:27:32', '0000-00-00 00:00:00', 1),
(3, 'florencia ', NULL, 'ripoll', NULL, NULL, '0000-00-00', NULL, NULL, NULL, '0', '0', 'A', 0000000001, '2014-11-26 02:46:17', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  `tipo_producto` int(11) DEFAULT NULL,
  `fecha_vencimiento` datetime DEFAULT NULL,
  `lote` varchar(255) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `estado` varchar(2) NOT NULL,
  `inicial` varchar(250) DEFAULT NULL,
  `minimo` varchar(250) DEFAULT NULL,
  `cantidad` varchar(250) DEFAULT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `precio_compra` varchar(250) NOT NULL,
  `precio_media` decimal(10,0) DEFAULT NULL,
  `iva` varchar(250) DEFAULT NULL,
  `venta` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `id_productos` (`id_producto`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `descripcion`, `tipo_producto`, `fecha_vencimiento`, `lote`, `id_proveedor`, `estado`, `inicial`, `minimo`, `cantidad`, `codigo`, `precio_compra`, `precio_media`, `iva`, `venta`) VALUES
(1, 'napolitana con jamon', 1, NULL, NULL, 1, 'A', NULL, NULL, NULL, '', '50', '30', NULL, NULL),
(2, 'Anana con Jamon(para modelos)', 1, NULL, NULL, 0, 'A', NULL, NULL, NULL, '', '85', '50', NULL, NULL),
(3, 'cerveza quilmes', NULL, NULL, NULL, NULL, 'A', NULL, NULL, '95', '31256687651', '60', '20', NULL, NULL),
(4, 'cerveza bud', NULL, NULL, NULL, NULL, 'A', NULL, NULL, '28', '', '45', NULL, NULL, NULL),
(5, 'champagne munn', NULL, NULL, NULL, NULL, 'A', NULL, NULL, '120', '', '120', NULL, NULL, NULL),
(6, 'champagne mercier', NULL, NULL, NULL, NULL, 'A', NULL, NULL, '34', '', '150', NULL, NULL, NULL),
(7, 'remera rojo', NULL, NULL, NULL, NULL, 'A', NULL, NULL, '-3', '3557658567869', '120', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'Identificador de usuario.',
  `clave` varchar(50) NOT NULL COMMENT 'Clave que usara el usuario en conjunto con su id.',
  `nombre` varchar(50) NOT NULL DEFAULT '' COMMENT 'Nombre de usuario. (cuenta).',
  `id_persona` int(10) unsigned zerofill NOT NULL DEFAULT '0000000000' COMMENT 'Id de la persona federada. Ref. tabla persona_federacion.',
  `estado` enum('A','B') NOT NULL DEFAULT 'A' COMMENT 'Admite solamente valores A=activo; B=baja.',
  `fecha_baja` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha en la que se dio de baja el registro.',
  `fecha_ultima_modificacion` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha en la que se realizo la ultima modificacion del registro.',
  `usuario` int(10) unsigned zerofill NOT NULL DEFAULT '0000000000' COMMENT 'Id del usuario que modifico por ultima vez el registro.',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `id_persona_federada` (`id_persona`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Usuarios.' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `clave`, `nombre`, `id_persona`, `estado`, `fecha_baja`, `fecha_ultima_modificacion`, `usuario`) VALUES
(0000000001, 'santinoponce1412', 'jose.ponce', 0000000001, 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0000000001),
(0000000002, 'laputa', 'hu.quemal', 0000000002, 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0000000001),
(0000000003, '123', 'flor.ripoll', 0000000003, 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0000000001);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_aplicativos`
--

CREATE TABLE IF NOT EXISTS `usuario_aplicativos` (
  `id_registro` int(5) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(5) NOT NULL,
  `id_aplicativo` int(5) NOT NULL,
  PRIMARY KEY (`id_registro`),
  KEY `id_registro` (`id_registro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `usuario_aplicativos`
--

INSERT INTO `usuario_aplicativos` (`id_registro`, `id_usuario`, `id_aplicativo`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

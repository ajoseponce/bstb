-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2016 a las 13:01:40
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `estudio_karaben`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicativos`
--

CREATE TABLE IF NOT EXISTS `aplicativos` (
  `id_aplicativo` int(5) NOT NULL,
  `nombre_menu` varchar(50) NOT NULL,
  `nombre_action` varchar(50) NOT NULL,
  `admin` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id_aplicativo`),
  KEY `id_aplicativo` (`id_aplicativo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aplicativos`
--

INSERT INTO `aplicativos` (`id_aplicativo`, `nombre_menu`, `nombre_action`, `admin`) VALUES
(1, 'Usuarios', 'lista_usuario', 'N'),
(2, 'Clientes', 'lista_clientes', 'S'),
(3, 'Conceptos', 'lista_conceptos', 'S'),
(4, 'Carga Conceptos Adicionales', 'carga_concepto_espontaneo', 'S'),
(7, 'Carga Conceptos Basicos', 'carga_conceptos', 'S'),
(8, 'Listado Conceptos a Liquidar', 'lista_conceptos_liquiddar', 'N'),
(9, 'Listado Conceptos por Clientes', 'lista_conceptos_clientes', 'S'),
(10, 'Listado Situacion Cliente', 'situacion_cliente', 'N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `apellido` varchar(250) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `telefono_particular` int(30) DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL,
  `cod_estado` enum('A','B') DEFAULT NULL,
  `usuario` int(5) DEFAULT NULL,
  `situacion` varchar(200) DEFAULT NULL,
  `cuit` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=128 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellido`, `direccion`, `telefono_particular`, `fecha_alta`, `cod_estado`, `usuario`, `situacion`, `cuit`) VALUES
(1, 'Matilde', 'Basbus', NULL, 4428232, NULL, 'A', 5, 'M', '27100195637'),
(2, 'Guillermo', 'Jack', NULL, NULL, NULL, 'A', 5, 'M', '20077294008'),
(3, 'Agripina Mercedes', 'Esquivel Troche', 'Roberto Estevez N 9787', NULL, NULL, 'A', 5, 'M', '27178770174'),
(4, 'Dora Maria', 'Stockar', 'Bolivar Nº: 1480', NULL, NULL, 'A', 5, 'R', '27246493885'),
(5, 'Willian', 'Jack', NULL, NULL, NULL, 'A', 5, 'M', '20245094214'),
(6, 'Maximiliano', 'Stockar', NULL, NULL, NULL, 'A', 5, 'R', '20350091166'),
(7, 'Salustiano', 'Karabyn', NULL, NULL, NULL, 'A', 5, 'R', '20075516712'),
(8, 'Jorge Daniel', 'Chamorro', NULL, NULL, NULL, 'A', 5, 'M', '20291389555'),
(9, 'Dora Ines', 'Wintoniuk', 'Warenicya 673 - Apostoles', NULL, NULL, 'A', 5, 'R', '27139418625'),
(10, 'Lucrecia', 'Ancarani', NULL, NULL, NULL, 'A', 5, 'R', '27142098879'),
(11, 'Jorge (H)', 'Gergoff', NULL, NULL, NULL, 'A', 5, 'R', '20276612507'),
(12, 'Agustina', 'Zarza Benitez', NULL, NULL, NULL, 'A', 5, 'M', '27924367631'),
(13, '-', 'Afife S.A.', NULL, NULL, NULL, 'A', 13, 'R', '33687311359'),
(14, '-', 'Alas S.A.', NULL, NULL, NULL, 'A', 13, 'R', '30711605564'),
(15, 'Aponte Morel', 'Ena Maria', NULL, NULL, NULL, 'B', 5, 'R', '2147483647'),
(16, '-', 'Arenas del Parana S.A.', NULL, NULL, NULL, 'A', 5, 'R', '30710697457'),
(17, 'Manuel Antonio', 'Atencio', NULL, NULL, NULL, 'A', 5, 'M', '20058787699'),
(18, 'Lucia Lidia', 'Barberis', NULL, NULL, NULL, 'A', 5, 'R', '27047319825'),
(19, 'Francisca', 'Ballano', NULL, NULL, NULL, 'A', 5, 'M', '27109906056'),
(20, 'Lidia', 'Benitez', NULL, NULL, NULL, 'A', 5, 'M', '27181461786'),
(21, 'Dora ', 'Bordon', NULL, NULL, NULL, 'A', 5, 'M', '27109908598'),
(22, 'Maria Antonia', 'Broglia', NULL, NULL, NULL, 'A', 5, 'M', '27044497528'),
(23, 'Estela Anunciacion', 'Caballero', NULL, NULL, NULL, 'A', 5, 'M', '27123958190'),
(24, 'Oscar Ramon', 'Camargo', NULL, NULL, NULL, 'A', 5, 'R', '20170642342'),
(25, '-', 'Caprosa', NULL, NULL, NULL, 'A', 5, 'R', '30707629955'),
(26, '-', 'Casa S.R.L.', NULL, NULL, NULL, 'A', 5, 'R', '30707577971'),
(27, '-', 'Cerro Azul S.R.L.', NULL, NULL, NULL, 'A', 5, 'R', '30711087164'),
(28, 'Amelia Beatriz', 'Chemes', NULL, NULL, NULL, 'A', 5, 'M', '27107105382'),
(29, 'Jorge Omar', 'Cheroki', NULL, NULL, NULL, 'A', 5, 'R', '20075529423'),
(30, 'Sergio Omar', 'Cheroki', NULL, NULL, NULL, 'A', 5, 'R', '20217350442'),
(31, '-', 'Chocolate Misionero S.R.L', NULL, NULL, NULL, 'A', 5, 'R', '30711143218'),
(32, 'Delia Adriana', 'Closs', NULL, NULL, NULL, 'A', 5, 'R', '27134715834'),
(33, 'Liliana Celina', 'Closs', NULL, NULL, NULL, 'A', 5, 'R', '27146685787'),
(34, 'Benjamin Ruben', 'Cohen', NULL, NULL, NULL, 'A', 5, 'R', '20111321389'),
(35, 'Eduardo', 'De Coulon', NULL, NULL, NULL, 'A', 5, 'R', '20181385767'),
(36, '-', 'De Coulon S.A.', NULL, NULL, NULL, 'A', 5, 'R', '30672380649'),
(37, '-', 'Deniro S.R.L.', NULL, NULL, NULL, 'A', 5, 'R', '30710717709'),
(38, 'Davina del Carmen', 'Dieminger', NULL, NULL, NULL, 'A', 11, 'R', '27257670916'),
(39, 'Martha Beatriz', 'Espinola', NULL, NULL, NULL, 'A', 5, 'M', '27121188355'),
(40, 'Lara', 'Etchegoin', NULL, NULL, NULL, 'A', 5, 'M', '23318804834'),
(41, '-', 'Federacion Mnera. De Coop. Apicola', NULL, NULL, NULL, 'A', 5, 'R', '30710840349'),
(42, 'Zunilda Ernestina', 'Fernandez', NULL, NULL, NULL, 'A', 5, 'M', '27160472109'),
(43, '-', 'Fideicomiso El Cerro', NULL, NULL, NULL, 'A', 5, 'R', '30711777551'),
(44, '-', 'Fideicomiso Roque Saenz Peña', NULL, NULL, NULL, 'A', 5, 'R', '30712258507'),
(45, 'Gabriel Juan', 'Fustes Padros', NULL, NULL, NULL, 'A', 5, 'M', '20184061156'),
(46, 'Jorge', 'Gergoff', NULL, NULL, NULL, 'A', 5, 'R', '20124404275'),
(47, 'Nora Patricia', 'Gergoff', NULL, NULL, NULL, 'A', 5, 'M', '27312554548'),
(48, 'Sebastian', 'Gergoff', NULL, NULL, NULL, 'A', 5, 'M', '20283035043'),
(49, 'Liliana Estela Maris', 'Gugliermone', NULL, NULL, NULL, 'A', 5, 'M', '27112599415'),
(50, '-', 'Hidrocon S.R.L.', NULL, NULL, NULL, 'A', 5, 'R', '30708768606'),
(51, 'Liliana Martha', 'Hiller', NULL, NULL, NULL, 'A', 5, 'M', '27165686530'),
(52, 'Julio Alberto', 'Horianski', NULL, NULL, NULL, 'A', 5, 'R', '20075817836'),
(53, 'Daiana', 'Karaben', NULL, NULL, NULL, 'A', 5, 'M', '27343660974'),
(54, '-', 'Kenia S.A.', NULL, NULL, NULL, 'A', 5, 'R', '30707342729'),
(55, '-', 'Kunz Construcciones S.R.L.', NULL, NULL, NULL, 'A', 5, 'R', '30672396308'),
(56, 'Maria Noemi', 'Ladron de Guevara', NULL, NULL, NULL, 'A', 5, 'M', '27145371290'),
(57, 'Andrea Rosana', 'Larsen', NULL, NULL, NULL, 'A', 5, 'R', '27309386634'),
(58, '-', 'Laurel S.A.', NULL, NULL, NULL, 'A', 5, 'R', '30557288380'),
(59, 'Viviana Haydee', 'Leiva', NULL, NULL, NULL, 'A', 5, 'R', '27118504467'),
(60, 'Gaspar Carlos', 'Malfitano', NULL, NULL, NULL, 'A', 5, 'R', '20109688658'),
(61, 'Claudia Raquel', 'Mantulak', NULL, NULL, NULL, 'A', 5, 'R', '27208150567'),
(62, 'Leandro Alberto', 'Martinez', NULL, NULL, NULL, 'A', 5, 'M', '20356947615'),
(63, 'Jessica Andrea', 'Minadeo', NULL, NULL, NULL, 'A', 5, 'M', '27210122031'),
(64, '-', 'Monam S.A.', NULL, NULL, NULL, 'A', 5, 'R', '30707370927'),
(65, '-', 'Mouton S.R.L.', NULL, NULL, NULL, 'A', 5, 'R', '30625965655'),
(66, '-', 'Nea Textil S.R.L.', NULL, NULL, NULL, 'A', 5, 'R', '30711476322'),
(67, '-', 'Neuma Respiratoria S.R.L.', NULL, NULL, NULL, 'A', 5, 'R', '30709486698'),
(68, 'Sergio Jose Enrique', 'Nezechuk', NULL, NULL, NULL, 'A', 5, 'R', '20182651312'),
(69, 'Nora Noemi', 'Ogguier', NULL, NULL, NULL, 'A', 5, 'M', '27128674212'),
(70, '-', 'Org. Gastronomica Fleming S.R.L.', NULL, NULL, NULL, 'A', 5, 'R', '30710132255'),
(71, '-', 'Parques Privados S.R.L.', NULL, NULL, NULL, 'A', 5, 'R', '30613382891'),
(72, 'Graciela Ines', 'Pensa', NULL, NULL, NULL, 'A', 5, 'M', '27170602906'),
(73, 'Jorge Ruben', 'Petersen', NULL, NULL, NULL, 'A', 5, 'R', '20143464327'),
(74, 'Mirtha Graciela', 'Petersen', NULL, NULL, NULL, 'A', 5, 'M', '27137616055'),
(75, 'Bettina Edith', 'Petrella', NULL, NULL, NULL, 'A', 5, 'M', '27219863476'),
(76, 'Ursula Alicia', 'Plocher', NULL, NULL, NULL, 'A', 5, 'M', '27160869211'),
(79, 'Jose', 'Ponce', NULL, NULL, NULL, 'B', 5, 'M', '20311106946'),
(80, 'Ena Maria', 'Aponte Morel', NULL, NULL, NULL, 'A', 11, 'M', '27922028805'),
(81, 'Hugo Cesar', 'Silvero', NULL, NULL, NULL, 'A', 13, 'R', '20138752225'),
(82, 'Sergio', 'Polutranka', NULL, NULL, NULL, 'A', 11, 'R', '20144188765'),
(83, 'Sonia', 'Sanguina', NULL, NULL, NULL, 'A', 11, 'M', '27179803637'),
(84, '-', 'Textil Regional S.R.L', NULL, NULL, NULL, 'A', 11, 'R', '30712554297'),
(85, '-', 'Estancias Bertran S.A.A.G.C e I', NULL, NULL, NULL, 'A', 11, 'R', '30508832377'),
(86, 'Lucas Ariel', 'Viada', NULL, NULL, NULL, 'A', 11, 'R', '20271435488'),
(87, '-', 'Trama S.R.L', NULL, NULL, NULL, 'A', 11, 'R', '30708191309'),
(88, 'Jorge Alfredo', 'Yañuk', NULL, NULL, NULL, 'A', 11, 'M', '20286756264'),
(89, 'Andres', 'Yañuk', NULL, NULL, NULL, 'A', 11, 'M', '20085433297'),
(90, 'Miriam Elizabet', 'Yañuk', NULL, NULL, NULL, 'A', 11, 'M', '27252997178'),
(91, 'Leonor Gabriela', 'Rombola', NULL, NULL, NULL, 'A', 11, 'R', '27253608132'),
(92, '-', 'Poltech S.R.L.', NULL, NULL, NULL, 'A', 5, 'R', '30709986925'),
(93, '-', 'Primavera S.R.L.', NULL, NULL, NULL, 'A', 5, 'R', '30708605006'),
(94, 'Eduardo Carlos', 'Quiroga', NULL, NULL, NULL, 'A', 5, 'R', '20147130806'),
(95, 'Maria Laura', 'Quiroga', NULL, NULL, NULL, 'A', 5, 'R', '27173120155'),
(96, 'Blanca Estela', 'Riaño', NULL, NULL, NULL, 'A', 5, 'M', '23048539424'),
(97, 'Estela Ivone', 'Sanguina', NULL, NULL, NULL, 'A', 5, 'M', '27142095977'),
(98, 'Mario', 'Sanguina', NULL, NULL, NULL, 'A', 5, 'M', '20075519126'),
(99, 'Diego Ariel', 'Santucci', NULL, NULL, NULL, 'A', 5, 'R', '20285816212'),
(100, 'Emilio', 'Schegg', NULL, NULL, NULL, 'A', 5, 'R', '20240028329'),
(101, 'Martin Ricardo', 'Selva', NULL, NULL, NULL, 'A', 5, 'R', '20364725419'),
(102, 'Nicolas Alberto', 'Selva', NULL, NULL, NULL, 'A', 5, 'R', '20317592230'),
(103, 'Miguelina', 'Slukwa', NULL, NULL, NULL, 'A', 5, 'M', '27068294709'),
(104, 'Carlos', 'Sosa', NULL, NULL, NULL, 'A', 5, 'R', '20111506907'),
(105, 'Eduardo Oscar', 'Stahoski', NULL, NULL, NULL, 'A', 5, 'R', '20122070787'),
(106, 'Alejandro Juan', 'Stockar', NULL, NULL, NULL, 'A', 5, 'A', '20102670958'),
(107, 'Maria Martha', 'Sturla', NULL, NULL, NULL, 'A', 5, 'M', '27182259069'),
(108, '-', 'Suc. De Quiroga Eduardo', NULL, NULL, NULL, 'A', 5, 'R', '20074775870'),
(109, '-', 'Tierra de Paz S.A.', NULL, NULL, NULL, 'A', 5, 'R', '30687840093'),
(110, 'Guido', 'Valenzuela', NULL, NULL, NULL, 'A', 5, 'M', '20245099070'),
(111, 'Ignacio', 'Valenzuela', NULL, NULL, NULL, 'A', 5, 'M', '20245721111'),
(112, 'Santiago', 'Valenzuela', NULL, NULL, NULL, 'A', 5, 'M', '20272991767'),
(113, 'yesica Victoria', 'Valenzuela', NULL, NULL, NULL, 'A', 5, 'M', '27290101528'),
(114, 'Horacio Daniel', 'Varela', NULL, NULL, NULL, 'A', 5, 'M', '20114597180'),
(115, 'Mirtha Yolanda', 'Villalba', NULL, NULL, NULL, 'A', 5, 'M', '27127185471'),
(116, '-', 'Voladuras El Litoral S.R.L.', NULL, NULL, NULL, 'A', 5, 'R', '30672356527'),
(117, 'Hugo', 'Yvachuta', NULL, NULL, NULL, 'A', 5, 'R', '20217235414'),
(118, 'Sergio', 'Zanivan', NULL, NULL, NULL, 'A', 5, 'M', '20938582441'),
(119, '-', 'Expreso Río Paraná S.A', NULL, NULL, NULL, 'A', 11, 'R', '30557365679'),
(120, 'Juan Ramon', 'Montejano', NULL, NULL, NULL, 'A', 13, 'M', '20084912922'),
(121, '.', 'MEMORIAL S.R.L.', NULL, NULL, NULL, 'A', 10, 'R', '30714738883'),
(122, '-', 'PETERSEN S.A.', NULL, NULL, NULL, 'A', 2, 'R', '30707043020'),
(123, '-', 'MORE THAN WINNERS', NULL, NULL, NULL, 'A', 9, 'R', '30709033952'),
(124, '-', 'OSOPPO S.A', NULL, NULL, NULL, 'A', 9, 'R', '30711127646'),
(125, 'GUILLERMO MATIAS', 'WIRZ', NULL, NULL, NULL, 'A', 9, 'R', '20203387955'),
(126, '.', 'Fideicomiso Doña Ana', NULL, NULL, NULL, 'A', 10, 'R', '3071496287'),
(127, '.', 'Club Instituto del Seguro', NULL, NULL, NULL, 'A', 10, 'R', '30590942746');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE IF NOT EXISTS `conceptos` (
  `id_concepto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `precio_estimado` decimal(10,0) DEFAULT NULL,
  `estado` enum('A','B') NOT NULL,
  PRIMARY KEY (`id_concepto`),
  KEY `id_concepto` (`id_concepto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `conceptos`
--

INSERT INTO `conceptos` (`id_concepto`, `descripcion`, `precio_estimado`, `estado`) VALUES
(1, 'Ingresos Brutos Misiones', NULL, 'A'),
(2, 'Tasa Municipal Posadas', NULL, 'A'),
(3, 'Ingresos Brutos Corrientes', NULL, 'A'),
(4, 'Tasa Municipal Apostoles', NULL, 'A'),
(5, 'Sindicato', NULL, 'A'),
(6, 'Tramite IERIC', NULL, 'A'),
(7, 'Monotributo', NULL, 'A'),
(8, 'F 931', NULL, 'A'),
(9, 'Liquidacion de Sueldos', NULL, 'A'),
(10, 'Regimen de Compra y Venta', NULL, 'A'),
(11, 'Percepcion de DGR', NULL, 'A'),
(12, 'Si.Co.Re', NULL, 'A'),
(13, 'Liquidacion de IVA', NULL, 'A'),
(14, 'Tramite Renatea', NULL, 'A'),
(15, 'Solicitud de factureros', NULL, 'A'),
(16, 'Generacion VEP F931', NULL, 'A'),
(17, 'Balance', NULL, 'A'),
(18, 'Ganancias Sociedades', NULL, 'A'),
(19, 'Confeccion de factura de alquiler en la pagina', NULL, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos_basicos`
--

CREATE TABLE IF NOT EXISTS `conceptos_basicos` (
  `id_relacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_concepto` int(11) NOT NULL,
  `precio_estimado` decimal(10,0) DEFAULT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_relacion`),
  KEY `id_relacion` (`id_relacion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=198 ;

--
-- Volcado de datos para la tabla `conceptos_basicos`
--

INSERT INTO `conceptos_basicos` (`id_relacion`, `id_cliente`, `id_concepto`, `precio_estimado`, `usuario`) VALUES
(1, 1, 1, '0', 5),
(2, 1, 2, NULL, 1),
(3, 3, 1, NULL, 1),
(4, 4, 5, NULL, 13),
(5, 2, 2, NULL, 5),
(6, 2, 7, NULL, 5),
(7, 5, 2, NULL, 5),
(8, 5, 7, NULL, 5),
(9, 1, 7, NULL, 5),
(10, 1, 8, NULL, 5),
(11, 1, 9, NULL, 5),
(12, 6, 9, NULL, 5),
(13, 6, 2, NULL, 5),
(14, 6, 1, NULL, 5),
(15, 6, 10, NULL, 5),
(16, 6, 13, NULL, 5),
(17, 6, 8, NULL, 5),
(18, 3, 7, NULL, 5),
(19, 7, 8, NULL, 5),
(20, 7, 9, NULL, 5),
(21, 8, 7, NULL, 5),
(22, 8, 8, NULL, 5),
(23, 8, 9, NULL, 5),
(24, 8, 2, NULL, 5),
(25, 8, 1, NULL, 5),
(26, 9, 8, NULL, 5),
(27, 9, 9, NULL, 5),
(28, 9, 4, NULL, 5),
(29, 9, 1, NULL, 5),
(30, 9, 13, NULL, 5),
(31, 9, 10, NULL, 5),
(32, 10, 9, NULL, 5),
(33, 10, 8, NULL, 5),
(34, 10, 13, NULL, 5),
(35, 10, 2, NULL, 5),
(36, 10, 1, NULL, 5),
(37, 10, 10, NULL, 5),
(38, 11, 13, NULL, 5),
(39, 11, 3, NULL, 5),
(40, 12, 7, NULL, 5),
(41, 12, 9, NULL, 5),
(42, 12, 8, NULL, 5),
(43, 12, 1, NULL, 5),
(44, 3, 9, NULL, 5),
(45, 3, 8, NULL, 5),
(46, 81, 5, NULL, 13),
(47, 15, 5, NULL, 13),
(48, 25, 5, NULL, 13),
(49, 52, 5, NULL, 13),
(50, 7, 5, NULL, 13),
(51, 29, 5, NULL, 13),
(52, 88, 1, NULL, 11),
(53, 89, 1, NULL, 11),
(54, 90, 1, NULL, 11),
(55, 29, 11, NULL, 11),
(56, 18, 1, NULL, 11),
(57, 29, 2, NULL, 11),
(58, 15, 1, NULL, 12),
(110, 31, 11, NULL, 3),
(60, 35, 5, NULL, 13),
(61, 35, 5, NULL, 13),
(62, 68, 5, NULL, 13),
(63, 61, 5, NULL, 13),
(64, 35, 9, NULL, 9),
(65, 35, 8, NULL, 9),
(66, 26, 9, NULL, 9),
(67, 26, 8, NULL, 9),
(68, 26, 5, NULL, 13),
(69, 116, 5, NULL, 13),
(70, 70, 5, NULL, 13),
(71, 71, 9, NULL, 10),
(72, 71, 8, NULL, 10),
(73, 30, 8, NULL, 10),
(74, 30, 9, NULL, 10),
(75, 68, 9, NULL, 10),
(76, 68, 8, NULL, 10),
(77, 29, 9, NULL, 10),
(78, 29, 8, NULL, 10),
(79, 109, 8, NULL, 10),
(80, 109, 9, NULL, 10),
(81, 48, 9, NULL, 10),
(82, 48, 8, NULL, 10),
(83, 120, 5, NULL, 13),
(84, 15, 9, NULL, 10),
(85, 15, 8, NULL, 10),
(86, 65, 9, NULL, 10),
(87, 65, 8, NULL, 10),
(88, 4, 8, NULL, 10),
(89, 4, 9, NULL, 10),
(90, 46, 9, NULL, 10),
(91, 46, 8, NULL, 10),
(92, 81, 9, NULL, 10),
(93, 81, 8, NULL, 10),
(94, 70, 9, NULL, 10),
(95, 70, 8, NULL, 10),
(96, 54, 5, NULL, 13),
(97, 27, 5, NULL, 13),
(98, 32, 9, NULL, 10),
(99, 32, 8, NULL, 10),
(100, 121, 9, NULL, 10),
(101, 121, 8, NULL, 10),
(102, 92, 8, NULL, 9),
(103, 92, 9, NULL, 9),
(104, 25, 9, NULL, 10),
(105, 25, 8, NULL, 10),
(106, 120, 8, NULL, 10),
(107, 120, 9, NULL, 10),
(108, 14, 8, NULL, 10),
(109, 14, 9, NULL, 10),
(111, 86, 11, NULL, 11),
(112, 29, 13, NULL, 8),
(113, 74, 1, NULL, 8),
(114, 16, 11, NULL, 2),
(115, 27, 8, NULL, 10),
(116, 27, 9, NULL, 10),
(117, 82, 9, NULL, 10),
(118, 82, 8, NULL, 10),
(119, 38, 9, NULL, 10),
(120, 38, 8, NULL, 10),
(121, 11, 9, NULL, 10),
(122, 11, 8, NULL, 10),
(123, 61, 8, NULL, 10),
(124, 61, 9, NULL, 10),
(125, 52, 8, NULL, 10),
(126, 52, 9, NULL, 10),
(127, 123, 9, NULL, 9),
(128, 123, 8, NULL, 9),
(129, 124, 9, NULL, 9),
(130, 124, 8, NULL, 9),
(131, 116, 8, NULL, 9),
(132, 116, 9, NULL, 9),
(133, 57, 8, NULL, 9),
(134, 57, 9, NULL, 9),
(135, 57, 5, NULL, 9),
(136, 125, 9, NULL, 9),
(137, 125, 8, NULL, 9),
(138, 126, 8, NULL, 10),
(139, 126, 9, NULL, 10),
(140, 20, 8, NULL, 9),
(141, 20, 9, NULL, 9),
(142, 126, 5, NULL, 13),
(143, 108, 11, NULL, 2),
(144, 84, 8, NULL, 10),
(145, 84, 9, NULL, 10),
(146, 127, 8, NULL, 10),
(147, 127, 9, NULL, 10),
(148, 127, 5, NULL, 13),
(149, 32, 5, NULL, 13),
(150, 92, 5, NULL, 13),
(151, 84, 5, NULL, 13),
(152, 92, 11, NULL, 3),
(153, 17, 1, NULL, 3),
(154, 56, 1, NULL, 8),
(155, 32, 11, NULL, 3),
(156, 33, 8, NULL, 10),
(157, 33, 9, NULL, 10),
(158, 82, 11, NULL, 11),
(159, 46, 12, NULL, 3),
(160, 25, 12, NULL, 3),
(161, 14, 12, NULL, 3),
(162, 24, 12, NULL, 3),
(163, 71, 12, NULL, 3),
(164, 109, 12, NULL, 3),
(165, 115, 12, NULL, 3),
(166, 66, 17, NULL, 9),
(167, 123, 17, NULL, 9),
(168, 123, 18, NULL, 9),
(169, 82, 5, NULL, 13),
(170, 33, 5, NULL, 13),
(171, 121, 5, NULL, 13),
(172, 109, 5, NULL, 13),
(173, 71, 5, NULL, 13),
(174, 4, 12, NULL, 3),
(175, 54, 12, NULL, 3),
(176, 85, 12, NULL, 3),
(177, 45, 1, NULL, 8),
(178, 23, 1, NULL, 8),
(179, 63, 1, NULL, 8),
(180, 102, 1, NULL, 8),
(181, 16, 8, NULL, 10),
(182, 31, 8, NULL, 10),
(183, 31, 9, NULL, 10),
(184, 87, 8, NULL, 10),
(185, 87, 9, NULL, 10),
(186, 67, 8, NULL, 10),
(187, 67, 9, NULL, 10),
(188, 54, 8, NULL, 10),
(189, 54, 9, NULL, 10),
(190, 55, 9, NULL, 10),
(191, 55, 8, NULL, 10),
(192, 60, 8, NULL, 10),
(193, 60, 9, NULL, 10),
(194, 86, 8, NULL, 10),
(195, 86, 9, NULL, 10),
(196, 69, 1, NULL, 2),
(197, 116, 11, NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos_espontaneos`
--

CREATE TABLE IF NOT EXISTS `conceptos_espontaneos` (
  `id_relacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_concepto` int(11) NOT NULL,
  `precio_estimado` decimal(10,0) DEFAULT NULL,
  `fecha_hora` datetime NOT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_relacion`),
  KEY `id_relacion` (`id_relacion`),
  KEY `id_relacion_2` (`id_relacion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `conceptos_espontaneos`
--

INSERT INTO `conceptos_espontaneos` (`id_relacion`, `id_cliente`, `id_concepto`, `precio_estimado`, `fecha_hora`, `usuario`) VALUES
(4, 30, 8, NULL, '2016-05-06 11:00:18', 10),
(5, 14, 8, NULL, '2016-05-07 08:44:48', 10),
(6, 14, 9, NULL, '2016-05-07 08:45:04', 10),
(7, 14, 9, NULL, '2016-05-07 08:45:15', 10),
(8, 3, 15, NULL, '2016-05-07 08:48:41', 5),
(9, 12, 15, NULL, '2016-05-07 08:49:06', 5),
(10, 14, 1, NULL, '2016-05-09 08:20:05', 8),
(11, 122, 16, NULL, '2016-05-09 09:59:30', 2),
(14, 69, 19, NULL, '2016-05-10 11:02:13', 2),
(13, 119, 12, NULL, '2016-05-10 08:36:08', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos_realizados`
--

CREATE TABLE IF NOT EXISTS `conceptos_realizados` (
  `id_registro` int(5) NOT NULL AUTO_INCREMENT,
  `id_concepto` int(5) NOT NULL,
  `id_cliente` int(5) NOT NULL,
  `periodo` int(11) NOT NULL,
  `usuario` int(5) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id_registro`),
  KEY `id_registro` (`id_registro`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=153 ;

--
-- Volcado de datos para la tabla `conceptos_realizados`
--

INSERT INTO `conceptos_realizados` (`id_registro`, `id_concepto`, `id_cliente`, `periodo`, `usuario`, `fecha`) VALUES
(1, 8, 1, 5, 5, '2016-05-04 17:42:53'),
(2, 9, 1, 5, 5, '2016-05-04 17:42:55'),
(3, 9, 10, 5, 5, '2016-05-04 18:08:51'),
(4, 9, 6, 5, 5, '2016-05-04 18:09:17'),
(5, 9, 7, 5, 5, '2016-05-04 18:09:33'),
(6, 5, 81, 5, 13, '2016-05-05 09:11:52'),
(7, 5, 4, 5, 13, '2016-05-05 09:21:34'),
(8, 5, 15, 5, 13, '2016-05-05 09:23:23'),
(9, 5, 25, 5, 13, '2016-05-05 09:24:34'),
(10, 5, 52, 5, 13, '2016-05-05 09:25:42'),
(11, 5, 7, 5, 13, '2016-05-05 09:26:55'),
(12, 5, 29, 5, 13, '2016-05-05 09:28:27'),
(13, 5, 29, 4, 13, '2016-05-05 09:28:35'),
(14, 1, 88, 5, 11, '2016-05-05 10:32:26'),
(15, 1, 89, 5, 11, '2016-05-05 10:32:54'),
(16, 1, 90, 5, 11, '2016-05-05 10:33:29'),
(17, 8, 7, 5, 5, '2016-05-05 10:48:54'),
(18, 11, 29, 5, 11, '2016-05-05 10:54:29'),
(19, 1, 18, 5, 11, '2016-05-05 10:56:45'),
(20, 2, 29, 5, 11, '2016-05-05 11:12:15'),
(21, 8, 10, 5, 5, '2016-05-05 11:16:39'),
(22, 5, 35, 5, 13, '2016-05-05 12:07:13'),
(23, 5, 68, 5, 13, '2016-05-05 12:09:59'),
(24, 5, 61, 5, 13, '2016-05-05 12:10:56'),
(25, 9, 35, 5, 9, '2016-05-05 16:38:44'),
(26, 8, 35, 5, 9, '2016-05-05 16:38:47'),
(27, 9, 26, 5, 9, '2016-05-05 16:39:41'),
(28, 8, 26, 5, 9, '2016-05-05 16:39:43'),
(29, 8, 9, 5, 5, '2016-05-05 18:50:47'),
(30, 9, 9, 5, 5, '2016-05-05 18:50:50'),
(31, 8, 6, 5, 5, '2016-05-05 19:23:11'),
(32, 8, 8, 5, 5, '2016-05-06 10:10:16'),
(33, 9, 8, 5, 5, '2016-05-06 10:10:22'),
(34, 5, 26, 5, 13, '2016-05-06 10:30:03'),
(35, 5, 116, 5, 13, '2016-05-06 10:31:42'),
(36, 5, 70, 5, 13, '2016-05-06 10:36:23'),
(37, 9, 71, 5, 10, '2016-05-06 10:57:51'),
(38, 8, 71, 5, 10, '2016-05-06 10:58:25'),
(39, 8, 30, 5, 10, '2016-05-06 11:01:44'),
(40, 9, 30, 5, 10, '2016-05-06 11:04:14'),
(41, 9, 68, 5, 10, '2016-05-06 11:05:13'),
(42, 8, 68, 5, 10, '2016-05-06 11:05:15'),
(43, 9, 29, 5, 10, '2016-05-06 11:06:33'),
(44, 8, 29, 5, 10, '2016-05-06 11:06:34'),
(45, 8, 109, 5, 10, '2016-05-06 11:08:03'),
(46, 9, 109, 5, 10, '2016-05-06 11:08:05'),
(47, 9, 48, 5, 10, '2016-05-06 11:09:03'),
(48, 8, 48, 5, 10, '2016-05-06 11:09:05'),
(49, 5, 120, 5, 13, '2016-05-06 11:10:33'),
(50, 9, 15, 5, 10, '2016-05-06 11:43:35'),
(51, 8, 15, 5, 10, '2016-05-06 11:43:38'),
(52, 9, 65, 5, 10, '2016-05-06 11:46:11'),
(53, 8, 65, 5, 10, '2016-05-06 11:46:12'),
(54, 8, 4, 5, 10, '2016-05-06 11:46:55'),
(55, 9, 4, 5, 10, '2016-05-06 11:46:57'),
(56, 9, 46, 5, 10, '2016-05-06 11:47:53'),
(57, 8, 46, 5, 10, '2016-05-06 11:47:54'),
(58, 9, 81, 5, 10, '2016-05-06 11:48:46'),
(59, 8, 81, 5, 10, '2016-05-06 11:48:47'),
(60, 9, 70, 5, 10, '2016-05-06 11:49:36'),
(61, 8, 70, 5, 10, '2016-05-06 11:49:37'),
(62, 5, 54, 5, 13, '2016-05-06 12:31:37'),
(63, 5, 27, 5, 13, '2016-05-06 12:31:59'),
(64, 9, 121, 5, 10, '2016-05-06 18:43:43'),
(65, 8, 121, 5, 10, '2016-05-06 18:43:46'),
(66, 8, 92, 5, 9, '2016-05-06 18:59:26'),
(67, 9, 92, 5, 9, '2016-05-06 18:59:28'),
(68, 9, 32, 5, 10, '2016-05-07 08:03:16'),
(69, 8, 32, 5, 10, '2016-05-07 08:03:19'),
(70, 9, 25, 5, 10, '2016-05-07 08:04:23'),
(71, 8, 25, 5, 10, '2016-05-07 08:04:24'),
(72, 8, 120, 5, 10, '2016-05-07 08:06:10'),
(73, 9, 120, 5, 10, '2016-05-07 08:06:12'),
(74, 8, 14, 5, 10, '2016-05-07 08:46:39'),
(75, 9, 14, 5, 10, '2016-05-07 08:46:42'),
(76, 11, 31, 5, 3, '2016-05-07 09:33:42'),
(77, 11, 86, 5, 11, '2016-05-07 11:20:37'),
(78, 1, 74, 5, 8, '2016-05-09 08:55:18'),
(79, 11, 16, 5, 2, '2016-05-09 09:02:49'),
(80, 8, 27, 5, 10, '2016-05-09 09:39:21'),
(81, 9, 27, 5, 10, '2016-05-09 09:39:23'),
(82, 9, 82, 5, 10, '2016-05-09 10:00:40'),
(83, 9, 38, 5, 10, '2016-05-09 10:01:23'),
(84, 9, 11, 5, 10, '2016-05-09 10:02:08'),
(85, 9, 61, 5, 10, '2016-05-09 10:02:50'),
(86, 9, 52, 5, 10, '2016-05-09 10:03:30'),
(87, 8, 52, 5, 10, '2016-05-09 10:14:35'),
(88, 9, 123, 5, 9, '2016-05-09 10:14:54'),
(89, 8, 123, 5, 9, '2016-05-09 10:14:55'),
(90, 9, 124, 5, 9, '2016-05-09 10:15:56'),
(91, 8, 124, 5, 9, '2016-05-09 10:15:57'),
(92, 8, 116, 5, 9, '2016-05-09 10:18:54'),
(93, 9, 116, 5, 9, '2016-05-09 10:18:55'),
(94, 8, 57, 5, 9, '2016-05-09 10:21:03'),
(95, 9, 57, 5, 9, '2016-05-09 10:21:06'),
(96, 5, 57, 5, 9, '2016-05-09 10:21:06'),
(97, 9, 125, 5, 9, '2016-05-09 10:22:27'),
(98, 8, 125, 5, 9, '2016-05-09 10:22:28'),
(99, 8, 126, 5, 10, '2016-05-09 10:25:55'),
(100, 9, 126, 5, 10, '2016-05-09 10:25:56'),
(101, 8, 20, 5, 9, '2016-05-09 10:25:57'),
(102, 9, 20, 5, 9, '2016-05-09 10:25:58'),
(103, 5, 126, 5, 13, '2016-05-09 10:29:24'),
(104, 11, 108, 5, 2, '2016-05-09 10:37:17'),
(105, 8, 84, 5, 10, '2016-05-09 11:21:22'),
(106, 9, 84, 5, 10, '2016-05-09 11:21:24'),
(107, 8, 127, 5, 10, '2016-05-09 11:22:34'),
(108, 9, 127, 5, 10, '2016-05-09 11:22:35'),
(109, 5, 127, 5, 13, '2016-05-09 11:34:57'),
(110, 5, 32, 5, 13, '2016-05-09 11:35:22'),
(111, 5, 92, 5, 13, '2016-05-09 11:35:47'),
(112, 5, 84, 5, 13, '2016-05-09 11:36:25'),
(113, 11, 92, 5, 3, '2016-05-09 16:39:06'),
(114, 1, 17, 5, 3, '2016-05-09 17:06:00'),
(115, 8, 82, 5, 10, '2016-05-09 17:15:28'),
(116, 1, 56, 5, 8, '2016-05-09 18:19:36'),
(117, 11, 32, 5, 3, '2016-05-09 18:36:48'),
(118, 8, 33, 5, 10, '2016-05-09 18:44:14'),
(119, 9, 33, 5, 10, '2016-05-09 18:44:16'),
(120, 11, 82, 5, 11, '2016-05-09 19:22:16'),
(121, 12, 46, 5, 3, '2016-05-09 19:37:53'),
(122, 12, 25, 5, 3, '2016-05-09 19:38:44'),
(123, 12, 14, 5, 3, '2016-05-09 19:39:21'),
(124, 12, 24, 5, 3, '2016-05-09 19:40:50'),
(125, 12, 71, 5, 3, '2016-05-09 19:41:50'),
(126, 12, 109, 5, 3, '2016-05-09 19:44:04'),
(127, 12, 115, 5, 3, '2016-05-09 19:44:50'),
(128, 17, 123, 5, 9, '2016-05-10 08:45:47'),
(129, 18, 123, 5, 9, '2016-05-10 08:45:47'),
(130, 17, 66, 5, 9, '2016-05-10 08:45:55'),
(131, 5, 82, 5, 13, '2016-05-10 09:05:17'),
(132, 5, 33, 5, 13, '2016-05-10 09:05:46'),
(133, 5, 121, 5, 13, '2016-05-10 09:06:17'),
(134, 5, 71, 5, 13, '2016-05-10 09:07:59'),
(135, 12, 4, 5, 3, '2016-05-10 09:13:27'),
(136, 12, 54, 5, 3, '2016-05-10 09:14:25'),
(137, 12, 85, 5, 3, '2016-05-10 09:15:01'),
(138, 1, 45, 5, 8, '2016-05-10 09:39:06'),
(139, 1, 23, 5, 8, '2016-05-10 09:45:50'),
(140, 1, 63, 5, 8, '2016-05-10 09:54:56'),
(141, 1, 102, 5, 8, '2016-05-10 10:00:34'),
(142, 8, 16, 5, 10, '2016-05-10 11:18:16'),
(143, 8, 11, 5, 10, '2016-05-10 11:18:41'),
(144, 8, 61, 5, 10, '2016-05-10 11:19:10'),
(145, 9, 31, 5, 10, '2016-05-10 11:23:18'),
(146, 9, 87, 5, 10, '2016-05-10 11:23:29'),
(147, 9, 67, 5, 10, '2016-05-10 11:23:40'),
(148, 9, 54, 5, 10, '2016-05-10 11:23:53'),
(149, 9, 55, 5, 10, '2016-05-10 11:24:07'),
(150, 9, 60, 5, 10, '2016-05-10 11:24:18'),
(151, 9, 86, 5, 10, '2016-05-10 11:24:27'),
(152, 11, 116, 5, 3, '2016-05-10 12:23:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_cabecera`
--

CREATE TABLE IF NOT EXISTS `ingreso_cabecera` (
  `id_ingreso` int(11) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(5) DEFAULT NULL,
  `estado` enum('A','B','C') DEFAULT NULL,
  `fecha_ingreso` datetime DEFAULT NULL,
  `usuario` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_ingreso`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_detalle`
--

CREATE TABLE IF NOT EXISTS `ingreso_detalle` (
  `id_ingreso_detalle` int(5) NOT NULL AUTO_INCREMENT,
  `id_ingreso` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id_ingreso_detalle`),
  KEY `id_ingreso` (`id_ingreso`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacion_cabecera`
--

CREATE TABLE IF NOT EXISTS `liquidacion_cabecera` (
  `id_liquidacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `periodo` int(11) NOT NULL,
  `monto_estimado` double NOT NULL,
  `monto_pagado` double NOT NULL,
  `saldo` double DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `usuario` int(11) NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_liquidacion`),
  KEY `id_liquidacion` (`id_liquidacion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `liquidacion_cabecera`
--

INSERT INTO `liquidacion_cabecera` (`id_liquidacion`, `id_cliente`, `periodo`, `monto_estimado`, `monto_pagado`, `saldo`, `fecha`, `usuario`, `fecha_modificacion`) VALUES
(1, 81, 4, 1500, 1500, 0, '2016-05-06 19:38:06', 5, '2016-05-06 19:38:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacion_detalle`
--

CREATE TABLE IF NOT EXISTS `liquidacion_detalle` (
  `id_liquidacion_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_liquidacion` int(11) NOT NULL,
  `id_concepto` int(11) NOT NULL,
  `periodo` int(11) NOT NULL,
  `tipo` varchar(2) NOT NULL,
  `monto` double NOT NULL,
  PRIMARY KEY (`id_liquidacion_detalle`),
  KEY `id_liquidacion_detalle` (`id_liquidacion_detalle`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `liquidacion_detalle`
--

INSERT INTO `liquidacion_detalle` (`id_liquidacion_detalle`, `id_liquidacion`, `id_concepto`, `periodo`, `tipo`, `monto`) VALUES
(6, 1, 5, 4, 'B', 0),
(5, 1, 8, 4, 'B', 0),
(4, 1, 9, 4, 'B', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(5) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  `icono` varchar(250) DEFAULT NULL,
  `estado` enum('A','B') NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id_menu`, `descripcion`, `icono`, `estado`) VALUES
(1, 'Turnos', 'turno', 'A'),
(2, 'Administracion', 'admin', 'A'),
(3, 'Capital Humano', 'cap_humano', 'A'),
(4, 'Sistema', 'sistema', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_aplicativo`
--

CREATE TABLE IF NOT EXISTS `menu_aplicativo` (
  `id_relacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `id_aplicativo` int(11) NOT NULL,
  PRIMARY KEY (`id_relacion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `menu_aplicativo`
--

INSERT INTO `menu_aplicativo` (`id_relacion`, `id_menu`, `id_aplicativo`) VALUES
(1, 3, 1),
(2, 1, 2);

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
  `rol` varchar(50) DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='personas.; InnoDB free: 11264 kB; (`cod_estado`) REFE' AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `nombre`, `onombre`, `apellido`, `oapellido`, `dni`, `fecha_nacimiento`, `sexo`, `domicilio`, `rol`, `pais_nacimiento`, `telefono_particular`, `telefono_celular`, `cod_estado`, `usuario`, `fecha_alta`, `fecha_ultima_modificacion`, `id_dominio`) VALUES
(1, 'Jose', '', 'Ponce', NULL, NULL, '0000-00-00', '', NULL, NULL, '', '0', '0', 'A', 0000000000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 'Hector', NULL, 'Bordon', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, '0', '0', 'A', 0000000001, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 'Anibal', NULL, 'Lopez', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, '0', '0', 'A', 0000000002, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 'Raul', NULL, 'Karaben', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, '0', '0', 'A', 0000000003, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 'Sebastian', NULL, 'Karaben', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, '0', '0', 'A', 0000000001, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(6, 'Liliana', NULL, 'Hiller', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, '0', '0', 'A', 0000000001, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(7, 'Mirta', NULL, 'Hiller', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, '0', '0', 'A', 0000000001, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(8, 'Oscar ', NULL, 'Gimenez', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, '0', '0', 'A', 0000000001, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(9, 'Leandro', NULL, 'Martinez', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, '0', '0', 'A', 0000000001, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(10, 'Vanina ', NULL, 'Friedrich', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, '0', '0', 'A', 0000000001, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(11, 'Carolina ', NULL, 'Antunez', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, '0', '0', 'A', 0000000001, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(12, 'Veronica', NULL, 'Gallardo', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, '0', '0', 'A', 0000000001, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(13, 'Edith', NULL, 'Ayala', NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, '0', '0', 'A', 0000000001, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

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
  `minimo` int(250) DEFAULT NULL,
  `cantidad` int(250) DEFAULT NULL,
  `precio_compra` varchar(250) DEFAULT NULL,
  `precio_costo` varchar(10) DEFAULT NULL,
  `codigo` varchar(250) DEFAULT NULL,
  `iva` varchar(250) DEFAULT NULL,
  `venta` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `id_productos` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_movimientos`
--

CREATE TABLE IF NOT EXISTS `productos_movimientos` (
  `id_registro` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_vencimiento` datetime DEFAULT NULL,
  `lote` varchar(250) DEFAULT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_registro`),
  KEY `id_registro` (`id_registro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  `contacto` varchar(200) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefonos` varchar(200) DEFAULT NULL,
  `mail` varchar(200) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`),
  KEY `id_proveedores` (`id_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `descripcion`, `contacto`, `direccion`, `telefonos`, `mail`, `estado`) VALUES
(1, 'Prueba De Jose', 'yoyoyo', 'francia 1632', '4450933', 'preuba', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'Identificador de usuario.',
  `clave` varchar(50) NOT NULL COMMENT 'Clave que usara el usuario en conjunto con su id.',
  `nombre` varchar(50) NOT NULL DEFAULT '' COMMENT 'Nombre de usuario. (cuenta).',
  `id_persona` int(10) unsigned zerofill NOT NULL DEFAULT '0000000000' COMMENT 'Id de la persona federada. Ref. tabla persona_federacion.',
  `admin` varchar(5) DEFAULT NULL,
  `estado` enum('A','B') DEFAULT 'A' COMMENT 'Admite solamente valores A=activo; B=baja.',
  `fecha_baja` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha en la que se dio de baja el registro.',
  `fecha_ultima_modificacion` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'Fecha en la que se realizo la ultima modificacion del registro.',
  `usuario` int(10) unsigned zerofill NOT NULL DEFAULT '0000000000' COMMENT 'Id del usuario que modifico por ultima vez el registro.',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `id_persona_federada` (`id_persona`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC COMMENT='Usuarios.' AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `clave`, `nombre`, `id_persona`, `admin`, `estado`, `fecha_baja`, `fecha_ultima_modificacion`, `usuario`) VALUES
(0000000001, 'santino', 'jponce', 0000000001, 'S', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0000000001),
(0000000002, 'hector2016', 'hbordon', 0000000002, 'S', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0000000001),
(0000000003, 'anibal2016', 'alopez', 0000000003, 'N', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0000000002),
(0000000004, 'raul2016', 'rkaraben', 0000000004, 'S', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0000000003),
(0000000005, 'Skaraben567', 'skaraben', 0000000005, 'S', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0000000001),
(0000000006, 'liliana2016', 'lhiller', 0000000006, 'S', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0000000001),
(0000000007, 'indira2013', 'mhiller', 0000000007, 'N', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0000000001),
(0000000008, 'oscar2016', 'ogimenez', 0000000008, 'N', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0000000001),
(0000000009, 'leandro2016', 'lmartinez', 0000000009, 'S', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0000000001),
(0000000010, 'vaninafrie', 'vfriedrich', 0000000010, 'N', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0000000001),
(0000000011, 'carolina2016', 'cantunez', 0000000011, 'N', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0000000001),
(0000000012, 'veronica2016', 'vgallardo', 0000000012, 'N', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0000000001),
(0000000013, 'edith2016', 'eayala', 0000000013, 'N', 'A', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0000000001);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `usuario_aplicativos`
--

INSERT INTO `usuario_aplicativos` (`id_registro`, `id_usuario`, `id_aplicativo`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 7),
(7, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_cabecera`
--

CREATE TABLE IF NOT EXISTS `venta_cabecera` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(5) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `forma_pago` enum('E','CC','T') NOT NULL,
  `monto` decimal(10,0) NOT NULL,
  `estado` enum('A','B','C') DEFAULT NULL,
  `fecha_pedido` datetime DEFAULT NULL,
  `usuario` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_detalle`
--

CREATE TABLE IF NOT EXISTS `venta_detalle` (
  `id_venta_detalle` int(5) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` varchar(20) NOT NULL,
  PRIMARY KEY (`id_venta_detalle`),
  KEY `id_venta` (`id_venta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

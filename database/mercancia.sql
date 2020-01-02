-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 31-07-2019 a las 21:08:26
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mercancia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categorias`
--

DROP TABLE IF EXISTS `tbl_categorias`;
CREATE TABLE IF NOT EXISTS `tbl_categorias` (
  `id` int(2) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_categorias`
--

INSERT INTO `tbl_categorias` (`id`, `nombre`) VALUES
(1, 'Electrodomésticos'),
(3, 'Zapatos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ciudades`
--

DROP TABLE IF EXISTS `tbl_ciudades`;
CREATE TABLE IF NOT EXISTS `tbl_ciudades` (
  `id` varchar(4) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `departamento` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_ciudades_tbl_departamentos` (`departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_ciudades`
--

INSERT INTO `tbl_ciudades` (`id`, `nombre`, `departamento`) VALUES
('001', 'MEDELLIN', '05'),
('002', 'ABEJORRAL', '05'),
('004', 'ABRIAQUI', '05'),
('006', 'ACHI', '13'),
('011', 'AGUACHICA', '20'),
('013', 'AGUADAS', '17'),
('016', 'AIPE', '41'),
('019', 'ALBAN', '25'),
('020', 'ALGECIRAS', '41'),
('021', 'ALEJANDRIA', '05'),
('022', 'ALMEIDA', '15'),
('025', 'ALTO BAUDO', '27'),
('026', 'ALTAMIRA', '41'),
('029', 'ALBANIA', '18'),
('030', 'AMAGA', '05'),
('031', 'AMALFI', '05'),
('032', 'ASTREA', '20'),
('034', 'ANDES', '05'),
('035', 'ANAPOIMA', '25'),
('036', 'ANGELOPOLIS', '05'),
('038', 'ANGOSTURA', '05'),
('040', 'ANORI', '05'),
('042', 'SANTAFE DE ANTIOQUIA', '05'),
('044', 'ANZA', '05'),
('045', 'APARTADO', '05'),
('047', 'AQUITANIA', '15'),
('050', 'ARANZAZU', '17'),
('051', 'ARBOLETES', '05'),
('052', 'ARJONA', '13'),
('053', 'ARBELAEZ', '25'),
('055', 'ARGELIA', '05'),
('058', 'ARIGUANI', '47'),
('059', 'ARMENIA', '05'),
('060', 'BOSCONIA', '20'),
('062', 'ARROYOHONDO', '13'),
('068', 'AYAPEL', '23'),
('073', 'BAGADO', '27'),
('074', 'BARRANCO DE LOBA', '13'),
('075', 'BALBOA', '19'),
('077', 'BAJO BAUDO', '27'),
('078', 'BARANOA', '08'),
('079', 'BARBOSA', '05'),
('086', 'BELMIRA', '05'),
('087', 'BELEN', '15'),
('088', 'BELLO', '05'),
('090', 'BERBEO', '15'),
('091', 'BETANIA', '05'),
('092', 'BETEITIVA', '15'),
('093', 'BETULIA', '05'),
('094', 'BELEN DE LOS ANDAQUIES', '18'),
('095', 'BITUIMA', '25'),
('097', 'BOAVITA', '15'),
('098', 'DISTRACCION', '44'),
('099', 'BOJACA', '25'),
('100', 'BOLIVAR', '19'),
('101', 'CIUDAD BOLIVAR', '05'),
('104', 'BOYACA', '15'),
('109', 'BUENAVISTA', '15'),
('110', 'BUENOS AIRES', '19'),
('113', 'BURITICA', '05'),
('114', 'BUSBANZA', '15'),
('120', 'CACERES', '05'),
('123', 'CACHIPAY', '25'),
('124', 'CABUYARO', '50'),
('125', 'CAICEDO', '05'),
('126', 'CAJICA', '25'),
('129', 'CALDAS', '05'),
('130', 'CAJIBIO', '19'),
('131', 'CALDAS', '15'),
('132', 'CAMPOALEGRE', '41'),
('134', 'CAMPAMENTO', '05'),
('135', 'CAMPOHERMOSO', '15'),
('137', 'CAMPO DE LA CRUZ', '08'),
('140', 'CALAMAR', '13'),
('141', 'CANDELARIA', '08'),
('142', 'CARACOLI', '05'),
('145', 'CARAMANTA', '05'),
('147', 'CAREPA', '05'),
('148', 'EL CARMEN DE VIBORAL', '05'),
('150', 'CAROLINA', '05'),
('151', 'CAQUEZA', '25'),
('154', 'CAUCASIA', '05'),
('160', 'CANTAGALLO', '13'),
('161', 'CERRO SAN ANTONIO', '47'),
('162', 'CERINZA', '15'),
('168', 'CHIMA', '23'),
('170', 'CHIBOLO', '47'),
('172', 'CHIGORODO', '05'),
('174', 'CHINCHINA', '17'),
('175', 'CHIMICHAGUA', '20'),
('176', 'CHIQUINQUIRA', '15'),
('178', 'CHIRIGUANA', '20'),
('180', 'CHISCAS', '15'),
('181', 'CHOACHI', '25'),
('182', 'CHINU', '23'),
('183', 'CHITA', '15'),
('185', 'CHITARAQUE', '15'),
('187', 'CHIVATA', '15'),
('188', 'CICUCO', '13'),
('189', 'CIENEGA', '15'),
('190', 'CISNEROS', '05'),
('197', 'COCORNA', '05'),
('200', 'COGUA', '25'),
('204', 'COMBITA', '15'),
('205', 'CURILLO', '18'),
('206', 'CONCEPCION', '05'),
('209', 'CONCORDIA', '05'),
('212', 'COPACABANA', '05'),
('214', 'COTA', '25'),
('215', 'CORRALES', '15'),
('218', 'COVARACHIA', '15'),
('222', 'CLEMENCIA', '13'),
('223', 'CUBARA', '15'),
('224', 'CUCAITA', '15'),
('226', 'CUITIVA', '15'),
('228', 'CURUMANI', '20'),
('232', 'CHIQUIZA', '15'),
('234', 'DABEIBA', '05'),
('236', 'CHIVOR', '15'),
('237', 'DON MATIAS', '05'),
('238', 'DUITAMA', '15'),
('240', 'EBEJICO', '05'),
('244', 'EL CARMEN DE BOLIVAR', '13'),
('245', 'EL COLEGIO', '25'),
('247', 'EL DONCELLO', '18'),
('248', 'EL GUAMO', '13'),
('250', 'EL BAGRE', '05'),
('251', 'EL CASTILLO', '50'),
('256', 'EL PAUJIL', '18'),
('260', 'EL ROSAL', '25'),
('264', 'ENTRERRIOS', '05'),
('266', 'ENVIGADO', '05'),
('268', 'EL RETEN', '47'),
('269', 'FACATATIVA', '25'),
('270', 'EL DORADO', '50'),
('272', 'FIRAVITOBA', '15'),
('276', 'FLORESTA', '15'),
('279', 'FOMEQUE', '25'),
('281', 'FOSCA', '25'),
('282', 'FREDONIA', '05'),
('284', 'FRONTINO', '05'),
('286', 'FUNZA', '25'),
('287', 'FUENTE DE ORO', '50'),
('288', 'FUQUENE', '25'),
('290', 'FLORENCIA', '19'),
('293', 'GACHANTIVA', '15'),
('295', 'GAMARRA', '20'),
('296', 'GALAPA', '08'),
('297', 'GACHETA', '25'),
('298', 'GARZON', '41'),
('299', 'GARAGOA', '15'),
('300', 'HATILLO DE LOBA', '13'),
('306', 'GIRALDO', '05'),
('307', 'GIRARDOT', '25'),
('308', 'GIRARDOTA', '05'),
('310', 'GOMEZ PLATA', '05'),
('312', 'GRANADA', '25'),
('313', 'GRANADA', '05'),
('315', 'GUADALUPE', '05'),
('317', 'GUACAMAYAS', '15'),
('318', 'GUARNE', '05'),
('319', 'GUADALUPE', '41'),
('320', 'GUADUAS', '25'),
('321', 'GUATAPE', '05'),
('322', 'GUATEQUE', '15'),
('324', 'GUATAQUI', '25'),
('325', 'GUAYATA', '15'),
('326', 'GUATAVITA', '25'),
('328', 'GUAYABAL DE SIQUIMA', '25'),
('330', 'MESETAS', '50'),
('332', 'GsICAN', '15'),
('335', 'GUAYABETAL', '25'),
('339', 'GUTIERREZ', '25'),
('347', 'HELICONIA', '05'),
('349', 'HOBO', '41'),
('350', 'LA APARTADA', '23'),
('353', 'HISPANIA', '05'),
('355', 'INZA', '19'),
('357', 'IQUIRA', '41'),
('359', 'ISNOS', '41'),
('360', 'ITAGUI', '05'),
('361', 'ITUANGO', '05'),
('362', 'IZA', '15'),
('364', 'JARDIN', '05'),
('367', 'JENESANO', '15'),
('368', 'JERICO', '05'),
('370', 'URIBE', '50'),
('372', 'JUAN DE ACOSTA', '08'),
('376', 'LA CEJA', '05'),
('377', 'LABRANZAGRANDE', '15'),
('378', 'LA ARGENTINA', '41'),
('380', 'LA ESTRELLA', '05'),
('383', 'LA GLORIA', '20'),
('386', 'LA MESA', '25'),
('388', 'LA MERCED', '17'),
('390', 'LA PINTADA', '05'),
('392', 'LA SIERRA', '19'),
('394', 'LA PALMA', '25'),
('396', 'LA PLATA', '41'),
('397', 'LA VEGA', '19'),
('400', 'LA UNION', '05'),
('401', 'LA VICTORIA', '15'),
('402', 'LA VEGA', '25'),
('403', 'LA UVITA', '15'),
('407', 'VILLA DE LEYVA', '15'),
('411', 'LIBORINA', '05'),
('413', 'LLORO', '27'),
('417', 'LORICA', '23'),
('418', 'LOPEZ', '19'),
('419', 'LOS CORDOBAS', '23'),
('420', 'LA JAGUA DEL PILAR', '44'),
('421', 'LURUACO', '08'),
('425', 'MACEO', '05'),
('426', 'MACHETA', '25'),
('430', 'MAGANGUE', '13'),
('433', 'MALAMBO', '08'),
('436', 'MANATI', '08'),
('438', 'MEDINA', '25'),
('440', 'MARINILLA', '05'),
('442', 'MARIA LA BAJA', '13'),
('443', 'MANAURE', '20'),
('444', 'MARQUETALIA', '17'),
('446', 'MARULANDA', '17'),
('450', 'MERCADERES', '19'),
('455', 'MIRAFLORES', '15'),
('458', 'MONTECRISTO', '13'),
('460', 'MILAN', '18'),
('464', 'MONGUA', '15'),
('466', 'MONGUI', '15'),
('467', 'MONTEBELLO', '05'),
('468', 'MOMPOS', '13'),
('469', 'MONIQUIRA', '15'),
('473', 'MORALES', '13'),
('475', 'MURINDO', '05'),
('476', 'MOTAVITA', '15'),
('479', 'MORELIA', '18'),
('480', 'MUTATA', '05'),
('483', 'NATAGA', '41'),
('486', 'NEIRA', '17'),
('488', 'NILO', '25'),
('489', 'NIMAIMA', '25'),
('490', 'NECOCLI', '05'),
('491', 'NOBSA', '15'),
('494', 'NUEVO COLON', '15'),
('495', 'NECHI', '05'),
('500', 'OICATA', '15'),
('501', 'OLAYA', '05'),
('503', 'OPORAPA', '41'),
('506', 'VENECIA', '25'),
('507', 'OTANCHE', '15'),
('511', 'PACHAVITA', '15'),
('513', 'PACORA', '17'),
('514', 'PAEZ', '15'),
('516', 'PAIPA', '15'),
('517', 'PAEZ', '19'),
('518', 'PAJARITO', '15'),
('520', 'PALMAR DE VARELA', '08'),
('522', 'PANQUEBA', '15'),
('524', 'PALESTINA', '17'),
('530', 'PARATEBUENO', '25'),
('531', 'PAUNA', '15'),
('532', 'PATIA', '19'),
('533', 'PAYA', '15'),
('535', 'PASCA', '25'),
('537', 'PAZ DE RIO', '15'),
('541', 'PENSILVANIA', '17'),
('542', 'PESCA', '15'),
('543', 'PEQUE', '05'),
('548', 'PIENDAMO', '19'),
('549', 'PIOJO', '08'),
('550', 'PISBA', '15'),
('551', 'PITALITO', '41'),
('555', 'PLANETA RICA', '23'),
('558', 'POLONUEVO', '08'),
('560', 'PONEDERA', '08'),
('568', 'PUERTO GAITAN', '50'),
('570', 'PUEBLO BELLO', '20'),
('572', 'PUERTO BOYACA', '15'),
('573', 'PUERTO COLOMBIA', '08'),
('574', 'PUERTO ESCONDIDO', '23'),
('576', 'PUEBLORRICO', '05'),
('577', 'PUERTO LLERAS', '50'),
('579', 'PUERTO BERRIO', '05'),
('580', 'REGIDOR', '13'),
('585', 'PUERTO NARE', '05'),
('586', 'PURISIMA', '23'),
('590', 'PUERTO RICO', '50'),
('591', 'PUERTO TRIUNFO', '05'),
('592', 'PUERTO RICO', '18'),
('594', 'QUETAME', '25'),
('596', 'QUIPILE', '25'),
('599', 'RAMIRIQUI', '15'),
('600', 'RIO VIEJO', '13'),
('604', 'REMEDIOS', '05'),
('605', 'REMOLINO', '47'),
('606', 'REPELON', '08'),
('607', 'RETIRO', '05'),
('610', 'SAN JOSE DEL FRAGUA', '18'),
('612', 'RICAURTE', '25'),
('614', 'RIOSUCIO', '17'),
('615', 'RIONEGRO', '05'),
('616', 'RISARALDA', '17'),
('620', 'SAN CRISTOBAL', '13'),
('621', 'RONDON', '15'),
('622', 'ROSAS', '19'),
('624', 'SANTA ROSALIA', '99'),
('628', 'SABANALARGA', '05'),
('631', 'SABANETA', '05'),
('632', 'SABOYA', '15'),
('634', 'SABANAGRANDE', '08'),
('638', 'SABANALARGA', '08'),
('642', 'SALGAR', '05'),
('645', 'SAN ANTONIO DEL TEQUENDAMA', '25'),
('646', 'SAMACA', '15'),
('647', 'SAN ANDRES DE CUERQUIA', '05'),
('649', 'SAN CARLOS', '05'),
('650', 'SAN FERNANDO', '13'),
('652', 'SAN FRANCISCO', '05'),
('653', 'SALAMINA', '17'),
('654', 'SAN JACINTO', '13'),
('655', 'SAN JACINTO DEL CAUCA', '13'),
('656', 'SAN JERONIMO', '05'),
('657', 'SAN JUAN NEPOMUCENO', '13'),
('658', 'SAN FRANCISCO', '25'),
('659', 'SAN JUAN DE URABA', '05'),
('660', 'SAN LUIS', '05'),
('662', 'SAMANA', '17'),
('664', 'SAN PEDRO', '05'),
('665', 'SAN PEDRO DE URABA', '05'),
('666', 'TARAIRA', '97'),
('667', 'SAN RAFAEL', '05'),
('668', 'SAN AGUSTIN', '41'),
('670', 'SAN ROQUE', '05'),
('672', 'SAN ANTERO', '23'),
('673', 'SANTA CATALINA', '13'),
('674', 'SAN VICENTE', '05'),
('675', 'SANTA LUCIA', '08'),
('676', 'SAN MIGUEL DE SEMA', '15'),
('678', 'SAN CARLOS', '23'),
('679', 'SANTA BARBARA', '05'),
('680', 'SAN CARLOS DE GUAROA', '50'),
('681', 'SAN PABLO DE BORBUR', '15'),
('683', 'SANTA ROSA', '13'),
('685', 'SANTO TOMAS', '08'),
('686', 'SANTA ROSA DE OSOS', '05'),
('688', 'SANTA ROSA DEL SUR', '13'),
('689', 'SAN MARTIN', '50'),
('690', 'SANTO DOMINGO', '05'),
('692', 'SAN SEBASTIAN DE BUENAVISTA', '47'),
('693', 'SANTA ROSA DE VITERBO', '15'),
('696', 'SANTA SOFIA', '15'),
('697', 'EL SANTUARIO', '05'),
('698', 'SANTANDER DE QUILICHAO', '19'),
('701', 'SANTA ROSA', '19'),
('703', 'SAN ZENON', '47'),
('707', 'SANTA ANA', '47'),
('710', 'SAN ALBERTO', '20'),
('711', 'VISTAHERMOSA', '50'),
('718', 'SASAIMA', '25'),
('720', 'SATIVANORTE', '15'),
('723', 'SATIVASUR', '15'),
('736', 'SEGOVIA', '05'),
('740', 'SIACHOQUE', '15'),
('743', 'SILVIA', '19'),
('744', 'SIMITI', '13'),
('745', 'SIMIJACA', '25'),
('750', 'SAN DIEGO', '20'),
('753', 'SOATA', '15'),
('754', 'SOACHA', '25'),
('755', 'SOCOTA', '15'),
('756', 'SONSON', '05'),
('757', 'SOCHA', '15'),
('758', 'SOLEDAD', '08'),
('759', 'SOGAMOSO', '15'),
('760', 'SOPLAVIENTO', '13'),
('761', 'SOPETRAN', '05'),
('762', 'SORA', '15'),
('763', 'SOTAQUIRA', '15'),
('764', 'SORACA', '15'),
('769', 'SUBACHOQUE', '25'),
('770', 'SUAN', '08'),
('772', 'SUESCA', '25'),
('773', 'CUMARIBO', '99'),
('774', 'SUSACON', '15'),
('776', 'SUTAMARCHAN', '15'),
('777', 'SUPIA', '17'),
('778', 'SUTATENZA', '15'),
('779', 'SUSA', '25'),
('780', 'TALAIGUA NUEVO', '13'),
('781', 'SUTATAUSA', '25'),
('785', 'SOLITA', '18'),
('787', 'TAMALAMEQUE', '20'),
('789', 'TAMESIS', '05'),
('790', 'TARAZA', '05'),
('791', 'TARQUI', '41'),
('792', 'TARSO', '05'),
('793', 'TAUSA', '25'),
('797', 'TENA', '25'),
('798', 'TENZA', '15'),
('799', 'TENJO', '25'),
('800', 'UNGUIA', '27'),
('801', 'TERUEL', '41'),
('804', 'TIBANA', '15'),
('805', 'TIBACUY', '25'),
('806', 'TIBASOSA', '15'),
('807', 'TIMBIO', '19'),
('808', 'TINJACA', '15'),
('809', 'TITIRIBI', '05'),
('810', 'TIQUISIO', '13'),
('814', 'TOCA', '15'),
('815', 'TOCAIMA', '25'),
('816', 'TOGsI', '15'),
('817', 'TOCANCIPA', '25'),
('819', 'TOLEDO', '05'),
('820', 'TOPAGA', '15'),
('821', 'TORIBIO', '19'),
('822', 'TOTA', '15'),
('823', 'TOPAIPI', '25'),
('824', 'TOTORO', '19'),
('832', 'TUBARA', '08'),
('835', 'TURMEQUE', '15'),
('836', 'TURBACO', '13'),
('837', 'TURBO', '05'),
('838', 'TURBANA', '13'),
('839', 'TUTAZA', '15'),
('841', 'UBAQUE', '25'),
('842', 'URAMITA', '05'),
('843', 'VILLA DE SAN DIEGO DE UBATE', '25'),
('845', 'VILLA RICA', '19'),
('847', 'URRAO', '05'),
('849', 'USIACURI', '08'),
('851', 'UTICA', '25'),
('854', 'VALDIVIA', '05'),
('855', 'VALENCIA', '23'),
('856', 'VALPARAISO', '05'),
('858', 'VEGACHI', '05'),
('860', 'VALPARAISO', '18'),
('861', 'VENECIA', '05'),
('862', 'VERGARA', '25'),
('867', 'VICTORIA', '17'),
('871', 'VILLAGOMEZ', '25'),
('872', 'VILLAVIEJA', '41'),
('873', 'VIGIA DEL FUERTE', '05'),
('874', 'VILLANUEVA', '44'),
('875', 'VILLETA', '25'),
('877', 'VITERBO', '17'),
('878', 'VIOTA', '25'),
('879', 'VIRACACHA', '15'),
('885', 'YALI', '05'),
('887', 'YARUMAL', '05'),
('889', 'YAVARATE', '97'),
('890', 'YOLOMBO', '05'),
('893', 'YONDO', '05'),
('894', 'ZAMBRANO', '13'),
('895', 'ZARAGOZA', '05'),
('897', 'ZETAQUIRA', '15'),
('898', 'ZIPACON', '25'),
('899', 'ZIPAQUIRA', '25'),
('960', 'ZAPAYAN', '47'),
('980', 'ZONA BANANERA', '47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_departamentos`
--

DROP TABLE IF EXISTS `tbl_departamentos`;
CREATE TABLE IF NOT EXISTS `tbl_departamentos` (
  `id` varchar(3) NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_departamentos`
--

INSERT INTO `tbl_departamentos` (`id`, `nombre`) VALUES
('05', 'ANTIOQUIA'),
('08', 'ATLANTICO'),
('11', 'BOGOTA'),
('13', 'BOLIVAR'),
('15', 'BOYACA'),
('17', 'CALDAS'),
('18', 'CAQUETA'),
('19', 'CAUCA'),
('20', 'CESAR'),
('23', 'CORDOBA'),
('25', 'CUNDINAMARCA'),
('27', 'CHOCO'),
('41', 'HUILA'),
('44', 'LA GUAJIRA'),
('47', 'MAGDALENA'),
('50', 'META'),
('97', 'VAUPES'),
('99', 'VICHADA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estados`
--

DROP TABLE IF EXISTS `tbl_estados`;
CREATE TABLE IF NOT EXISTS `tbl_estados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_estados`
--

INSERT INTO `tbl_estados` (`id`, `nombre`) VALUES
(1, 'Activo'),
(2, 'En proceso'),
(3, 'Enviado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imagenes`
--

DROP TABLE IF EXISTS `tbl_imagenes`;
CREATE TABLE IF NOT EXISTS `tbl_imagenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `id_producto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_imagenes_tbl_productos` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_imagenes`
--

INSERT INTO `tbl_imagenes` (`id`, `nombre`, `id_producto`) VALUES
(1, 'uploads\\images\\qqq.jpg', 2),
(24, 'uploads/images/Agudeza-visual-Encuentra-el-Panda.jpg', 13),
(25, 'uploads/images/Algo-no-encaja-22.jpg', 13),
(26, 'uploads/images/Puerco_Potter_400x400.jpg', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos`
--

DROP TABLE IF EXISTS `tbl_productos`;
CREATE TABLE IF NOT EXISTS `tbl_productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `estado` int(2) NOT NULL,
  `categoria` int(2) DEFAULT NULL,
  `descripcion` varchar(3000) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `talla` varchar(5) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `marca` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `dimensiones` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `color` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio` float NOT NULL,
  `stock` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_productos_tbl_estados` (`estado`),
  KEY `FK_tbl_productos_tbl_categorias` (`categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_productos`
--

INSERT INTO `tbl_productos` (`id`, `nombre`, `estado`, `categoria`, `descripcion`, `talla`, `marca`, `dimensiones`, `color`, `precio`, `stock`) VALUES
(2, 'Camisa LEANS 2', 1, 1, 'camiseta LEANS original', 's', 'LEANS', '20*20', 'Roja', 20000, 12),
(4, 'Zapatos', 1, 1, 'Zapatos nike original', '42', 'Nike', '20*96', 'Roja', 250000, 30),
(13, 'Lavadora', 1, 1, '', '', 'Samsung', '32*963', 'Blanco', 800000, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_usuarios`
--

DROP TABLE IF EXISTS `tbl_tipo_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_tipo_usuarios` (
  `id` int(2) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_tipo_usuarios`
--

INSERT INTO `tbl_tipo_usuarios` (`id`, `nombre`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `ciudad` varchar(4) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `direccion` varchar(255) NOT NULL,
  `tipo_usuario` int(2) NOT NULL,
  `clave` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_usuarios_tbl_tipo_usuario` (`tipo_usuario`),
  KEY `FK_tbl_usuarios_tbl_ciudades` (`ciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `nombre`, `apellido`, `correo`, `ciudad`, `telefono`, `celular`, `direccion`, `tipo_usuario`, `clave`) VALUES
(1, 'Juan', 'Alzate', 'Juan@Juan.com', '001', '12345', '3008361028', 'Calle Alcala nº1 Piso 2, Puerta C', 2, '$2y$04$PMvnmkQ9Y1zbZZWr175k2.u3xVkr.5epyC1y6aiAkBFnnAOOn3ZGu'),
(2, 'paco', 'Perez', 'paco@paco.com', '980', '1234567', '3008361028', 'Cra 30b #23-65', 2, '$2y$04$RkxqLzzbFFID9OCwjsigS.00TtOS9bH2LWUFuum/qraQiq6b8sdH.'),
(3, 'David', 'Alzate', 'david@david.com', '889', '1234567', '3008361028', 'Cra 30b #23-65', 1, '$2y$04$cXP9RZijulkuz5UBXCfYAegVCeBT7DCwwO/P1scsqPDtj5phxnxeO'),
(4, 'Daniel', 'Saldarriaga', 'daniel@daniel.com', '446', '1234567', '3008361028', 'Calle Gran via 8 Piso 1, Puerta 6', 2, '$2y$10$Ly2oNFx8D8aXU8/YDuM1R.FI.2o5HL.7J2OfY.Z5wpHLtSDfsDSIS'),
(5, 'Lorena', 'Amaranto', 'lorena@lorena.com', '440', '1234567', '3015355128', 'Calle Alcala nº1 Piso 2, Puerta C', 2, '$2y$10$HA.vfujba35kNSQFxq5OYeAqxudrqzBpjdBJuLyqqrigBr5pRvxKy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ventas`
--

DROP TABLE IF EXISTS `tbl_ventas`;
CREATE TABLE IF NOT EXISTS `tbl_ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` int(11) NOT NULL,
  `estado` int(2) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tbl_ventas_tbl_usuarios` (`cliente`),
  KEY `FK_tbl_ventas_tbl_estados` (`estado`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_ventas`
--

INSERT INTO `tbl_ventas` (`id`, `cliente`, `estado`, `descripcion`, `fecha`, `hora`, `total`) VALUES
(8, 5, 1, '', '2019-07-29', '20:13:35', 20000),
(9, 5, 1, '', '2019-07-29', '20:14:35', 390000),
(10, 5, 1, '', '2019-07-29', '20:14:52', 390000),
(11, 5, 1, '', '2019-07-29', '20:26:08', 390000),
(12, 5, 1, '', '2019-07-29', '20:27:06', 250000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_venta_productos`
--

DROP TABLE IF EXISTS `tbl_venta_productos`;
CREATE TABLE IF NOT EXISTS `tbl_venta_productos` (
  `id_producto` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `cantidad` int(3) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  KEY `FK_tbl_venta_productos_tbl_ventas` (`id_venta`),
  KEY `id_producto` (`id_producto`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_ciudades`
--
ALTER TABLE `tbl_ciudades`
  ADD CONSTRAINT `FK_tbl_ciudades_tbl_departamentos` FOREIGN KEY (`departamento`) REFERENCES `tbl_departamentos` (`id`);

--
-- Filtros para la tabla `tbl_imagenes`
--
ALTER TABLE `tbl_imagenes`
  ADD CONSTRAINT `FK_tbl_imagenes_tbl_productos` FOREIGN KEY (`id_producto`) REFERENCES `tbl_productos` (`id`);

--
-- Filtros para la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD CONSTRAINT `FK_tbl_productos_tbl_categorias` FOREIGN KEY (`categoria`) REFERENCES `tbl_categorias` (`id`),
  ADD CONSTRAINT `FK_tbl_productos_tbl_estados` FOREIGN KEY (`estado`) REFERENCES `tbl_estados` (`id`);

--
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `FK_tbl_usuarios_tbl_ciudades` FOREIGN KEY (`ciudad`) REFERENCES `tbl_ciudades` (`id`),
  ADD CONSTRAINT `FK_tbl_usuarios_tbl_tipo_usuario` FOREIGN KEY (`tipo_usuario`) REFERENCES `tbl_tipo_usuarios` (`id`);

--
-- Filtros para la tabla `tbl_ventas`
--
ALTER TABLE `tbl_ventas`
  ADD CONSTRAINT `FK_tbl_ventas_tbl_estados` FOREIGN KEY (`estado`) REFERENCES `tbl_estados` (`id`),
  ADD CONSTRAINT `FK_tbl_ventas_tbl_usuarios` FOREIGN KEY (`cliente`) REFERENCES `tbl_usuarios` (`id`);

--
-- Filtros para la tabla `tbl_venta_productos`
--
ALTER TABLE `tbl_venta_productos`
  ADD CONSTRAINT `FK_tbl_venta_productos_tbl_productos` FOREIGN KEY (`id_producto`) REFERENCES `tbl_productos` (`id`),
  ADD CONSTRAINT `FK_tbl_venta_productos_tbl_ventas` FOREIGN KEY (`id_venta`) REFERENCES `tbl_ventas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

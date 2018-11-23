CREATE TABLE `material` (
  `id` varchar(10) NOT NULL PRIMARY KEY,
  `descripcion` varchar(60) NOT NULL,
  `calibre` enum('20','22','24','26','28') NOT NULL,
  `peso` decimal(15,4) NOT NULL,
  `largo` decimal(15,2) NOT NULL,
  `ancho` decimal(15,2) NOT NULL,
  `peralte` decimal(15,2) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `material` (`id`, `descripcion`, `calibre`, `peso`, `largo`, `ancho`, `peralte`) VALUES
('0', 'Ternium TR-101 Zintro Galvanizado 183cm C-22', '22', '9.6807', '183.00', '101.00', '2.50'),
('1', 'Ternium TR-101 Zintro Galvanizado 183cm C-26', '26', '7.9422', '183.00', '101.00', '2.50');

CREATE TABLE `partida` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `volumen` decimal(15,2) NOT NULL,
  `peso` decimal(15,2) NOT NULL,
  `material_id` varchar(10) NOT NULL,
  `piezas` int(11) NOT NULL,

  FOREIGN KEY (`material_id`)
    REFERENCES `material`(`id`)
    ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `almacen` (
  `id` varchar(10) NOT NULL PRIMARY KEY,
  `nombre` varchar(30) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` int(10) NOT NULL,
  `correo` varchar(30) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `movimiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `material_id` varchar(10) NOT NULL,
  `almacen_id` varchar(10) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '0',
  `tipo_movimiento` enum('Entrada','Salida') DEFAULT NULL,
  `fecha_movimiento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

  FOREIGN KEY (`material_id`)
    REFERENCES `material`(`id`)
    ON UPDATE CASCADE,

  FOREIGN KEY (`almacen_id`)
    REFERENCES `almacen`(`id`)
    ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `material_id` varchar(10) NOT NULL,
  `almacen_id` varchar(10) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '0',

  FOREIGN KEY (`material_id`)
    REFERENCES `material`(`id`)
    ON UPDATE CASCADE,

  FOREIGN KEY (`almacen_id`)
    REFERENCES `almacen`(`id`)
    ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `rfc` varchar(15) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `cliente` (`id`, `nombre`, `direccion`, `telefono`, `correo`, `rfc`) VALUES
(1, 'Juan Pablo Naranjo', 'Av. Linces 1300', '3313124383', 'ichis0915@kleitonzoo.com', 'jpgn9080fxk'),
(2, 'Dany Lemus', 'Av. Bahía de Acapulco 2790', '3313841114', 'dnxrl@kleitonzoo.com', 'jdrm2344lsk'),
(4, 'Armando Rueda', 'Av. Tlaquepaque 837', '4489290216', 'a7xrueda@kleitonzoo.com', 'jarj0980sdin');

CREATE TABLE `transporte` (
  `id` varchar(10) NOT NULL PRIMARY KEY,
  `descripcion` varchar(100) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `ejes` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `ancho` int(11) NOT NULL,
  `largo` int(11) NOT NULL,
  `alto` int(11) NOT NULL,
  `caja` enum('0','1') DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `transporte` (`id`, `descripcion`, `marca`, `ejes`, `capacidad`, `ancho`, `largo`, `alto`, `caja`) VALUES
('DGE688', 'Camioneta dodge 6 cilindros', 'Dodge', 5, 3500, 250, 150, 130, '1'),
('TYT688', 'Camioneta toyota 4 cilindros', 'Dodge', 5, 1783, 150, 250, 130, '1');

CREATE TABLE `partida` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `volumen` decimal(15,2) NOT NULL,
  `peso` decimal(15,2) NOT NULL,
  `material_id` varchar(10) NOT NULL,
  `piezas` int(11) NOT NULL,

  FOREIGN KEY (`material_id`)
    REFERENCES `material`(`id`)
    ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `conceptos` ( 
  `id` int(11) NOT NULL PRIMARY KEY, 
  `partida_id` int(11) NOT NULL, 
  `pedido_id` int(11) NOT NULL, 
    
  FOREIGN KEY (`partida_id`) 
    REFERENCES `partida`(`id`) 
    ON UPDATE CASCADE, 
    
  FOREIGN KEY (`pedido_id`) 
    REFERENCES `pedido`(`id`) 
    ON UPDATE CASCADE 
    
) ENGINE=InnoDB DEFAULT CHARSET=utf8

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `cliente_id` int(11) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `almacen_id` varchar(10) NOT NULL,
  `transporte_id` varchar(10),
  `fecha_solicitud` datetime NOT NULL,
  `fecha_envio` datetime NOT NULL,
  `fecha_entrega` datetime NOT NULL,
  `observaciones` longtext,

  FOREIGN KEY (`cliente_id`)
    REFERENCES `cliente`(`id`)
    ON UPDATE CASCADE,

  FOREIGN KEY (`almacen_id`)
    REFERENCES `almacen`(`id`)
    ON UPDATE CASCADE,

  FOREIGN KEY (`transporte_id`)
    REFERENCES `transporte`(`id`)
    ON UPDATE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

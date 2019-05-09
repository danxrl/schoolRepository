create database if not exists experto;

use experto;

create table atomos(
  id int(255) not null auto_increment,
  atomo varchar(255) not null,
  unique(`atomo`),
  constraint pk_atomo primary key (id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8;

create table reglas(
  id int(255) not null auto_increment,
  regla varchar(255) not null,
  consecuente int(255) not null,
  signo tinyint(1) default 1,
  constraint pk_regla primary key (id),
  constraint fk_regla_consecuente foreign key (consecuente) references atomos(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8;

create table atomos_reglas(
  idr varchar(255) not null,
  atomo_id int(255) not null,
  signo tinyint(1) default 1,
  constraint fk_atomo_regla foreign key (atomo_id) references atomos(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8;

INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Creatividad estetica');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Detalles');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Jugar imaginacion');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Arte');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Actividades imaginacion');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Originalidad');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Conflictos sociales');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Cultura');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Problemas Sociales');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Ciencias sociales');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Necesidades personales');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Participacion social');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Fenomenos naturales');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Universo');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Ciencias naturales');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Desastres naturales');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Laboratorio');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Buscas argumentos');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Riguroso');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Ciencias formales');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Concluir');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Enfermedades');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Conocimiento teorico');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Buscar soluciones');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Calculo mental');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Gusto matematico');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Matematica');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Uso de graficos');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Analizar hechos');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Logica');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Analizar leyes fisicas');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Resolver problemas');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Fisica');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Transformar energia');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Contruir robot');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Entender mecanismos');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Robotica');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Anatomia');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Biologia');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Comunicacion');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Manejar informacion');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Oficina');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Manipulacion escritorio');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Redactar informes');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Administracion');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Informacion');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Gestion');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Organizar');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Persuacion');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Liderazgo');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Plantear');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Descubrir fallas');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Uso instrumental');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Ingenieria computacion');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Computador');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Exactitud');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Messenger');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Ciencias de la computacion');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Equipo');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Lugares apropiados');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Observar construir');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Ingenieria de software');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Gustar construir');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Procesos');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Vestir formal');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Sistemas de informacion');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Programas rapidos');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Tecnologias de la informacion');
INSERT INTO `atomos`(`id`,`atomo`) VALUES (NULL,'Trabajar ya');
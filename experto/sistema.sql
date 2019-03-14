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
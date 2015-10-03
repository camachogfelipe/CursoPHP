/*
SQLyog Community v12.14 (64 bit)
MySQL - 5.6.25 : Database - directorio
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`directorio` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `directorio`;

/*Table structure for table `directorio` */

DROP TABLE IF EXISTS `directorio`;

CREATE TABLE `directorio` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pbx` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ciudad` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `identificacion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo_documento` enum('CC','NIT','RC','TI','CE','P','OTRO') COLLATE utf8_unicode_ci DEFAULT 'CC',
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `usuario_create` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_create` (`usuario_create`),
  CONSTRAINT `directorio_ibfk_1` FOREIGN KEY (`usuario_create`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `directorio` */

/*Table structure for table `grupos` */

DROP TABLE IF EXISTS `grupos`;

CREATE TABLE `grupos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'identificador',
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'nombre',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `grupos` */

insert  into `grupos`(`id`,`nombre`) values 
(1,'admin');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'identificador',
  `nombres` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'nombres',
  `apellidos` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'apellidos',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'email',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'contraseña',
  `grupo_id` int(10) unsigned NOT NULL COMMENT 'grupo al que pertenece',
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'fecha de creacion',
  `update_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `activo` enum('S','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N' COMMENT 'activo si o no',
  PRIMARY KEY (`id`),
  KEY `grupo_id` (`grupo_id`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`nombres`,`apellidos`,`email`,`password`,`grupo_id`,`create_date`,`update_date`,`activo`) values 
(1,'usuario','admin','admin@localhost','12345',1,'2015-09-12 11:52:21','2015-09-12 11:52:42','S');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

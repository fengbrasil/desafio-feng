# ************************************************************
# Sequel Pro SQL dump
# Versão 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: trilang.com (MySQL 5.6.41-84.1)
# Base de Dados: trila914_desafiofeng
# Tempo de Geração: 2018-11-23 16:36:01 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela tb_clients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_clients`;

CREATE TABLE `tb_clients` (
  `idclient` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `desclient` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `climail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cliphone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dt_register` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idclient`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `tb_clients` WRITE;
/*!40000 ALTER TABLE `tb_clients` DISABLE KEYS */;

INSERT INTO `tb_clients` (`idclient`, `desclient`, `climail`, `cliphone`, `dt_register`)
VALUES
	(1,'João da Silva','joao.silva@email.com','(21) 99999-9999','2018-11-23 14:27:06'),
	(2,'Matheus Andrade','matheus@email.com','(21) 7890-1234','2018-11-23 14:27:33'),
	(3,'Marco Moraes','marco@email.com','(21) 3245-7609','2018-11-23 14:27:59');

/*!40000 ALTER TABLE `tb_clients` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela tb_persons
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_persons`;

CREATE TABLE `tb_persons` (
  `idperson` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `desperson` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desocupation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desemail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desavatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dtregister` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idperson`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `tb_persons` WRITE;
/*!40000 ALTER TABLE `tb_persons` DISABLE KEYS */;

INSERT INTO `tb_persons` (`idperson`, `desperson`, `desocupation`, `desemail`, `desavatar`, `dtregister`)
VALUES
	(1,'Igor Bressan','Administrador','igorbressan@gmail.com','igor.jpg','2018-11-23 14:25:26'),
	(2,'Super Usuário','Super','igorbressan@gmail.com','default.png','2018-11-23 14:25:26');

/*!40000 ALTER TABLE `tb_persons` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela tb_products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_products`;

CREATE TABLE `tb_products` (
  `idproduct` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desproduct` text COLLATE utf8_unicode_ci,
  `vlprice` double(10,2) DEFAULT NULL,
  `dt_register` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idproduct`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `tb_products` WRITE;
/*!40000 ALTER TABLE `tb_products` DISABLE KEYS */;

INSERT INTO `tb_products` (`idproduct`, `product`, `desproduct`, `vlprice`, `dt_register`)
VALUES
	(1,'Combo 01','Cachorro Quente + Refrigerante',15.00,'2018-11-23 14:28:36'),
	(2,'Combo 02','Hamburguer + Fritas',20.00,'2018-11-23 14:28:56'),
	(3,'Refrigerante 350ml','Latinha de refrigerante 350ml',10.00,'2018-11-23 14:29:25'),
	(4,'Pipoca Grade','Balde de pipoca amanteigada',12.00,'2018-11-23 14:29:48');

/*!40000 ALTER TABLE `tb_products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela tb_requests
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_requests`;

CREATE TABLE `tb_requests` (
  `idrequest` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idclient` int(11) DEFAULT NULL,
  `dt_request` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idrequest`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `tb_requests` WRITE;
/*!40000 ALTER TABLE `tb_requests` DISABLE KEYS */;

INSERT INTO `tb_requests` (`idrequest`, `idclient`, `dt_request`)
VALUES
	(1,1,'2018-11-22 14:30:29'),
	(2,2,'2018-11-23 14:31:22'),
	(3,3,'2018-11-23 14:32:24');

/*!40000 ALTER TABLE `tb_requests` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela tb_requestsproducts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_requestsproducts`;

CREATE TABLE `tb_requestsproducts` (
  `idrequest` int(11) DEFAULT NULL,
  `idproduct` int(11) DEFAULT NULL,
  `nrqtd` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `tb_requestsproducts` WRITE;
/*!40000 ALTER TABLE `tb_requestsproducts` DISABLE KEYS */;

INSERT INTO `tb_requestsproducts` (`idrequest`, `idproduct`, `nrqtd`)
VALUES
	(1,1,3),
	(1,2,2),
	(2,1,10),
	(3,3,2),
	(3,4,1);

/*!40000 ALTER TABLE `tb_requestsproducts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela tb_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tb_users`;

CREATE TABLE `tb_users` (
  `iduser` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idperson` int(11) NOT NULL,
  `deslogin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `despassword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `accesslevel` int(11) DEFAULT NULL,
  `dtregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `tb_users` WRITE;
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;

INSERT INTO `tb_users` (`iduser`, `idperson`, `deslogin`, `despassword`, `accesslevel`, `dtregister`)
VALUES
	(1,1,'admin','$2y$12$eRfaKqUJ4nFUbSdXmc5vhOua1cGeZm.oH3iY0Ay1h0v2lte7nUyyW',1,'2017-09-17 12:29:32'),
	(2,2,'super','$2y$12$eRfaKqUJ4nFUbSdXmc5vhOua1cGeZm.oH3iY0Ay1h0v2lte7nUyyW',0,'2017-09-17 12:29:32');

/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

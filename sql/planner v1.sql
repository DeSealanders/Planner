/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.6.13 : Database - planner
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `itemid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `startDate` varchar(255) DEFAULT NULL,
  `endDate` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`itemid`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `events` */

insert  into `events`(`id`,`itemid`,`name`,`description`,`startDate`,`endDate`,`image`) values (1,'53d3ce902029f4.18777061','Bioscoop','Samen naar de film','27-07-2014 20:00','28-07-2014 20:00',''),(2,'53d3ce9027fa01.42127408','Trainen','Lekker ijzer tegen de zwaartekracht duwen','27-07-2014 14:00','27-07-2014 16:00',''),(3,'53d3ce902d5923.22312658','Dierentuin','Nee ik wil bowlen','27-07-2014 23:00','28-07-2014 00:00','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

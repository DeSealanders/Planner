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
  `startDate` timestamp NULL DEFAULT NULL,
  `endDate` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `userid` int(5) DEFAULT NULL,
  PRIMARY KEY (`itemid`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=609 DEFAULT CHARSET=latin1;

/*Data for the table `events` */

insert  into `events`(`id`,`itemid`,`name`,`description`,`startDate`,`endDate`,`image`,`userid`) values (1,'53d3ce902029f4.18777061','Bioscoop','Samen naar de film','2014-07-02 12:45:12','2014-07-29 12:45:12','',1),(2,'53d3ce9027fa01.42127408','Trainen','Lekker ijzer tegen de zwaartekracht duwen','2014-07-26 12:45:12','2014-07-28 12:45:12','',1),(3,'53d3ce902d5923.22312658','Dierentuin','Nee ik wil bowlen','2014-07-27 12:45:12','2014-08-28 12:45:12','',2),(589,'53da9919723e66.09612563','Taart eten','Samen gezellig de koelkast leegmaken','2014-07-28 12:00:00','2014-07-29 12:00:00','',2);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userid` int(5) NOT NULL AUTO_INCREMENT,
  `pagelink` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`userid`,`pagelink`,`username`,`password`,`firstname`,`lastname`,`email`) values (1,'abcdef','Baabah','admin','Peter','Ton','williewortel2003@hotmail.com'),(2,'qwerty','Myutd4life','1234','Jordi','Dekker','mail@jordidekker.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

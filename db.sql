/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.51-38.1-log : Database - flat_mate
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`flat_mate` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `flat_mate`;

/*Table structure for table `ads` */

DROP TABLE IF EXISTS `ads`;

CREATE TABLE `ads` (
  `AID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Title` varchar(250) DEFAULT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Cost` int(11) DEFAULT NULL,
  `Capacity` tinyint(4) DEFAULT NULL,
  `UID` bigint(20) DEFAULT '1',
  `PostedOn` datetime DEFAULT NULL,
  `Mobile` varchar(10) DEFAULT '0000000000',
  PRIMARY KEY (`AID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `ads` */

insert  into `ads`(`AID`,`Title`,`Address`,`City`,`Cost`,`Capacity`,`UID`,`PostedOn`,`Mobile`) values (1,'2 BHK Room Set','Samar Vihar Colony Alambagh LKO','Lucknow',5000,3,1,NULL,'6666666666'),(2,'1BHK Fully Furnished ROom For Students Only','Gomti Nagar','Lucknow',3500,2,2,NULL,'0000000000'),(3,'asda','samar vihar, alambagh, lko','Lucknow',100,2,3,'2021-04-18 22:20:24','0000000000'),(5,'Looking for RoomMate','208027','Kanpur',1500,1,39,'2021-05-10 12:45:51','0000000000'),(6,'Looking for Room','111111','Kanpur',5000,2,39,'2021-05-10 12:48:00','0000000000'),(7,'Room Chahiye','DEVENDRA KUMAR MISHRA,, VILL- BABHANAULI, POST-DAMARUA ,DISTT-JA','Kanpur',2500,2,38,'2021-05-12 10:06:47','0000000000');

/*Table structure for table `areas` */

DROP TABLE IF EXISTS `areas`;

CREATE TABLE `areas` (
  `AID` int(11) NOT NULL AUTO_INCREMENT,
  `AreaName` varchar(30) DEFAULT NULL,
  `City` varchar(30) DEFAULT 'Lucknow',
  PRIMARY KEY (`AID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `areas` */

insert  into `areas`(`AID`,`AreaName`,`City`) values (1,'Alambagh','Lucknow'),(2,'Hazratgunj','Lucknow'),(3,'Charbagh','Lucknow'),(4,'LDA','Lucknow'),(5,'Ashiayana','Lucknow'),(6,'Chinhat','Lucknow'),(7,'Gomtinagar','Lucknow'),(8,'Chowk','Lucknow');

/*Table structure for table `bookings` */

DROP TABLE IF EXISTS `bookings`;

CREATE TABLE `bookings` (
  `BID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT 'Unknown',
  `Mobile` varchar(10) DEFAULT NULL,
  `RoomsForBooking` int(11) DEFAULT '0',
  `HID` int(11) DEFAULT NULL,
  `UID` int(11) DEFAULT '1',
  `BookingDate` datetime DEFAULT NULL,
  PRIMARY KEY (`BID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `bookings` */

insert  into `bookings`(`BID`,`Name`,`Mobile`,`RoomsForBooking`,`HID`,`UID`,`BookingDate`) values (11,'new','9451712232',2,31,1,'2019-03-11 18:19:02');

/*Table structure for table `cities` */

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `CID` int(11) NOT NULL AUTO_INCREMENT,
  `CityName` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `cities` */

insert  into `cities`(`CID`,`CityName`) values (1,'Lucknow'),(2,'Kanpur'),(3,'Delhi'),(4,'Mumbai'),(5,'Jaipur');

/*Table structure for table `feedbacks` */

DROP TABLE IF EXISTS `feedbacks`;

CREATE TABLE `feedbacks` (
  `FID` int(11) NOT NULL AUTO_INCREMENT,
  `Feedback` varchar(2000) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Mobile` varchar(15) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`FID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `feedbacks` */

insert  into `feedbacks`(`FID`,`Feedback`,`Name`,`Mobile`,`Email`,`CreatedOn`) values (1,'asdasdasdasdasd','hello',NULL,'hello@gmail.com','2018-03-26 22:44:26'),(2,'asd asd asd asd ','hello',NULL,'mohit.xxx@gmail.com','2018-03-26 22:55:27');

/*Table structure for table `interests` */

DROP TABLE IF EXISTS `interests`;

CREATE TABLE `interests` (
  `IID` bigint(20) NOT NULL AUTO_INCREMENT,
  `UID` bigint(20) DEFAULT '1',
  `AID` bigint(20) DEFAULT '1',
  `AddedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`IID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `interests` */

insert  into `interests`(`IID`,`UID`,`AID`,`AddedOn`) values (1,1,1,'2021-04-23 08:33:44'),(2,1,3,'2021-04-20 08:38:26'),(3,1,1,'2021-05-08 20:16:42'),(4,1,1,'2021-05-08 20:27:02'),(5,1,1,'2021-05-08 20:42:07'),(8,39,1,'2021-05-10 12:48:39'),(10,1,6,'2021-10-16 19:42:24');

/*Table structure for table `locations` */

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `LID` int(11) NOT NULL AUTO_INCREMENT,
  `LocationName` varchar(50) DEFAULT NULL,
  `Rent` int(11) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Area` varchar(30) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `Country` varchar(30) DEFAULT NULL,
  `Type` varchar(20) DEFAULT 'hotel',
  `Contact` varchar(30) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`LID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `locations` */

insert  into `locations`(`LID`,`LocationName`,`Rent`,`Rating`,`Area`,`City`,`Country`,`Type`,`Contact`,`Address`,`Description`) values (1,'Hotel1',1000,3,'Alambagh','Lucknow','India','hotel',NULL,'NAka CrossRoad, Near Railway Station, Charbagh',NULL),(2,'Hotel2',1500,4,'Ashiyana','New York','USA','home',NULL,' Address usa  Address usa  Address usa  Address usa  Address usa  Address usa  Address usa ',NULL),(3,'CMS',1200,3,'LDA','Beijing','China','School',NULL,'Address China Address China Address China Address China ',NULL),(4,'Charbagh Railway Station',0,2,'Charbagh','Lucknow','Intia','RailwayStation',NULL,'Lucknow CharbaghLucknow CharbaghLucknow CharbaghLucknow Charbagh',NULL),(5,'Airport',0,0,'Amousi','Lucknow','india','Airport',NULL,'lucknow Amousi lucknow Amousi lucknow Amousi lucknow Amousi lucknow Amousi ',NULL),(6,'Imambada',0,0,'Chowk','Lucknow','India','Monument',NULL,'Lucknow ChowkLucknow ChowkLucknow ChowkLucknow ChowkLucknow Chowk',NULL),(7,'Tunday',0,0,'Chowk','Lucknow','India','Restaurant',NULL,'Lucknow Aminabad Lucknow Aminabad Lucknow Aminabad Lucknow Aminabad ',NULL),(8,'Sahara Hospital',999,9,'Gomtinagar','Lucknow','india','Hospital',NULL,'Lucknow Gomtinagar Lucknow Gomtinagar Lucknow Gomtinagar Lucknow Gomtinagar ',NULL),(9,'Taz Hotel',NULL,NULL,'Gomtinagar',NULL,NULL,'Hotel','9988776262','Gomti nagar near 1090 choraha',NULL),(16,'La Martinier',NULL,NULL,'Gomtinagar',NULL,NULL,'School','hello','Near 1090 Choraha',NULL),(17,'',NULL,NULL,'',NULL,NULL,'3 Star','8877445566','samar vihar',NULL),(18,'',NULL,NULL,'',NULL,NULL,'5 Star','9988776655','Gomtinagar',NULL),(19,'',NULL,NULL,'',NULL,NULL,'3 Star','9988776655','hello',NULL);

/*Table structure for table `photos` */

DROP TABLE IF EXISTS `photos`;

CREATE TABLE `photos` (
  `PID` bigint(20) NOT NULL AUTO_INCREMENT,
  `FileName` varchar(25) DEFAULT NULL,
  `HID` bigint(20) DEFAULT '1',
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `photos` */

/*Table structure for table `rooms` */

DROP TABLE IF EXISTS `rooms`;

CREATE TABLE `rooms` (
  `RID` int(11) NOT NULL AUTO_INCREMENT,
  `Capacity` tinyint(4) DEFAULT NULL,
  `Type` varchar(20) DEFAULT 'Normal',
  `Rent` int(11) DEFAULT '1000',
  `UID` int(11) DEFAULT '1',
  `RoomCount` tinyint(4) DEFAULT '5',
  `Availability` tinyint(4) DEFAULT '0',
  `Description` varchar(1000) DEFAULT 'No Description',
  `HID` bigint(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`RID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `rooms` */

insert  into `rooms`(`RID`,`Capacity`,`Type`,`Rent`,`UID`,`RoomCount`,`Availability`,`Description`,`HID`) values (1,2,'Normal',1000,1,5,0,'No Description',1),(2,2,'Delux',2500,1,5,0,'No Description',1),(3,2,'Gold',3000,1,6,0,'No Description',1),(4,3,'Normal',1500,2,9,0,'No Description',1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) DEFAULT NULL,
  `HotelName` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `PWD` varchar(20) DEFAULT NULL,
  `Area` varchar(30) DEFAULT NULL,
  `Mobile` varchar(15) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Status` varchar(10) DEFAULT 'Pending',
  `UserType` varchar(10) DEFAULT 'User',
  `Location` varchar(30) DEFAULT 'Not Set',
  `City` varchar(20) DEFAULT NULL,
  `Description` varchar(1000) DEFAULT 'No Description',
  `Gender` varchar(6) DEFAULT 'M',
  `Contribution` int(11) DEFAULT '0',
  `Hobbies` varchar(100) DEFAULT NULL,
  `CreatedOn` datetime DEFAULT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`UID`,`UserName`,`HotelName`,`Email`,`PWD`,`Area`,`Mobile`,`Address`,`Status`,`UserType`,`Location`,`City`,`Description`,`Gender`,`Contribution`,`Hobbies`,`CreatedOn`) values (1,'Sanidhya',NULL,'admin@gmail.com','aa',NULL,'988776687','Address Address Address Address Address Address 226005','Active','Owner','Not Set','Delhi','No Description','M',5000,'Studious,NightOwl,FitnessFreak',NULL),(2,'Rishi Sharma',NULL,'rishi@gmail.com','aa',NULL,'7007502987',NULL,'Pending','HotelOwner','Not Set','Lucknow','No Description','F',0,'NightOwl,Wanderer,PetLover',NULL),(3,'ffff',NULL,NULL,'sam2964',NULL,'9598188554',NULL,'Pending','HotelOwner','Not Set','Kanpur','No Description','M',0,'FitnessFreak,Wanderer,PartyLover,Vagen,PetLover,NonAlchoholic,MusicLover,Smoker',NULL),(4,'Harsh',NULL,'43harsh@gmail.com','password',NULL,'7007907355',NULL,'Pending','HotelOwner','Not Set','Lucknow','No Description','M',0,'NightOwl,FitnessFreak,Wanderer,PartyLover,PetLover,MusicLover,Smoker',NULL),(5,'Jagriti',NULL,NULL,'password',NULL,'2222222222',NULL,'Pending','User','Not Set','Lucknow','No Description','F',0,'FitnessFreak,NonSmoker',NULL),(34,'Lucknow Hostals','Lucknow Hostals','hostal@gmail.com','aa','Alambagh','7599339273','f-61 Samar Vihar Colony Alamnagh, Lucknow , 226005','Pending','Owner','Not Set','Lucknow','No Description','F',0,NULL,NULL),(36,'user',NULL,'user@gmail.com','aa',NULL,'8787878787','this is address','Pending','User','Not Set','null','No Description','M',3000,'Studious,Pet Owner,Alchoholic','2021-05-01 12:26:36'),(37,'test',NULL,'test@gmail.com','aa',NULL,'9044580971','address laxmi vihar new delhi','Pending','User','Not Set','Delhi','No Description','M',7000,'Studious,LateNight,MusicLover,PetLover','2021-05-08 09:25:42'),(38,'Devendra Mishra',NULL,'devendramishra17@gmail.com','qwerty',NULL,'9598164341','Delhi','Pending','User','Not Set','Delhi','No Description','M',2500,'Studious,Party Animal,Pet Owner,Music Lover','2021-05-07 21:53:48'),(39,'Aman Sachan',NULL,'aman.sachan.909@gmail.com','aman12345',NULL,'8808815628','208027','Pending','User','Not Set','Kanpur','No Description','M',1500,'Studious,Late Night,Music Lover,Party Animal','2021-05-10 12:43:34'),(40,'Aman Shekhar Sachan',NULL,'amansachan912@gmail.com','Aman@123',NULL,'7905086731','null','Pending','User','Not Set','Kanpur','No Description','M',0,'Studious,Late Night,Smoking,Alchoholic','2021-05-13 08:38:53'),(41,'Devendra Kumar Mishra',NULL,'ankitm701@gmail.com','1234',NULL,'9816898989',NULL,'Pending','User','Not Set',NULL,'No Description','M',0,NULL,'2021-12-30 22:07:33');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

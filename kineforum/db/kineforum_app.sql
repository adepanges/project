/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.1.10-MariaDB : Database - project_kineforum
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `data_program` */

DROP TABLE IF EXISTS `data_program`;

CREATE TABLE `data_program` (
  `PROGRAM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MEMBER_ID` int(11) DEFAULT '1',
  `PROGRAM` varchar(500) DEFAULT NULL,
  `KETERANGAN` text,
  `DATE_MULAI` date DEFAULT NULL,
  `DATE_SELESAI` date DEFAULT NULL,
  `STATUS` int(11) DEFAULT '1',
  PRIMARY KEY (`PROGRAM_ID`),
  KEY `FK_REFERENCE_18` (`MEMBER_ID`),
  CONSTRAINT `FK_REFERENCE_18` FOREIGN KEY (`MEMBER_ID`) REFERENCES `member` (`MEMBER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `data_program` */

insert  into `data_program`(`PROGRAM_ID`,`MEMBER_ID`,`PROGRAM`,`KETERANGAN`,`DATE_MULAI`,`DATE_SELESAI`,`STATUS`) values (1,1,'Best of the Best','','2016-08-01','2016-11-30',1),(3,1,'Pejuang pada Masa Soekarno','','2016-08-01','2016-08-31',1),(6,1,'People’s Champ','','2016-10-11','2016-10-27',1),(7,1,'ReelOzInd!','','2016-10-17','2016-10-28',1);

/*Table structure for table `data_slot` */

DROP TABLE IF EXISTS `data_slot`;

CREATE TABLE `data_slot` (
  `SLOT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PROGRAM_ID` int(11) DEFAULT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`SLOT_ID`),
  KEY `FK_REFERENCE_15` (`PROGRAM_ID`),
  CONSTRAINT `FK_REFERENCE_15` FOREIGN KEY (`PROGRAM_ID`) REFERENCES `data_program` (`PROGRAM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `data_slot` */

insert  into `data_slot`(`SLOT_ID`,`PROGRAM_ID`,`NAMA`,`STATUS`) values (1,1,'Slot 1',NULL);

/*Table structure for table `data_slot_film` */

DROP TABLE IF EXISTS `data_slot_film`;

CREATE TABLE `data_slot_film` (
  `SLOT_FILM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SLOT_ID` int(11) DEFAULT NULL,
  `FILM_ID` int(11) NOT NULL,
  `NOURUT` int(11) DEFAULT '1',
  PRIMARY KEY (`SLOT_FILM_ID`),
  KEY `FILM_ID` (`FILM_ID`),
  KEY `SLOT_ID` (`SLOT_ID`),
  CONSTRAINT `data_slot_film_ibfk_1` FOREIGN KEY (`FILM_ID`) REFERENCES `master_film` (`FILM_ID`),
  CONSTRAINT `data_slot_film_ibfk_2` FOREIGN KEY (`SLOT_ID`) REFERENCES `data_slot` (`SLOT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `data_slot_film` */

/*Table structure for table `galeri` */

DROP TABLE IF EXISTS `galeri`;

CREATE TABLE `galeri` (
  `GALERI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PARENT_ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) DEFAULT NULL,
  `FILE_NAME` text,
  `SIZE` int(11) DEFAULT NULL,
  `TYPE` int(11) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`GALERI_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `galeri` */

/*Table structure for table `kineforum` */

DROP TABLE IF EXISTS `kineforum`;

CREATE TABLE `kineforum` (
  `KINEFORUM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(255) DEFAULT NULL,
  `LOKASI` varchar(255) DEFAULT NULL,
  `ALAMAT` text,
  `TELEPON` varchar(100) DEFAULT NULL,
  `KORDINAT` varchar(255) DEFAULT NULL,
  `USE_CAPTCHA` int(11) DEFAULT NULL,
  `USE_AKTIVASI_PENONTON` int(11) DEFAULT NULL,
  `LIMIT_LOGIN` int(11) DEFAULT NULL,
  PRIMARY KEY (`KINEFORUM_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kineforum` */

/*Table structure for table `log` */

DROP TABLE IF EXISTS `log`;

CREATE TABLE `log` (
  `LOG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MEMBER_ID` int(11) DEFAULT NULL,
  `KETERANGAN` text,
  `TIME` datetime DEFAULT NULL,
  PRIMARY KEY (`LOG_ID`),
  KEY `FK_REFERENCE_20` (`MEMBER_ID`),
  CONSTRAINT `FK_REFERENCE_20` FOREIGN KEY (`MEMBER_ID`) REFERENCES `member` (`MEMBER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `log` */

/*Table structure for table `master_domisili` */

DROP TABLE IF EXISTS `master_domisili`;

CREATE TABLE `master_domisili` (
  `DOMISILI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DOMISILI` int(11) DEFAULT NULL,
  `KETERANGAN` text,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`DOMISILI_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `master_domisili` */

/*Table structure for table `master_film` */

DROP TABLE IF EXISTS `master_film`;

CREATE TABLE `master_film` (
  `FILM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `JENIS_FILM_ID` int(11) DEFAULT NULL,
  `FORMAT_ID` int(11) DEFAULT NULL,
  `KLASIFIKASI_ID` int(11) DEFAULT NULL,
  `JUDUL` varchar(255) DEFAULT NULL,
  `SUTRADARA` varchar(255) DEFAULT NULL,
  `DURASI` int(11) DEFAULT NULL,
  `TAHUN` int(11) DEFAULT NULL,
  `PRODUSER` varchar(255) DEFAULT NULL,
  `RUMAH_PRODUKSI` varchar(255) DEFAULT NULL,
  `SINOPSIS` text,
  `KETERANGAN` text,
  `POSTER` text,
  `NEGARA` varchar(255) DEFAULT NULL,
  `BAHASA` varchar(255) DEFAULT NULL,
  `SUBTEKS` varchar(255) DEFAULT NULL,
  `KONTAK_EMAIL` varchar(255) DEFAULT NULL,
  `KONTAK_HP` varchar(255) DEFAULT NULL,
  `KONTAK_ALAMAT` varchar(500) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`FILM_ID`),
  KEY `FK_REFERENCE_6` (`JENIS_FILM_ID`),
  KEY `FK_REFERENCE_7` (`FORMAT_ID`),
  KEY `KLASIFIKASI_ID` (`KLASIFIKASI_ID`),
  CONSTRAINT `FK_REFERENCE_6` FOREIGN KEY (`JENIS_FILM_ID`) REFERENCES `master_jenis_film` (`JENIS_FILM_ID`),
  CONSTRAINT `FK_REFERENCE_7` FOREIGN KEY (`FORMAT_ID`) REFERENCES `master_format` (`FORMAT_ID`),
  CONSTRAINT `master_film_ibfk_1` FOREIGN KEY (`KLASIFIKASI_ID`) REFERENCES `master_klasifikasi_usia` (`KLASIFIKASI_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `master_film` */

insert  into `master_film`(`FILM_ID`,`JENIS_FILM_ID`,`FORMAT_ID`,`KLASIFIKASI_ID`,`JUDUL`,`SUTRADARA`,`DURASI`,`TAHUN`,`PRODUSER`,`RUMAH_PRODUKSI`,`SINOPSIS`,`KETERANGAN`,`POSTER`,`NEGARA`,`BAHASA`,`SUBTEKS`,`KONTAK_EMAIL`,`KONTAK_HP`,`KONTAK_ALAMAT`,`STATUS`) values (3,1,1,NULL,'Please Vote for Me','Weijun Chen',58,0,'','','','','','','','','','','',0),(4,1,1,NULL,'Bully','Lee Hirsch',98,0,'','','','','','','','','','','',0),(5,2,2,NULL,'Petualangan Sherina','Riri Riza',123,1999,'','','','','','','','','','','',0),(6,2,2,NULL,'Sang Penari','Ifa Isfansyah',109,2011,'','','','','','','','','','','',0),(7,2,1,NULL,'Senyum di Pagi Bulan Desember','Wim Umboh',99,1974,'','','','','','','','','','','',0),(8,2,2,NULL,'Quickie Express','Dimas Djayadiningrat',124,2007,'','','','','','','','','','','',0),(9,2,2,NULL,'Garasi','Agung Sentausa',113,2005,'','','','','','','','','','','',0),(10,2,1,NULL,'Jermal','Ravi Bharwani, Rayya Makarim & Orlow Seunke',92,2008,'','','','','','','','','','','',0),(11,2,2,NULL,'Gadis Marathon','Chaerul Umam',106,1981,'','','','','','','','','','','',0),(12,1,1,NULL,'Gayby Baby','Maya Newell',85,2015,'','','','','','','','','','','',0),(13,2,1,NULL,'Opor Operan','Mustafa',15,2015,'','','','','','','','','','','',0),(14,2,1,NULL,'Pileleuyan','Muhammad Razny Mahardika',16,2015,'','','','','','','','','','','',0),(15,1,1,NULL,'Free as a Bird','Dessy Darmayanti',8,2015,'','','','','','','','','','','',0),(16,2,1,NULL,'Batas Akhir','Yudi Kriswanto',15,2015,'','','','','','','','','','','',0),(17,2,1,NULL,'Bandung Survivor','Prama Yodha',15,2014,'','','','','','','','','','','',0);

/*Table structure for table `master_format` */

DROP TABLE IF EXISTS `master_format`;

CREATE TABLE `master_format` (
  `FORMAT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(255) DEFAULT NULL,
  `KETERANGAN` text,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`FORMAT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `master_format` */

insert  into `master_format`(`FORMAT_ID`,`NAMA`,`KETERANGAN`,`STATUS`) values (1,'Digital','',1),(2,'35 mm','',1),(3,'16MM','',1),(4,'8MM','',1);

/*Table structure for table `master_jadwal` */

DROP TABLE IF EXISTS `master_jadwal`;

CREATE TABLE `master_jadwal` (
  `JADWAL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `STUDIO_ID` int(11) DEFAULT NULL,
  `MEMBER_ID` int(11) DEFAULT NULL,
  `SLOT_FILM_ID` int(11) DEFAULT NULL,
  `TIME_MULAI` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TIME_SELESAI` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `POSTER` text,
  `KETERANGAN` text,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`JADWAL_ID`),
  KEY `FK_REFERENCE_19` (`MEMBER_ID`),
  KEY `FK_REFERENCE_23` (`SLOT_FILM_ID`),
  KEY `FK_REFERENCE_5` (`STUDIO_ID`),
  CONSTRAINT `FK_REFERENCE_19` FOREIGN KEY (`MEMBER_ID`) REFERENCES `member` (`MEMBER_ID`),
  CONSTRAINT `FK_REFERENCE_5` FOREIGN KEY (`STUDIO_ID`) REFERENCES `master_studio` (`STUDIO_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `master_jadwal` */

/*Table structure for table `master_jenis_film` */

DROP TABLE IF EXISTS `master_jenis_film`;

CREATE TABLE `master_jenis_film` (
  `JENIS_FILM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(255) DEFAULT NULL,
  `KETERANGAN` text,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`JENIS_FILM_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `master_jenis_film` */

insert  into `master_jenis_film`(`JENIS_FILM_ID`,`NAMA`,`KETERANGAN`,`STATUS`) values (1,'Dokumenter','',1),(2,'Fiksi','',1),(3,'Lainnya','',1);

/*Table structure for table `master_kapasitas` */

DROP TABLE IF EXISTS `master_kapasitas`;

CREATE TABLE `master_kapasitas` (
  `KAPASITAS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(255) DEFAULT NULL,
  `KAPASITAS` int(11) DEFAULT NULL,
  `KETERANGAN` text,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`KAPASITAS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `master_kapasitas` */

/*Table structure for table `master_klasifikasi_usia` */

DROP TABLE IF EXISTS `master_klasifikasi_usia`;

CREATE TABLE `master_klasifikasi_usia` (
  `KLASIFIKASI_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(255) DEFAULT NULL,
  `USIA_MIN` int(11) DEFAULT '0',
  `USIA_MAX` int(11) DEFAULT '0',
  `STATUS` int(11) DEFAULT '1',
  PRIMARY KEY (`KLASIFIKASI_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `master_klasifikasi_usia` */

/*Table structure for table `master_media_sosial` */

DROP TABLE IF EXISTS `master_media_sosial`;

CREATE TABLE `master_media_sosial` (
  `MEDIA_SOSIAL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MEDIA` varchar(255) DEFAULT NULL,
  `KETERANGAN` text,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`MEDIA_SOSIAL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `master_media_sosial` */

/*Table structure for table `master_studio` */

DROP TABLE IF EXISTS `master_studio`;

CREATE TABLE `master_studio` (
  `STUDIO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KAPASITAS_ID` int(11) DEFAULT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `KETERANGAN` text,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`STUDIO_ID`),
  KEY `FK_REFERENCE_2` (`KAPASITAS_ID`),
  CONSTRAINT `FK_REFERENCE_2` FOREIGN KEY (`KAPASITAS_ID`) REFERENCES `master_kapasitas` (`KAPASITAS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `master_studio` */

/*Table structure for table `member` */

DROP TABLE IF EXISTS `member`;

CREATE TABLE `member` (
  `MEMBER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `usergroup_id` int(11) DEFAULT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `JENIS_KELAMIN` varchar(1) DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(255) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `ALAMAT` varchar(500) DEFAULT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`MEMBER_ID`),
  KEY `FK_usergroup_to_member` (`usergroup_id`),
  CONSTRAINT `FK_usergroup_to_member` FOREIGN KEY (`usergroup_id`) REFERENCES `rbac_modul_usergroup` (`usergroup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `member` */

insert  into `member`(`MEMBER_ID`,`usergroup_id`,`NAMA`,`JENIS_KELAMIN`,`TEMPAT_LAHIR`,`TANGGAL_LAHIR`,`EMAIL`,`ALAMAT`,`USERNAME`,`PASSWORD`,`STATUS`) values (1,1,'Administrator','L','Banjarnegara','1996-10-27','adepanges@gmail.com',NULL,'adepanges','a',NULL);

/*Table structure for table `member_kineforum` */

DROP TABLE IF EXISTS `member_kineforum`;

CREATE TABLE `member_kineforum` (
  `MEMBER_KINE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DOMISILI_ID` int(11) DEFAULT NULL,
  `NAMA` varchar(255) DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(255) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `INSTITUSI` varchar(255) DEFAULT NULL,
  `TIME_REGISTER` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `TOKEN` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`MEMBER_KINE_ID`),
  KEY `FK_REFERENCE_21` (`DOMISILI_ID`),
  CONSTRAINT `FK_REFERENCE_21` FOREIGN KEY (`DOMISILI_ID`) REFERENCES `master_domisili` (`DOMISILI_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `member_kineforum` */

/*Table structure for table `rbac_modul` */

DROP TABLE IF EXISTS `rbac_modul`;

CREATE TABLE `rbac_modul` (
  `modul_id` int(11) NOT NULL AUTO_INCREMENT,
  `modul_name` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `data` text,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`modul_id`),
  UNIQUE KEY `nama_modul` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `rbac_modul` */

insert  into `rbac_modul`(`modul_id`,`modul_name`,`nama`,`data`,`status`) values (1,'App Kine','Sistem Manajemen Kineforum','',1);

/*Table structure for table `rbac_modul_fitur` */

DROP TABLE IF EXISTS `rbac_modul_fitur`;

CREATE TABLE `rbac_modul_fitur` (
  `fitur_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `fitur_name` varchar(100) NOT NULL,
  `fitur` varchar(100) NOT NULL,
  `is_menu` tinyint(1) DEFAULT '0',
  `data` text,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fitur_id`),
  UNIQUE KEY `fitur_name_unique` (`fitur_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `rbac_modul_fitur` */

insert  into `rbac_modul_fitur`(`fitur_id`,`menu_id`,`fitur_name`,`fitur`,`is_menu`,`data`,`status`) values (1,2,'view_master_film','view_master_film',1,'',1),(2,2,'add_master_film','add_master_film',NULL,'',1),(3,2,'upd_master_film','upd_master_film',NULL,'',1),(4,2,'del_master_film','del_master_film',NULL,'',1);

/*Table structure for table `rbac_modul_menu` */

DROP TABLE IF EXISTS `rbac_modul_menu`;

CREATE TABLE `rbac_modul_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `modul_id` int(11) NOT NULL DEFAULT '0',
  `menu` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `rbac_modul_menu` */

insert  into `rbac_modul_menu`(`menu_id`,`modul_id`,`menu`,`link`,`icon`,`parent_id`,`status`) values (1,1,'Master','master','fa-archive',0,1),(2,1,'Film','#','film',1,1),(3,1,'Data Film','master/film/app','film',2,1),(4,1,'Data Format','master/film/format','format',2,1),(5,1,'Data Jenis Film','master/film/jenis','jenis',2,1),(6,1,'Program','master/program/app','program',1,1);

/*Table structure for table `rbac_modul_usergroup` */

DROP TABLE IF EXISTS `rbac_modul_usergroup`;

CREATE TABLE `rbac_modul_usergroup` (
  `usergroup_id` int(11) NOT NULL AUTO_INCREMENT,
  `modul_id` int(11) NOT NULL,
  `usergroup` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`usergroup_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `rbac_modul_usergroup` */

insert  into `rbac_modul_usergroup`(`usergroup_id`,`modul_id`,`usergroup`,`data`,`status`) values (1,1,'Administrator','',1);

/*Table structure for table `rbac_modul_usergroup_akses` */

DROP TABLE IF EXISTS `rbac_modul_usergroup_akses`;

CREATE TABLE `rbac_modul_usergroup_akses` (
  `usergroup_id` int(11) NOT NULL,
  `fitur_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rbac_modul_usergroup_akses` */

/*Table structure for table `rbac_user` */

DROP TABLE IF EXISTS `rbac_user`;

CREATE TABLE `rbac_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rbac_user` */

/*Table structure for table `rbac_user_akses` */

DROP TABLE IF EXISTS `rbac_user_akses`;

CREATE TABLE `rbac_user_akses` (
  `akses_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `modul_id` int(11) NOT NULL,
  `usergroup_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`akses_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `rbac_user_akses` */

/*Table structure for table `t_booking_seat` */

DROP TABLE IF EXISTS `t_booking_seat`;

CREATE TABLE `t_booking_seat` (
  `BOOKING_ID` int(11) NOT NULL AUTO_INCREMENT,
  `JADWAL_ID` int(11) DEFAULT NULL,
  `MEDIA_SOSIAL_ID` int(11) DEFAULT NULL,
  `KINE_ID` int(11) DEFAULT NULL,
  `TIME_BOOK` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`BOOKING_ID`),
  KEY `FK_REFERENCE_22` (`MEDIA_SOSIAL_ID`),
  KEY `FK_REFERENCE_24` (`KINE_ID`),
  KEY `FK_REFERENCE_9` (`JADWAL_ID`),
  CONSTRAINT `FK_REFERENCE_22` FOREIGN KEY (`MEDIA_SOSIAL_ID`) REFERENCES `master_media_sosial` (`MEDIA_SOSIAL_ID`),
  CONSTRAINT `FK_REFERENCE_24` FOREIGN KEY (`KINE_ID`) REFERENCES `member_kineforum` (`MEMBER_KINE_ID`),
  CONSTRAINT `FK_REFERENCE_9` FOREIGN KEY (`JADWAL_ID`) REFERENCES `master_jadwal` (`JADWAL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_booking_seat` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

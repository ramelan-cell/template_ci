/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.3.16-MariaDB : Database - template_ci
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`template_ci` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `template_ci`;

/*Table structure for table `prm_master_area` */

DROP TABLE IF EXISTS `prm_master_area`;

CREATE TABLE `prm_master_area` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `nama_area` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `prm_master_area` */

insert  into `prm_master_area`(`id_area`,`nama_area`) values (1,'JAKARTA');

/*Table structure for table `prm_master_divisi` */

DROP TABLE IF EXISTS `prm_master_divisi`;

CREATE TABLE `prm_master_divisi` (
  `id_divisi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_divisi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `prm_master_divisi` */

insert  into `prm_master_divisi`(`id_divisi`,`nama_divisi`) values (1,'IT'),(2,'AO');

/*Table structure for table `prm_master_group_menu` */

DROP TABLE IF EXISTS `prm_master_group_menu`;

CREATE TABLE `prm_master_group_menu` (
  `id_group_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_group_menu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_group_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `prm_master_group_menu` */

insert  into `prm_master_group_menu`(`id_group_menu`,`nama_group_menu`) values (1,'PUSAT');

/*Table structure for table `prm_master_jabatan` */

DROP TABLE IF EXISTS `prm_master_jabatan`;

CREATE TABLE `prm_master_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `prm_master_jabatan` */

insert  into `prm_master_jabatan`(`id_jabatan`,`nama_jabatan`) values (1,'STAFF IT');

/*Table structure for table `prm_master_kantor` */

DROP TABLE IF EXISTS `prm_master_kantor`;

CREATE TABLE `prm_master_kantor` (
  `id_kantor` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kantor` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_kantor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `prm_master_kantor` */

insert  into `prm_master_kantor`(`id_kantor`,`nama_kantor`) values (1,'PT BPR XXX');

/*Table structure for table `prm_master_karyawan` */

DROP TABLE IF EXISTS `prm_master_karyawan`;

CREATE TABLE `prm_master_karyawan` (
  `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(10) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `prm_master_karyawan` */

insert  into `prm_master_karyawan`(`id_karyawan`,`nik`,`nama_lengkap`) values (1,'12345','RAMELAN EKO PAMUJI');

/*Table structure for table `prm_master_menu_aplikasi` */

DROP TABLE IF EXISTS `prm_master_menu_aplikasi`;

CREATE TABLE `prm_master_menu_aplikasi` (
  `id_menu_aplikasi` int(11) NOT NULL AUTO_INCREMENT,
  `menu_aplikasi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_menu_aplikasi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `prm_master_menu_aplikasi` */

insert  into `prm_master_menu_aplikasi`(`id_menu_aplikasi`,`menu_aplikasi`) values (1,'CORE BIZ');

/*Table structure for table `prm_menu_access_mitra` */

DROP TABLE IF EXISTS `prm_menu_access_mitra`;

CREATE TABLE `prm_menu_access_mitra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(11) DEFAULT NULL,
  `id_group_menu` text DEFAULT NULL,
  `id_menu` text DEFAULT NULL,
  `divisi_id` varchar(30) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `created_time` time DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `updated_time` time DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

/*Data for the table `prm_menu_access_mitra` */

insert  into `prm_menu_access_mitra`(`id`,`user_id`,`id_group_menu`,`id_menu`,`divisi_id`,`jabatan`,`created_date`,`created_time`,`created_by`,`updated_date`,`updated_time`,`updated_by`) values (1,'1','1','1,2,173,175','1','1',NULL,NULL,NULL,'2020-04-27','20:08:40',1);

/*Table structure for table `prm_menu_group_mitra` */

DROP TABLE IF EXISTS `prm_menu_group_mitra`;

CREATE TABLE `prm_menu_group_mitra` (
  `id_group_menu` int(11) NOT NULL AUTO_INCREMENT,
  `versi` int(11) DEFAULT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `id_menu_aplikasi` int(11) DEFAULT NULL,
  `font_icon` char(100) DEFAULT NULL,
  `nama_group_menu` varchar(100) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `flag_aktif` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`id_group_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

/*Data for the table `prm_menu_group_mitra` */

insert  into `prm_menu_group_mitra`(`id_group_menu`,`versi`,`no_urut`,`id_menu_aplikasi`,`font_icon`,`nama_group_menu`,`created_date`,`created_by`,`updated_date`,`updated_by`,`deleted_date`,`deleted_by`,`flag_aktif`) values (1,1,1,1,'glyphicon glyphicon-cog','Pengaturan',NULL,NULL,NULL,NULL,NULL,NULL,'1');

/*Table structure for table `prm_menu_mitra` */

DROP TABLE IF EXISTS `prm_menu_mitra`;

CREATE TABLE `prm_menu_mitra` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `no_urut` int(11) DEFAULT NULL,
  `id_group_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `font_icon` varchar(100) DEFAULT NULL,
  `controler` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_date` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `flag_aktif` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=latin1;

/*Data for the table `prm_menu_mitra` */

insert  into `prm_menu_mitra`(`id_menu`,`no_urut`,`id_group_menu`,`nama_menu`,`font_icon`,`controler`,`created_date`,`created_by`,`updated_date`,`updated_by`,`deleted_date`,`deleted_by`,`flag_aktif`) values (1,1,1,'User','glyphicon glyphicon-cog','setting/setting_akses_menu',NULL,NULL,NULL,NULL,NULL,NULL,'1'),(2,2,1,'Template','glyphicon glyphicon-cog','setting/setting_warna',NULL,NULL,NULL,NULL,NULL,NULL,'1'),(173,3,1,'Menu','glyphicon glyphicon-cog','setting/setting_menu',NULL,NULL,NULL,NULL,NULL,NULL,'1'),(175,1,1,'Divisi','glyphicon glyphicon-cog','setting/setting_divisi','2020-04-27 13:13:15',1,NULL,NULL,NULL,NULL,'1');

/*Table structure for table `prm_setting_warna` */

DROP TABLE IF EXISTS `prm_setting_warna`;

CREATE TABLE `prm_setting_warna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `warna` varchar(100) DEFAULT NULL,
  `menu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `prm_setting_warna` */

insert  into `prm_setting_warna`(`id`,`user_id`,`warna`,`menu`) values (1,NULL,'#ee7c1c','atas'),(5,1,'#ff0000','samping');

/*Table structure for table `prm_user` */

DROP TABLE IF EXISTS `prm_user`;

CREATE TABLE `prm_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nik` int(11) DEFAULT NULL,
  `kode_kantor` varchar(5) DEFAULT NULL,
  `id_divisi` int(11) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `user_id_induk` int(11) DEFAULT NULL,
  `id_group_menu` int(11) DEFAULT NULL,
  `id_area` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `flg_block` int(11) DEFAULT 0,
  `tgl_expired` date DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `prm_user` */

insert  into `prm_user`(`user_id`,`user_name`,`password`,`nik`,`kode_kantor`,`id_divisi`,`id_jabatan`,`user_id_induk`,`id_group_menu`,`id_area`,`email`,`flg_block`,`tgl_expired`) values (1,'admin','202cb962ac59075b964b07152d234b70',12345,'1',1,1,1,1,1,'ao@bprxx.com',0,'2020-12-31');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

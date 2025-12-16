-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_learn
CREATE DATABASE IF NOT EXISTS `db_learn` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_learn`;

-- Dumping structure for table db_learn.departmen
CREATE TABLE IF NOT EXISTS `departmen` (
  `id_dprtmn` int NOT NULL AUTO_INCREMENT,
  `name_dprtmn` varchar(50) NOT NULL DEFAULT '',
  `created_at` date NOT NULL,
  PRIMARY KEY (`id_dprtmn`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_learn.departmen: ~0 rows (approximately)
INSERT INTO `departmen` (`id_dprtmn`, `name_dprtmn`, `created_at`) VALUES
	(1, 'HR', '2025-12-12'),
	(2, 'production', '2025-12-12');

-- Dumping structure for table db_learn.tbl_krywn
CREATE TABLE IF NOT EXISTS `tbl_krywn` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name_mhs` varchar(50) NOT NULL,
  `nik` int DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_learn.tbl_krywn: ~3 rows (approximately)
INSERT INTO `tbl_krywn` (`id`, `username`, `password`, `name_mhs`, `nik`, `address`, `profile`) VALUES
	(2, '', '', 'Rafi Fadhlurokhman', 321314, 'Puri', 'Quote4.png'),
	(3, '', '', 'Septiana Harun', 32163, 'PahlawanSetia', NULL),
	(5, 'umama', '$2y$12$iIg.rHi94uxU25Swi9bqH.qnAhcuqvCNT0cP/ftv8e.', 'umam', 42133231, 'puri', NULL),
	(6, 'umamega', '$2y$10$efdpRQhFfm.qb7c4g0Rg3Oiin2tVuDWQ9WCUXV.Q5c8PmiNNoF9yu', 'umamega', 34214, 'jepang', 'Quote3.png');

-- Dumping structure for table db_learn.tr_krywn_workplace
CREATE TABLE IF NOT EXISTS `tr_krywn_workplace` (
  `id_tr_krywn` int NOT NULL AUTO_INCREMENT,
  `id_dprtmn` int NOT NULL,
  `id_krywn` int NOT NULL,
  `assigned_at` date DEFAULT NULL,
  PRIMARY KEY (`id_tr_krywn`),
  KEY `id_dprtmn` (`id_dprtmn`),
  KEY `id_krywn` (`id_krywn`),
  CONSTRAINT `id_dprtmn` FOREIGN KEY (`id_dprtmn`) REFERENCES `departmen` (`id_dprtmn`),
  CONSTRAINT `id_krywn` FOREIGN KEY (`id_krywn`) REFERENCES `tbl_krywn` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_learn.tr_krywn_workplace: ~0 rows (approximately)
INSERT INTO `tr_krywn_workplace` (`id_tr_krywn`, `id_dprtmn`, `id_krywn`, `assigned_at`) VALUES
	(1, 1, 2, '2025-12-12');

-- Dumping structure for view db_learn.view_karyawan_list
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_karyawan_list` (
	`id_tr_krywn` INT(10) NOT NULL,
	`id_dprtmn` INT(10) NOT NULL,
	`id_krywn` INT(10) NOT NULL,
	`name_dprtmn` VARCHAR(50) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`assigned_at` DATE NULL,
	`name_mhs` VARCHAR(50) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`nik` INT(10) NULL,
	`address` VARCHAR(50) NULL COLLATE 'utf8mb4_0900_ai_ci'
) ENGINE=MyISAM;

-- Dumping structure for view db_learn.view_karyawan_list
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_karyawan_list`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_karyawan_list` AS with `t` as (select `tr_krywn_workplace`.`id_tr_krywn` AS `id_tr_krywn`,`tr_krywn_workplace`.`id_dprtmn` AS `id_dprtmn`,`tr_krywn_workplace`.`id_krywn` AS `id_krywn`,`departmen`.`name_dprtmn` AS `name_dprtmn`,`tr_krywn_workplace`.`assigned_at` AS `assigned_at` from (`tr_krywn_workplace` left join `departmen` on((`tr_krywn_workplace`.`id_dprtmn` = `departmen`.`id_dprtmn`)))) select `t`.`id_tr_krywn` AS `id_tr_krywn`,`t`.`id_dprtmn` AS `id_dprtmn`,`t`.`id_krywn` AS `id_krywn`,`t`.`name_dprtmn` AS `name_dprtmn`,`t`.`assigned_at` AS `assigned_at`,`tbl_krywn`.`name_mhs` AS `name_mhs`,`tbl_krywn`.`nik` AS `nik`,`tbl_krywn`.`address` AS `address` from (`t` left join `tbl_krywn` on((`t`.`id_krywn` = `tbl_krywn`.`id`)));

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for plumbing_db
CREATE DATABASE IF NOT EXISTS `plumbing_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `plumbing_db`;

-- Dumping structure for table plumbing_db.gdnxxsh
CREATE TABLE IF NOT EXISTS `gdnxxsh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mode` int(11) DEFAULT NULL,
  `nama` varchar(100) NOT NULL DEFAULT '0',
  `nama_tabel` varchar(50) DEFAULT NULL,
  `kategori_dokumen` varchar(50) DEFAULT NULL,
  `kategori_dokumen_value` varchar(50) DEFAULT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `suffix` varchar(50) DEFAULT NULL,
  `total_digit` int(11) DEFAULT NULL,
  `reset_by` varchar(5) DEFAULT NULL COMMENT 'Tahun | Bulan',
  `is_romawi_bulan` tinyint(1) DEFAULT 0 COMMENT 'apakah menggunakan bulan romawi',
  `digit_tahun` tinyint(1) DEFAULT 2 COMMENT '2 | 4',
  `separator` varchar(1) DEFAULT NULL,
  `by_company` tinyint(1) DEFAULT 0,
  `by_cabang` tinyint(1) DEFAULT 0,
  `keterangan` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT current_timestamp(),
  `last_edited_by` int(11) DEFAULT NULL,
  `last_edited_on` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `approved_by` int(11) DEFAULT NULL,
  `approved_on` datetime DEFAULT NULL,
  `field_tanggal` varchar(50) DEFAULT 'created_on',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table plumbing_db.gdnxxsh: ~14 rows (approximately)
INSERT INTO `gdnxxsh` (`id`, `mode`, `nama`, `nama_tabel`, `kategori_dokumen`, `kategori_dokumen_value`, `prefix`, `suffix`, `total_digit`, `reset_by`, `is_romawi_bulan`, `digit_tahun`, `separator`, `by_company`, `by_cabang`, `keterangan`, `is_active`, `created_by`, `created_on`, `last_edited_by`, `last_edited_on`, `approved_by`, `approved_on`, `field_tanggal`) VALUES
	(1, 2, 'Supplier', 'psuxxmh', '', '', 'S', '', 10, '', 0, 2, '/', 0, 0, NULL, 1, 1, '2023-02-11 10:14:55', NULL, NULL, NULL, NULL, 'created_on'),
	(2, 6, 'Sales Quotation', 'sqth', '', '', '', '', 3, 'Tahun', 0, 2, '/', 0, 0, NULL, 1, 1, '2023-02-11 13:05:50', 1, '2023-07-22 13:43:05', NULL, NULL, 'created_on'),
	(3, 2, 'Kontraktor', 'kontraktor_m', '', '', 'K', '', 4, '', 0, 2, '/', 0, 0, NULL, 1, 1, '2023-02-26 10:49:05', NULL, NULL, NULL, NULL, 'created_on'),
	(4, 2, 'Arsitek', 'arsitek_m', '', '', 'A', '', 4, '', 0, 2, '/', 0, 0, NULL, 1, 1, '2023-02-26 10:50:07', NULL, NULL, NULL, NULL, 'created_on'),
	(5, 2, 'Karyawan', 'hemxxmh', '', '', 'E', '', 4, '', 0, 2, '/', 0, 0, NULL, 1, 1, '2023-03-11 15:47:53', NULL, NULL, NULL, NULL, 'created_on'),
	(6, 1, 'Purchase Order', 'podxxth', '', '', 'PO', '', 4, 'Bulan', 0, 2, '/', 0, 0, NULL, 1, 1, '2023-03-12 20:24:49', NULL, NULL, NULL, NULL, 'tanggal'),
	(7, 1, 'MK', 'mk_m', '', '', 'MK', '', 4, 'Bulan', 0, 2, '/', 0, 0, NULL, 1, 1, '2023-05-29 12:04:26', NULL, NULL, NULL, NULL, 'created_on'),
	(8, 6, 'sqth_h', 'sqth', 'id_gcpxxmh', '2', 'FAB', '', 4, 'Tahun', 0, 2, '/', 0, 0, NULL, 1, 1, '2023-07-04 15:58:29', NULL, '2023-07-11 09:09:03', NULL, NULL, 'created_on'),
	(9, 6, 'sqth_v', 'sqth', 'id_gcpxxmh', '3', 'KPH', '', 4, 'Tahun', 0, 2, '/', 0, 0, NULL, 1, 1, '2023-07-04 15:58:29', NULL, '2023-07-11 09:11:43', NULL, NULL, 'created_on'),
	(10, 6, 'sqth_v', 'sqth', 'id_gcpxxmh', '4', 'H', '', 4, 'Tahun', 0, 2, '/', 0, 0, NULL, 1, 1, '2023-07-04 15:58:29', NULL, '2023-07-11 09:11:47', NULL, NULL, 'created_on'),
	(11, 6, 'sqth_h', 'sqth', 'id_gcpxxmh', '5', 'V', '', 4, 'Tahun', 0, 2, '/', 0, 0, NULL, 1, 1, '2023-07-04 15:58:29', NULL, '2023-07-11 09:11:27', NULL, NULL, 'created_on'),
	(12, 6, 'sqth_h', 'sqth', 'id_gcpxxmh', '6', 'JM', '', 4, 'Tahun', 0, 2, '/', 0, 0, NULL, 1, 1, '2023-07-04 15:58:29', NULL, '2023-07-11 09:11:22', NULL, NULL, 'created_on'),
	(13, 1, 'Penerimaan Barang', 'prcxxth', '', '', 'PRC', '', 4, 'Bulan', 0, 2, '/', 0, 0, NULL, 1, 1, '2023-07-14 10:08:03', NULL, NULL, NULL, NULL, 'created_on'),
	(14, 6, 'sqth_h', 'sqth', 'id_gcpxxmh', '1', 'KAB', '', 4, 'Tahun', 0, 2, '/', 0, 0, NULL, 1, 1, '2023-07-04 15:58:29', NULL, '2023-07-11 09:09:03', NULL, NULL, 'created_on');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for test
CREATE DATABASE IF NOT EXISTS `test` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `test`;

-- Dumping structure for table test.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `idCategoria` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `habilitada` tinyint(1) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table test.categorias: ~3 rows (approximately)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`idCategoria`, `nombre`, `habilitada`) VALUES
	(1, 'Mujer', 1),
	(2, 'Hombre', 1),
	(3, 'Niños', 0);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Dumping structure for table test.depositos
CREATE TABLE IF NOT EXISTS `depositos` (
  `idDeposito` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  PRIMARY KEY (`idDeposito`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table test.depositos: ~2 rows (approximately)
/*!40000 ALTER TABLE `depositos` DISABLE KEYS */;
INSERT INTO `depositos` (`idDeposito`, `nombre`, `direccion`) VALUES
	(1, 'CABA', 'Av 9 de Julio'),
	(2, 'AMBA', 'Ruta 3');
/*!40000 ALTER TABLE `depositos` ENABLE KEYS */;

-- Dumping structure for table test.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table test.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.migrations: ~4 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table test.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.password_reset_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;

-- Dumping structure for table test.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table test.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `idProducto` int(4) NOT NULL AUTO_INCREMENT,
  `idCategoria` int(4) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `moneda` char(3) NOT NULL,
  `precio` decimal(7,2) NOT NULL,
  `habilitado` tinyint(1) NOT NULL,
  PRIMARY KEY (`idProducto`,`idCategoria`),
  KEY `fk_Productos_Categorias_idx` (`idCategoria`),
  CONSTRAINT `fk_Productos_Categorias` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Dumping data for table test.productos: ~15 rows (approximately)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`idProducto`, `idCategoria`, `nombre`, `codigo`, `descripcion`, `moneda`, `precio`, `habilitado`) VALUES
	(1, 1, 'Producto 1', 'prueba', 'Descripción 1', 'ARS', 124.00, 0),
	(2, 1, 'Producto 2', 'perfume', 'Descripción 2', 'ARS', 75.52, 1),
	(3, 1, 'Producto 3', 'perfume', 'Descripción 3', 'ARS', 14.00, 0),
	(4, 1, 'Producto 4', 'prueba 1', 'Descripción 4', 'ARS', 4500.00, 1),
	(5, 1, 'Producto 5', '', 'Descripción 5', 'ARS', 235.72, 1),
	(6, 2, 'Producto 6', 'perfume', 'Descripción 6', 'ARS', 62.39, 1),
	(7, 2, 'Producto 7', '', 'Descripción 7', 'ARS', 297.24, 0),
	(8, 2, 'Producto 8', 'perfume', 'Descripción 8', 'ARS', 19.01, 1),
	(9, 2, 'Producto 9', 'prueba 2', 'Descripción 9', 'ARS', 140.00, 0),
	(10, 2, 'Producto 10', '', 'Descripción 10', 'ARS', 43.71, 1),
	(11, 3, 'Producto 11', '', 'Descripción 11', 'ARS', 149.32, 1),
	(12, 3, 'Producto 12', '', 'Descripción 12', 'ARS', 841.99, 1),
	(13, 3, 'Producto 13', '', 'Descripción 13', 'ARS', 19.99, 1),
	(14, 3, 'Producto 14', '', 'Descripción 14', 'ARS', 139.99, 0),
	(15, 3, 'Producto 15', '', 'Descripción 15', 'ARS', 235.72, 1);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Dumping structure for table test.productos_depositos
CREATE TABLE IF NOT EXISTS `productos_depositos` (
  `idProducto` int(4) NOT NULL,
  `idDeposito` int(4) NOT NULL,
  `disponibles` int(4) NOT NULL,
  `stock_minimo` int(4) NOT NULL,
  PRIMARY KEY (`idProducto`,`idDeposito`),
  KEY `fk_Productos_has_Depositos_Depositos1_idx` (`idDeposito`),
  KEY `fk_Productos_has_Depositos_Productos1_idx` (`idProducto`),
  CONSTRAINT `fk_Productos_has_Depositos_Depositos1` FOREIGN KEY (`idDeposito`) REFERENCES `depositos` (`idDeposito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Productos_has_Depositos_Productos1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table test.productos_depositos: ~28 rows (approximately)
/*!40000 ALTER TABLE `productos_depositos` DISABLE KEYS */;
INSERT INTO `productos_depositos` (`idProducto`, `idDeposito`, `disponibles`, `stock_minimo`) VALUES
	(1, 1, 600, 325),
	(1, 2, 345, 501),
	(2, 1, 471, 602),
	(2, 2, 597, 932),
	(3, 1, 367, 292),
	(3, 2, 858, 916),
	(4, 1, 255, 528),
	(4, 2, 874, 286),
	(5, 1, 809, 688),
	(5, 2, 764, 755),
	(6, 1, 486, 663),
	(6, 2, 857, 547),
	(8, 1, 743, 892),
	(8, 2, 482, 984),
	(9, 1, 973, 913),
	(9, 2, 649, 255),
	(10, 1, 577, 372),
	(10, 2, 631, 288),
	(11, 1, 799, 630),
	(11, 2, 502, 371),
	(12, 1, 851, 642),
	(12, 2, 409, 616),
	(13, 1, 857, 687),
	(13, 2, 615, 762),
	(14, 1, 967, 801),
	(14, 2, 852, 860),
	(15, 1, 744, 892),
	(15, 2, 477, 958);
/*!40000 ALTER TABLE `productos_depositos` ENABLE KEYS */;

-- Dumping structure for table test.productos_imagenes
CREATE TABLE IF NOT EXISTS `productos_imagenes` (
  `idImagen` int(4) NOT NULL AUTO_INCREMENT,
  `idProducto` int(4) NOT NULL,
  `path` varchar(255) NOT NULL,
  `por_defecto` tinyint(1) NOT NULL,
  PRIMARY KEY (`idImagen`,`idProducto`),
  KEY `fk_table1_Productos1` (`idProducto`),
  CONSTRAINT `fk_table1_Productos1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- Dumping data for table test.productos_imagenes: ~30 rows (approximately)
/*!40000 ALTER TABLE `productos_imagenes` DISABLE KEYS */;
INSERT INTO `productos_imagenes` (`idImagen`, `idProducto`, `path`, `por_defecto`) VALUES
	(1, 1, 'img-listado.png', 1),
	(2, 2, 'img-listado.png', 1),
	(3, 3, 'img-listado.png', 1),
	(4, 4, 'img-listado.png', 1),
	(5, 5, 'img-listado.png', 1),
	(6, 6, 'img-listado.png', 1),
	(7, 7, 'img-listado.png', 1),
	(8, 8, 'img-listado.png', 1),
	(9, 9, 'img-listado.png', 1),
	(10, 10, 'img-listado.png', 1),
	(11, 11, 'img-listado.png', 1),
	(12, 12, 'img-listado.png', 1),
	(13, 13, 'img-listado.png', 1),
	(14, 14, 'img-listado.png', 1),
	(15, 15, 'img-listado.png', 1),
	(16, 1, 'img-detalle.png', 0),
	(17, 2, 'img-detalle.png', 0),
	(18, 3, 'img-detalle.png', 0),
	(19, 4, 'img-detalle.png', 0),
	(20, 5, 'img-detalle.png', 0),
	(21, 6, 'img-detalle.png', 0),
	(22, 7, 'img-detalle.png', 0),
	(23, 8, 'img-detalle.png', 0),
	(24, 9, 'img-detalle.png', 0),
	(25, 10, 'img-detalle.png', 0),
	(26, 11, 'img-detalle.png', 0),
	(27, 12, 'img-detalle.png', 0),
	(28, 13, 'img-detalle.png', 0),
	(29, 14, 'img-detalle.png', 0),
	(30, 15, 'img-detalle.png', 0);
/*!40000 ALTER TABLE `productos_imagenes` ENABLE KEYS */;

-- Dumping structure for table test.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Ramon Fajardo Fonseca', 'rfajardo0801@gmail.com', NULL, '$2y$10$F.dv/I9kdIfhsxz3WfQs8ults/8nYx08K6JKHBfjMI0JrhwLu/fTW', NULL, '2023-03-30 13:33:18', '2023-03-30 13:33:18');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

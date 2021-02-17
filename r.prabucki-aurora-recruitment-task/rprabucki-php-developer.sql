-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Wersja serwera:               10.3.16-MariaDB - mariadb.org binary distribution
-- Serwer OS:                    Win64
-- HeidiSQL Wersja:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Zrzut struktury bazy danych rprabucki-php-developer
CREATE DATABASE IF NOT EXISTS `rprabucki-php-developer` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `rprabucki-php-developer`;

-- Zrzut struktury tabela rprabucki-php-developer.tbl_articles
CREATE TABLE IF NOT EXISTS `tbl_articles` (
  `article_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_title` text CHARACTER SET utf8 NOT NULL,
  `article_status` tinyint(2) NOT NULL DEFAULT 0,
  `article_description` text CHARACTER SET utf8 NOT NULL,
  UNIQUE KEY `article_id_unique` (`article_id`),
  KEY `article_id_key` (`article_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Zrzucanie danych dla tabeli rprabucki-php-developer.tbl_articles: ~0 rows (około)
/*!40000 ALTER TABLE `tbl_articles` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_articles` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

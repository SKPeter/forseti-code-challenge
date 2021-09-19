CREATE DATABASE IF NOT EXISTS `forseti-code-challenge`;
USE `forseti-code-challenge`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+03:00";

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `date_time` datetime NOT NULL,
  `url` varchar(250) NOT NULL,
  `url_hash` CHAR(32) NOT NULL,
  UNIQUE (`url_hash`),
  UNIQUE (`url`),
  UNIQUE (`title`),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
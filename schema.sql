SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';


USE `app`;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`email`, `password`) VALUES
('magenta@gmx.ch',	'$2y$10$Pe9N3w42rQY6jvi4xzRMKOJ49V5Vbrp9JitytDauSJa.AOomzp1QC');

DROP TABLE IF EXISTS `work`;
CREATE TABLE `work` (
  `worksec` bigint(20) DEFAULT NULL,
  `breaksec` bigint(20) DEFAULT NULL,
  `User_email` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `work` (`worksec`, `breaksec`, `User_email`, `Date`) VALUES
(27200,	6402,	'magenta@gmx.ch',	'2017-06-20 13:07:25'),
(28905,	3200,	'magenta@gmx.ch',	'2017-06-10 13:11:28'),
(0,	22,	'magenta@gmx.ch',	'2017-06-20 13:13:20');

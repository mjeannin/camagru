DROP DATABASE IF EXISTS `camagru_db`;
CREATE DATABASE `camagru_db`;
USE `camagru_db`;

DROP TABLE IF EXISTS `comm`;
CREATE TABLE `comm` (
  `comm_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`comm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `authorid` varchar(255) NOT NULL,
  `img` longtext NOT NULL,
  `time` date NOT NULL,
  `likes` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes` (
  `img_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `likes_id` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`likes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tokens`;
CREATE TABLE `tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tokens` (`id`, `token`, `user`) VALUES
(1, '155b404ced5b526097b62cb5a8d97f29', 1),
(2, '394da67f12cbdd05e606d77ee8dabb08', 1);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `validation` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `validation`, `token`, `pseudo`, `pass`, `email`, `date_inscription`) VALUES
(2, 1, '63aac8b1b2ff978c90e62562262b0cdc3fe27124083af30822f61a6347c0a7c9cd37ca0bff1c23d71170', 'admin', '$2y$10$zEJ5dHITbU.VVpVoCsZjwO3y387Th5NVk57jw/hoskn/bjt0MTQUq', 'admin@camagru.fr', '2017-04-17');

-- 2017-04-11 18:00:31
DROP TABLE IF EXISTS `comm`;
CREATE TABLE `comm` (
  `comm_id` int(11) NOT NULL,
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
(1, 1,  'b2543abce8a222c086262a4dda237f0e92202169686566da487329fa9a420bfa95f6207336fb1781738d', 'mjeannin', '$2y$10$YvIG0KBsIi5j/HC2diLovOvb1QjjxrAxotqcXq85niKcL6iA2NP4G', 'marine.jeannin@sciencespo.fr', '2017-03-25');

-- 2017-04-11 18:00:31
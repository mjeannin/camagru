DROP DATABASE IF EXISTS `camagru_db`;
CREATE DATABASE `camagru_db`;
USE `camagru_db`;

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `authorid` varchar(255) NOT NULL,
  `img` longtext NOT NULL,
  `time` date NOT NULL,
  `likes` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `validation` boolean NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `likes` (
  `img_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `likes_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `comm` (
  `comm_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`comm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `likes`
  ADD PRIMARY KEY (`likes_id`);

ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `likes`
  MODIFY `likes_id` int(255) NOT NULL AUTO_INCREMENT;

INSERT INTO `users` (`id`, `validation`, `token`, `pseudo`, `pass`, `email`, `date_inscription`) VALUES
(1, 1, 'b2543abce8a222c086262a4dda237f0e92202169686566da487329fa9a420bfa95f6207336fb1781738d', 'mjeannin', '$2y$10$0R4o..aUzZcCaONrf1Hue.wuLEm7dM6GqsAumret.1I.QXmc94B1u', 'marine.jeannin@sciencespo.fr', '2017-03-25'),
(2, 2, '7d7cf70a8a2dd8ab6bacf8729bfe0fa1a7e239b03ea7b0037549c3672e8b7c5854abe8154114ff576c10', 'mjea', '$2y$10$3yxKyxw891eiMkSq.liifOKkZRpS9RHQyO8RWBjkeEz7WhW7BAaxW', 'marine.jeannin@sciencespo.fr', '2017-04-02');

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1,	'Ribamar',	'ribafs@gmail.com',	'$2y$10$HFQ5zYOr9cd2DTg.LZ7u/uyhcX03betPxCuY1C2txwgBuY1WKHICW');

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(105) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `posts` (`id`, `title`, `content`, `user_id`) VALUES
(2,	'Primeiro',	'Primeiro post',	1),
(3,	'Segundo',	'Segundo post',	1),
(4,	'Segundo',	'Segundo post',	1),
(5,	'Quarto',	'Quarto post',	1);


CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1,	'Imagens',	NULL),
(2,	'Vídeos',	NULL);

DROP TABLE IF EXISTS `category_post`;
CREATE TABLE `category_post` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  KEY `fk-posts` (`post_id`),
  KEY `fk-category` (`category_id`),
  CONSTRAINT `fk-category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)  ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`)  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `category_post` (`post_id`, `category_id`) VALUES
(2,	1),
(3,	1),
(4,	1),
(5,	1),
(5,	2);


-- 2020-05-16 17:06:00


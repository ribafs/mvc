CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `clientes` (`id`, `nome`, `email`) VALUES
(1,	'Maeve Streich II',	'beahan.edd@huels.com'),
(2,	'Roosevelt Berge Sr.',	'moen.scottie@hotmail.com'),
(3,	'Emmy Bins',	'berge.jess@price.com'),
(4,	'Carson Harber',	'zsipes@greenholt.com'),
(5,	'Dr. Alphonso Rau III',	'margret.hansen@yahoo.com'),
(6,	'Mrs. Willa Schneider',	'ylowe@yahoo.com'),
(7,	'Prof. Alexane Cormier PhD',	'brannon13@gmail.com'),
(8,	'Iva Lockman',	'oconnell.harold@mann.org'),
(9,	'Nathen Mitchell',	'jennyfer.towne@stroman.com'),
(10,	'Mrs. Crystel Ledner',	'karley.hyatt@raynor.biz'),
(11,	'Enola Parker MD',	'anderson.margarette@tromp.net');

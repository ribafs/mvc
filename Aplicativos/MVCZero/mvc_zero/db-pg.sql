CREATE TABLE customers (
  id serial primary key,
  name varchar(55) NOT NULL,
  email varchar(55) NOT NULL,
  birthday date NOT NULL
);

INSERT INTO customers (id, name, email, birthday) VALUES
(1,	'Maeve Streich II',	'beahan.edd@huels.com',	'1972-08-21'),
(2,	'Roosevelt Berge Sr.',	'moen.scottie@hotmail.com',	'1978-08-08'),
(3,	'Emmy Bins',	'berge.jess@price.com',	'1979-02-05'),
(4,	'Carson Harber',	'zsipes@greenholt.com',	'2019-05-16'),
(5,	'Dr. Alphonso Rau III',	'margret.hansen@yahoo.com',	'1973-06-05'),
(6,	'Mrs. Willa Schneider',	'ylowe@yahoo.com',	'1999-07-26'),
(7,	'Prof. Alexane Cormier PhD',	'brannon13@gmail.com',	'2008-11-07'),
(8,	'Iva Lockman',	'oconnell.harold@mann.org',	'1984-12-17'),
(9,	'Nathen Mitchell',	'jennyfer.towne@stroman.com',	'1997-12-07'),
(10,	'Mrs. Crystel Ledner',	'karley.hyatt@raynor.biz',	'2007-05-28'),
(11,	'Enola Parker MD',	'anderson.margarette@tromp.net',	'1996-09-10'),
(12,	'Ernestine Hill',	'ycronin@gmail.com',	'1977-12-25'),
(13,	'Helena Reichel',	'aletha.beier@gmail.com',	'1975-06-02'),
(14,	'Efrain Block',	'fay.lynch@hotmail.com',	'1971-11-22'),
(15,	'Prof. Forest Quitzon',	'olga.conn@gmail.com',	'2015-11-06'),
(16,	'Toney Breitenberg DDS',	'tatyana.purdy@yost.com',	'1982-02-06'),
(17,	'Mrs. Breanne Hegmann',	'blanca.hermiston@hotmail.com',	'2001-05-27'),
(18,	'Prof. Hadley Jacobs',	'bahringer.gideon@gmail.com',	'1974-02-16'),
(19,	'Dr. Louvenia Schulist',	'jody.hills@hotmail.com',	'2010-10-01'),
(20,	'Ardella Batz',	'verla45@miller.com',	'2001-09-27'),
(21,	'Eleanore Rice',	'hlangosh@gleichner.net',	'1979-06-12'),
(22,	'Dr. Hubert Kihn',	'harris.dean@gmail.com',	'1997-12-25'),
(23,	'Enos Ruecker III',	'chris86@marquardt.biz',	'1979-12-30'),
(24,	'Miss Maymie Dickinson',	'vwill@davis.org',	'1970-04-27'),
(25,	'Leslie Steuber IV',	'quitzon.berneice@jones.com',	'2013-06-07');

CREATE TABLE products (
  id serial primary key,
  description varchar(50) NOT NULL,
  unity varchar(5) NOT NULL,
  date date DEFAULT NULL
);

INSERT INTO products (id, description, unity, date) VALUES
(1,	'Constance Doyle',	'W3',	'1989-01-21'),
(2,	'Prof. Marcia Rogahn',	'N3',	'2001-07-11'),
(3,	'Nyah Botsford',	'G3',	'1970-07-04'),
(4,	'Gilbert Kemmer',	'L3',	'1981-02-21'),
(5,	'Annamae Carroll',	'S3',	'1991-10-27'),
(6,	'Mrs. Audra Botsford',	'F3',	'1981-09-12'),
(7,	'Norris Nikolaus',	'J3',	'1981-11-28'),
(8,	'Mr. Zander Crist V',	'P3',	'1986-04-23'),
(9,	'Cheyanne Lowe',	'Y3',	'2007-03-11'),
(10,	'Sid Jacobi',	'T3',	'1985-02-18'),
(11,	'Nikki Hudson IV',	'W3',	'1970-05-22'),
(12,	'Neoma Bahringer',	'U3',	'1971-12-09'),
(13,	'Ms. Ines Ryan',	'L3',	'1996-04-17'),
(14,	'Prof. Citlalli Fadel DVM',	'E3',	'1993-09-02'),
(15,	'Eriberto Lakin',	'D3',	'1971-11-06'),
(16,	'Ms. Marlen Brakus',	'L3',	'2016-10-25'),
(17,	'Kenna Kilback',	'Y3',	'1985-01-31'),
(18,	'Diego Brown',	'V3',	'1982-12-13'),
(19,	'Lambert Harris',	'U3',	'1994-01-12'),
(20,	'Kaitlin Jacobi',	'E3',	'1981-12-08'),
(21,	'Mateo Walsh',	'T3',	'1984-06-06'),
(22,	'Lonnie Sanford',	'N3',	'2006-04-20'),
(23,	'Mr. Geovany Feeney',	'M3',	'2008-06-21'),
(24,	'Roy Swaniawski',	'I3',	'1994-02-28'),
(25,	'Mr. Hazle Wilkinson',	'Y3',	'1999-07-04');
-- 2019-08-30 11:30:15

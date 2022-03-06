## Agora vamoos começar a preencher diretórioos e arquivos

## Diretório raiz

- composer.json
- db-my.sql
- db-pg.sql
- README.md
- .htaccess

### composer.json
```php
{
    "name": "ribafs/mmv_zero",
    "description": "Aplicativo em PHP com MVC",
    "type": "project",
    "license": "MIT",
    "authors": [
        {
            "name": "Ribamar FS",
            "email": "ribafs@gmail.com"
        }
    ],
	"minimum-stability": "stable",
    "require": {
        "robmorgan/phinx": "dev-master",
        "fzaninotto/faker": "^1.9@dev",
        "filp/whoops": "^2.2@dev"
    },
    "autoload":
    {
        "psr-4":
        {
            "Mini\\" : "src/"
        }
    }
}
```

### db-my.sql

```sql
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `customers` (`id`, `name`, `email`, `birthday`) VALUES
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
-- 2019-08-30 11:30:15
```

### .htaccess
```html
RewriteEngine on
RewriteRule ^(.*) public/$1 [L]
```

Este .htaccess do raiz do aplicativo redireciona todas as requisições da pasta raiz para public/index.php


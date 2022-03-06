## Estrutura do Diretório public

/public
	/css
		custom.css
	/images
		mvc.png
	/js
	index.php
	.htaccess

### .htaccess
```html
Options -MultiViews

RewriteEngine On

Options -Indexes

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-l
RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]
```

Este .htaccess redireciona toda requisição que chega ao app-mvc/public para o app-mvc/public/index.php

### index.php

```php
<?php
require __DIR__ . '/../src/bootstrap.php';
```

Este é o ponto de entrada do aplicativo/entry point, chamado de front controller.
O .htaccess do raiz redireciona todas as entradas para o public/index.php

### custom.css

O arquivo custom.css é um arquivo para customização do BootStrap 4, a ser usado mais a frente.

Veja que o diretório public, que é acessível via web, contém apenas uma linha, que chama o bootstrap.



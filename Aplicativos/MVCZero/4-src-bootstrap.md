## Estrutura do arquivo bootstrap.php

/src/bootstrap.php

```php
<?php

// set a constant that holds the project's folder path, like "/var/www/html/mini-fw".
// DIRECTORY_SEPARATOR adds a slash to the end of the path
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);

// set a constant that holds the project's 'src' folder, like '/var/www/html/mini-fw/src'.
define('APP', ROOT . 'src' . DIRECTORY_SEPARATOR);

// This is the auto-loader for Composer-dependencies (to load tools into your project).
require_once ROOT . 'vendor/autoload.php';

// load application config (error reporting etc.)
require_once APP . 'config/config.php';

// load application class
use Mini\Core\Router;

// start the application
$app = new Router();
```

Veja que 'config.php é chamado, então vamos a ele.

Inicialmente são definidas duas constantes:

ROOT - que captura a pasta raiz do aplicativo, no caso /var/www/html/mvc_zero/
APP - que captura o path completo da pasta application, no meu caso em:
/var/www/html/mvc_zero/src/

Também é feito o require_once do autoload do composer e do arquivo config.php, onde está basicamente a configuração do banco de dados. Como ainda não criamos ele reclamará.

Também é feita a carga da classe Router e seu instanciamento, que dá acesso as rotas para o aplicativo.


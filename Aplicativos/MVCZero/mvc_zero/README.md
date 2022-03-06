# mvc_zero

## Esta versão
- Usa duas tabelas. Agora com customers e products

- Usa BootStrap 4
- Suporte ao PostgreSQL
- Definida a constante CONTROLLER_DEFAULT e eliminado o controller e a view home, que de fato não tinha função
- Adicionada a declaração em cada arquivo com função/método
declare(strict_types = 1);

No início de cada arquivo para forçar a checagem de tipos em métodos/funções pelo PHP

Em caso de uso de tipo incompatível dispara:

Fatal error: Uncaught TypeError:
- Agora temoms uma constante com o nome da aplicação que é adicionada no header.php para que apareça em todas as páginas. Configure em config/config.php:
define('APP_TITTLE', 'Aplication Title');

Instalação

Acesse a pasta e execute
composer update


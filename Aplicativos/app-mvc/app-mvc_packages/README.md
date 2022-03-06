Esta versão trocou o CSS original pelo BootStrap 4
E instalou os pacotes phinx, faker e whoops

Renomeou a pasta application para src

## Configurações para usar o Whoops:
- Criar dois ambientes de desenvolvimento com define no config.php
- Configurações básicas do Whoops no application/bootstrap.php
- Ele começará a agir/aparecer automaticamente em caso de erros em desenvolvimento

## Testado em:
- Windows e Linux
- MySQL e PostgreSQL

Nesta versão também começamos a adotar a declaração
declare(strict_types = 1);
No início de cada arquivo para obrigar a declaração de tipos em métodos e retornos.
Em caso de uso de tipo incompatível dispara:
Fatal error: Uncaught TypeError:

Referências:
https://code.tutsplus.com/tutorials/whoops-php-errors-for-cool-kids--net-32344
https://github.com/ribafs/no-framework-tutorial

Nesta versão foi testado o suporte ao PostgreSQL
E efetuados ajustes para que funcionasse

Instalação

Acesse a pasta e execute
composer update

Instalar migrations

Atualize os dados do banco no arquivo do raiz
phinx.yml

Execute:
php vendor/robmorgan/phinx/bin/phinx migrate -e production
php vendor/bin/phinx seed:run -e production


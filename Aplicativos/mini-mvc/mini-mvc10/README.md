# Mini MVC

Este aplicativo é oriundo basicamente de 3 outros:
- https://github.com/tjgweb/micro-framework
- https://bitbucket.org/parhamcurtis/ruahmvcyoutubecourse/src
- https://github.com/ribafs/mini-framework. Este é oriundo deste https://github.com/ribafs/mini3

## Esta versão usa algumas dependências/pacotes de terceitos

## Versão usando Singleton na conexão com o banco de dados

## Estrutura de diretórios

- App
- Core
- public
- vendor

- Detalhando:
- .htaccess - redireciona todas as requisições que chegam ao aplicativo a pasta /public
- App - aqui ficam as classes e views do aplicativo: controllers, models e views
- Core - aqui ficam arquivos de classe base para os da pasta App e outros que geralmente não são alterados
- public - aqui ficam o .htaccess, index.php e a pasta assets, contendo css, js, img, fonts
	- .htaccess - redireciona tudo que chega na pasta /public para /public/index.php
	- index.php - Front Controller, única entrada permitida para o aplicativo, tornando o mesmo mais seguro
- vendor - geralmente aqui ficam todos os pacotes de terceiros (referidos nas seções require e require-dev do composer.json), mas que em nosso caso	

Nesta versão criei duas classes base: Core/Model e Core/Controller, que são extendidas pelos models e controllers do aplicativo.
Assim economizo código e o tenho organizado, em cada classe criada tenho 2 métodos que são apenas executados nas classes filhas.

Criar classes base é uma boa prática para evitar estar digitando código de forma repetida.

Aqui continuei usando muita coisa do mini-framework, mas com algumas alterações:
- Estrutura de diretórios agora com
/App - classes e arquivos do aplicativo
/Core - classes e arquivos do núcleo
- Que também mudou o composer.json
- Classes base agora são abstract, para impedir o instanciamento, permitir somente extender
- Views agora incorporaram os templates e todos os seus arquivos tem extensão .phtml
- Usei parte do micro-framework, mas não usei o eloquent. Preferi o PDO, por ter mais documentação disponível
- bootstrap ficou em Core e config em App

Adicionei ao config
if(DEBUG) {
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
} else {
  error_reporting(0);
  ini_set('display_errors', 0);
  ini_set('log_errors', 1);
  ini_set('error_log', ROOT . DS .'tmp' . DS . 'logs' . DS . 'errors.log');
}

DEBUG por padrão é true, por estar em micro de testes

## Herança

Nesta versão foi dada ênfase à herança:

ClientesModel extends Model que extends Connection

Com isso há um maior reaproveitamento de código e uma maior modularidade e organização.

## Licença

MIT

# Criar o micro-framework do zero, arquivo a arquivo.

Baseado neste projeto:
Playlist Criação de um Micro Framework do Zero
https://www.youtube.com/playlist?list=PLSYIyzca1f9wGynWlC-SH2lVBkE8S81A0

Repositório com curso
https://github.com/tjgweb/curso-micro-framework

Repositório mais enxuto
https://github.com/tjgweb/micro-framework

Criei a pasta
micro-fw-ribafs

Copiei para ela
composer.json e ajustei

Copiei também para ela
public/ com seu conteúdo

Então chamei pelo navegador, que reclamou do bootstrap.php
php -S 127.0.0.1:8080 -t public
http://127.0.0.1:8080

Ao chamar reclama do routes.php, então trouxe app/routes.php

Agora reclama do core/Route.php

Reclama de core/Auth

Agora core/Session

core/Container

HomeController

BaseController

layout.phtml
menu.phtml

Reclama do layout view path, então copiei a pasta home das views.
Aparente sem erro: menu, ícone, texto de abertura.

Agora dá para saber que o que não foi necessário até agora ou não é necessário ou é necessário apenas em certas circunstâncias.

Agora implementar posts

- Começar pela rota

Editar app/routes.php

E adicionar a linha

$route[] = ['/posts', 'PostsController@index'];

Chamar
http://127.0.0.1:8080/posts

Recebo a mensagem (sem o menu)
Erro 404: Page not found!

Copiei então, do original, app/Views/404.html

Agora recebo (preservou o menu)

Página não encontrada

Por favor, verifique se a URL digitada está correta.

Então começarei criando o model depois o controller

app\Models\Post.php

Agora
app/Controllers/PostsController.php

core/BaseModelEloquent.php

Depois
core/bootstrap_eloquent.php

app/database.php

Agora mostrou o menu (nos anteriores não mostrou) e reclamou da view, no caso posts.
Criarei a pasta app/Views/posts/ e copiarei o index.phtml

Ao atualizar ele já mostrou a view posts/index

Ao clicar no link do post (criei um usuário, duas categorias e um post manualmente no gerenciador do mysql)

Ele está reclamando do model User. Eu não estava querendo trazer para não atrapalhar o entendimento mas terei que fazer.
Depois voltarei para a view show.

Os passos para implementar um crud:
- rota
- model
- controller
- views

Rotas para user:

$route[] = ['/login', 'UserController@login'];
$route[] = ['/login/auth', 'UserController@auth'];
$route[] = ['/logout', 'UserController@logout'];

$route[] = ['/user/create', 'UserController@create'];
$route[] = ['/user/store', 'UserController@store'];
$route[] = ['/user/{id}/edit', 'UserController@edit'];
$route[] = ['/user/{id}/update', 'UserController@update'];

app/Models/User.php
Aproveitar e legar também Category

Agora o app\Controllers\UsersController.php

E as vies
app\Views\users

Passar também a pasta com alerts de views
Após atualizar o navegador não mais reclamou do usuário, visto que ele agora identificou.

Agora vamos implementar a view show

Copiar app\Views\posts\show.phtml
Pronto, ao clicar no link do post, ele mostra o post completo.

Ao clicar no botão para adicionar novo post ele pede a view create
Copiar app\Views\posts\create.phtml

Pronto. Vamos tentar criar um novo post via botão
Após clicar no submit a tela fica em branco, com a url post/store. Reclamou da rait core/Validator.php
Copiei o core/Redirect.php

Agora mostrou todos os posts e ícones respectivos.

Ao excluir um post a tela ficou em branco.

Ao corrigir o método find() e teclar F5 aparece a tela com:
SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`testes`.`category_post`, CONSTRAINT `fk-posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON UPDATE CASCADE) (SQL: delete from `posts` where `id` = 4)

Tive que alterar as tabelas com relacionamentos assim:
CREATE TABLE `category_post` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  KEY `fk-posts` (`post_id`),
  KEY `fk-category` (`category_id`),
  CONSTRAINT `fk-category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)  ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk-posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`)  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

Agora removeu.

Ao efetuar logout a tela ficou branca e fui ver o que era. Reclama a falta do trait Autenticate. Copiei.
Após atualizar o navegador ele abriu o login

Criei um segundo usuário.
Efetuei login com ele mas os ícones edit e delete não aparecem para ele, o que tá correto.

Voltei ao primeiro user, mas quando clico no ícone para editar um post aparece:
Você não pode editar post de outro autor.
O que é um erro.

Agora começa a dar trabalho. Vejamos.

A mensagem acima está no método edit() do PostsController.php

Depois de corrigido, agora ele pede a view edit. Copiei
 

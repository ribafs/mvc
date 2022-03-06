## Alterações

- Nesta fase estarei adicionando o que deixei de fora: add, edit e delete


Nesta versão pretendo fazer as seguintes alterações:
- Criar uma classe Core/View que substituirá as src/View nos controllers

Criarei Core/View.php com um único método


<?php

declare(strict_types = 1);
namespace Mvc\Core;

class View
{

    // controller, action (vindos do Router), $clientes vindo do model
	public function render($controller, $action, $clientes){

        require SRC . 'template/_templates/header.php';
        require SRC . 'template/'.$controller.'/'.$action.'.php';
        require SRC . 'template/_templates/footer.php';
	}

}

O ErrorController também pode ser refatorado, mas deixarei quieto por enquanto.

Na próxima fase estarei adicionando o que falta: add, edit e delete

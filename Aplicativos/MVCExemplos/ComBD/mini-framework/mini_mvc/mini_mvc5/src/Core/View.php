<?php
declare(strict_types = 1);
namespace Mvc\Core;

class View
{

    // controller, action (vindos do Router), $clientes vindo do model. $contagem é usada somente pelo index dos controllers
	public function render($controller, $action, $todos, $um, $contagem=null){
        require SRC . 'template/_templates/header.php';
        require SRC . 'template/'.$controller.'/'.$action.'.php';
        require SRC . 'template/_templates/footer.php';
	}

}


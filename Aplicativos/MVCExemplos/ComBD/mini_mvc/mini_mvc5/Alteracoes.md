## Alterações

- Nesta fase 5 estarei finalmente implementando o delete
Observe que delete não tem view associada a ele. Ao clicar em delete na linha de um registro o mesmo é removido sem confirmação.
Uma boa ideia é criar uma view apra confirmação ou usar o JavaScript para isso. Assim:

<td><a onclick="return confirm('Tem certeza de que deseja excluir este registro ?')" href="delete.php?id=<?=$row['id']?>"><i class="glyphicon glyphicon-remove-circle" title="Excluir"></a></td>-->


- Nesta versão 4 irei implementar o edit

-Nesta terceira versão adicionarei apenas a funcionalidade para inserir clientes
- Lembrando que edit trabalha em conjunto com update: edit representa o form e o update a alteração no banco

Acabei por melhorar a tradução de algumas variáveis no controller e no model:
$todos - pega todos os clientes
$contagem - pega o total de clientes

Nesta segunda versão pretendo fazer as seguintes alterações:
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

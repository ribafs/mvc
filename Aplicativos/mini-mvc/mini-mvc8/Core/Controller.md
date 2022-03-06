# Core\Controller.php

```php
<?php
declare(strict_types = 1);

namespace Core;

use Core\Model;

class Controller
{
    public $table = null;
    private $model = '';

    public function __construct($table='clientes'){
      $this->table = $table;
      $this->model = '\\App\\Models\\'.ucfirst($this->table) . 'Model';
    }

    public function index()
    {
        $Obj = new Model($this->table); // Instanciar Model e passar a tabela como parâmetro
        $todos = $Obj->todosRegs(); // Chamar o método todosRegs() com a instância $Obj, Todos os clientes e seus dados
        $soma = $Obj->somaRegs();// Chamar o método somaRegs() com a instância $Obj, Total de clientes, a soma

        // Carregar a view. Com as views nós podemoms mostrar $todos e a soma facilmente
        require_once APP . 'Views/_includes/header.phtml';
        require_once APP . 'Views/_includes/menu.phtml';                
        require_once APP . 'Views/'.$this->table.'/index.phtml';
        require_once APP . 'Views/_includes/footer.phtml';
    }

    public function add()
    {
        $Obj = new Model($this->table);// Instanciar Model passando a tabela
        $fld = $Obj->fields(); // Guardar em $fld o método fields()
        $fld0 = $fld[0];// Guardar em $fld0 o primeiro resultado de $fld
        $fld1 = $fld[1];// Guardar em $fld1 o primeiro segundo de $fld
        $tab = substr($this->table,0,-1);// Remover s final do nome da tabela (cliente) para tornar genérico o name dos submits
        if (isset($_POST['submit_add_'.$tab])) {// Exemplos: submit_add_cliente, submit_add_vendedore, que deve ser corrigido para vendedor
          $Obj = new $this->model($this->table);// Usando a variável criada no início
          $Obj->add($_POST[$fld0], $_POST[$fld1]); // Passando as duas variáveis criadas logo acima
	        header('location: ' . URL . $this->table.'/index');	// $this->table também é definida no início desta classe
        }

        // Carregar a view com os includes e o add.phtml
        require_once APP . 'Views/_includes/header.phtml';
        require_once APP . 'Views/_includes/menu.phtml';                                
        require_once APP . 'Views/'.$this->table.'/add.phtml';
        require_once APP . 'Views/_includes/footer.phtml';
    }

    public function edit($field_id)
    {
        if (isset($field_id)) {
            $Obj = new $this->model($this->table);// usando a variável do início
            $Obj2 = new Model($this->table); // Instanciando Core\Model
            $todos = $Obj2->todosRegs(); // Chamando o método todosRegs() de Core\Model

            $um = $Obj->umReg($field_id);// Chamando o método umReg() de $Obj

            if ($um === false) { // Testar de a variável $um é false. Se for false dispara o index do Core\ErrorController
                $page = new \Core\ErrorController();
                $page->index();
            } else {
            		// Montar a view edit.phtml com os includes
                require_once APP . 'Views/_includes/header.phtml';
				        require_once APP . 'Views/_includes/menu.phtml';                        
                require_once APP . 'Views/'.$this->table.'/edit.phtml';
                require_once APP . 'Views/_includes/footer.phtml';
            }
        } else { // Então redirecionar para o index da tabela atual
            header('location: ' . URL . $this->table.'/index');
        }
    }

    public function update()
    {        
        if($this->table == 'vendedores'){
          $tab = substr($this->table,0,-2);// Remover es final do nome da tabela// Corrigindo se for vendedores para "vendedor"
        }else{
          $tab = substr($this->table,0,-1);// Remover s final do nome da tabela
        }
        if (isset($_POST['submit_update_'.$tab])) { // Similar ao método acima
          $Obj = new Model($this->table);
          $fld = $Obj->fields();
          $fld0 = $fld[0];
          $fld1 = $fld[1];

          $Obj = new $this->model($this->table);
          $Obj->update($_POST[$fld0], $_POST[$fld1], $_POST['field_id']);
        }
				// Redirecionar para o index da tabela atual
        header('location: ' . URL . $this->table.'/index');
    }

    public function delete($field_id)
    {
        if (isset($field_id)) {
            $Obj = new Model($this->table);
            $Obj->delete($field_id);
        }
				// Redirecionar para o index da tabela atual
        header('location: ' . URL . $this->table.'/index');
    }
}
```

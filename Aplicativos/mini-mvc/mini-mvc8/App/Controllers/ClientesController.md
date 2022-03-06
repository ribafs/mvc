# Controller Clientes

```php
<?php
declare(strict_types = 1); //Forçar a declaração de tipos no retorno dos métodos

namespace App\Controllers; // Declaraar em qual naemspace encontra-se este controller

use Core\Controller; // Incluir a classe Core\Controller, que é a classe base a ser usada abaixo

class ClientesController extends Controller //Veja que App\Controllers\ClientesController herda de Core\Controller
{
    public function index()
    {
        $Obj = new Controller('clientes');// Instancia Controller, passando a tabela clientes
        $Obj->index(); // Chama o método index() de Controller
    }

    public function add(){
      $Obj = new Controller('clientes');// Instancia Controller, passando a tabela clientes
      $Obj->add();// Chama o método add() de Controller
    }

    public function delete($field_id){
      $Obj = new Controller('clientes');// Instancia Controller, passando a tabela clientes
      $Obj->delete($field_id);// Chama o método delete() de Controller, passando $field_id
    }

    public function edit($field_id){
      $Obj = new Controller('clientes');// Instancia Controller, passando a tabela clientes
      $Obj->edit($field_id);// Chama o método edit() de Controller, passando $field_id
    }

    public function update(){
      $Obj = new Controller('clientes');// Instancia Controller, passando a tabela clientes
      $Obj->update();// Chama o método update() de Controller
    }
}
```

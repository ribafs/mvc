<?php
namespace App\Models;

use Core\Model;

class Produto extends Model
{
    public function index(){
        $stmte = $this->pdo->query("SELECT * FROM produtos order by id");
        $executa = $stmte->execute();
        $produtos = $stmte->fetchall(\PDO::FETCH_ASSOC); // Para recuperar um Objeto utilize PDO::FETCH_OBJ

        return $produtos;
    }
}

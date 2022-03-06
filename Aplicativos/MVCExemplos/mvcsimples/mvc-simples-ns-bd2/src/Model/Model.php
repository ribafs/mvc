<?php

namespace Mvc\Model;

class Model extends Connection
{
    public function listar(){
            $stmte = $this->pdo->query("SELECT * FROM usuarios order by id");
            $executa = $stmte->execute();
            $result = $stmte->fetchAll(\PDO::FETCH_OBJ);
            return $result;
    }
}


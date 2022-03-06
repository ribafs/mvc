<?php
declare(strict_types = 1);
namespace App\Model;

use Core\Model;

class ClientesModel extends Model
{ 

    public function add($nome, $email)
    {
        $sql = 'INSERT INTO clientes (nome, email) VALUES (:nome, :email)';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':nome' => $nome, ':email' => $email);

        $query->execute($parameters);
    }

    public function umCliente($cliente_id)
    {
        $sql = 'SELECT id, nome, email FROM clientes WHERE id = :cliente_id LIMIT 1';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':cliente_id' => $cliente_id);

        $query->execute($parameters);

        // fetch() é o método PDO que recebe exatamento um único resultado/registro
        return ($query->rowcount() ? $query->fetch() : false);
    }

    public function update($nome, $email, $cliente_id)
    {
        $sql = 'UPDATE clientes SET nome = :nome, email = :email WHERE id = :cliente_id';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':nome' => $nome, ':email' => $email, ':cliente_id' => $cliente_id);

        $query->execute($parameters);
    }

}

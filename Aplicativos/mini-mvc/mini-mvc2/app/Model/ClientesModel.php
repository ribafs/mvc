<?php
declare(strict_types = 1);
namespace App\Model;

use Core\Connection;

class ClientesModel extends Connection
{ 
    public function todosClientes()
    {
        $sql = 'SELECT id, nome, email FROM clientes ORDER BY id DESC';
        $query = $this->pdo->prepare($sql);
        $query->execute();

        // fetchAll() é o método PDO que recebe todos os registros da tabela, aqui em object-style porque nós definimos isso em
        // Core/Controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...

        return $query->fetchAll();
    }

    public function add($nome, $email)
    {
        $sql = 'INSERT INTO clientes (nome, email) VALUES (:nome, :email)';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':nome' => $nome, ':email' => $email);

        $query->execute($parameters);
    }

    public function delete($cliente_id)
    {
        $sql = 'DELETE FROM clientes WHERE id = :cliente_id';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':cliente_id' => $cliente_id);

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

    public function somaClientes()
    {
        $sql = 'SELECT COUNT(id) AS soma FROM clientes';
        $query = $this->pdo->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->soma;
    }
}

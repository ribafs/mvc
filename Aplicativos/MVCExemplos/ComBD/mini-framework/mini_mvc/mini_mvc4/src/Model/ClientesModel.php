<?php
declare(strict_types = 1);

namespace Mvc\Model;
use Mvc\Core\Model;

class ClientesModel extends Model
{

    public function todosClientes()
    {
        $sql = 'SELECT id, nome, email FROM clientes ORDER BY id DESC';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function somaClientes()
    {
        $sql = 'SELECT COUNT(id) AS contagem FROM clientes';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->contagem;
    }

    public function add($nome, $email)
    {
        $sql = 'INSERT INTO clientes (nome, email) VALUES (:nome, :email)';
        $query = $this->db->prepare($sql);
        $parameters = array(':nome' => $nome, ':email' => $email);
        $query->execute($parameters);
    }

    public function getCliente($cliente_id)
    {
        $sql = 'SELECT id, nome, email FROM clientes WHERE id = :cliente_id LIMIT 1';
        $query = $this->db->prepare($sql);
        $parameters = array(':cliente_id' => $cliente_id);
        $query->execute($parameters);

        return ($query->rowcount() ? $query->fetch() : false);
    }

    public function update($nome, $email, $cliente_id)
    {
        $sql = 'UPDATE clientes SET nome = :nome, email = :email WHERE id = :cliente_id';
        $query = $this->db->prepare($sql);
        $parameters = array(':nome' => $nome, ':email' => $email, ':cliente_id' => $cliente_id);
        $query->execute($parameters);
    }

}

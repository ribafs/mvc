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

}

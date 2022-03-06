<?php
declare(strict_types = 1);

namespace RibaFS\Model;
use RibaFS\Core\Model;

class ClientesModel extends Model
{

    public function todosClientes()
    {
        $sql = 'SELECT id, nome, email FROM clientes ORDER BY id DESC';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function add($nome, $email)
    {
        $sql = 'INSERT INTO customers (name, email, birthday) VALUES (:name, :email, :birthday)';
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':email' => $email, ':birthday' => $birthday);
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

    public function somaClientes()
    {
        $sql = 'SELECT COUNT(id) AS total_clientes FROM clientes';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->total_clientes;
    }
}

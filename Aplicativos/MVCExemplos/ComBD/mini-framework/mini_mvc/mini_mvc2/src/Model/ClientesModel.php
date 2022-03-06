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

}

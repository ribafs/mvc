<?php
declare(strict_types = 1);
namespace Mini\Model;

use Mini\Core\Model;

class ClientesModel extends Model
{   
    /**
     * Get all clientes from database
     */
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

    /**
     * Add a cliente to database
     * @param string $name Name
     * @param string $email E-amil
     * @param string $birthday Birthday
     */
    public function add($nome, $email)
    {
        $sql = 'INSERT INTO clientes (nome, email) VALUES (:nome, :email)';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':nome' => $nome, ':email' => $email);

        $query->execute($parameters);
    }

    /**
     * Delete a Cliente in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $cliente_id Id of Cliente
     */
    public function delete($cliente_id)
    {
        $sql = 'DELETE FROM clientes WHERE id = :cliente_id';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':cliente_id' => $cliente_id);

        $query->execute($parameters);
    }

    /**
     * Get a cliente from database
     * @param integer $cliente_id
     */
    public function umCliente($cliente_id)
    {
        $sql = 'SELECT id, nome, email FROM clientes WHERE id = :cliente_id LIMIT 1';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':cliente_id' => $cliente_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return ($query->rowcount() ? $query->fetch() : false);
    }

    /**
     * Update a cliente in database
     * @param string $name Name
     * @param string $temail E-mail
     * @param string $birthday Birthday
     * @param int $cliente_id Id
     */
    public function update($nome, $email, $cliente_id)
    {
        $sql = 'UPDATE clientes SET nome = :nome, email = :email WHERE id = :cliente_id';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':nome' => $nome, ':email' => $email, ':cliente_id' => $cliente_id);

        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see src/controller/clientes.php for more)
     */
    public function somaClientes()
    {
        $sql = 'SELECT COUNT(id) AS soma FROM clientes';
        $query = $this->pdo->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->soma;
    }
}

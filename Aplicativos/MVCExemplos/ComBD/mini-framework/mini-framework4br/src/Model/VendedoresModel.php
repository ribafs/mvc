<?php
declare(strict_types = 1);
namespace Mini\Model;

use Mini\Core\Model;
use Mini\Libs\Helper;

class VendedoresModel extends Model
{
    /**
     * Get all customers from database
     */
    public function todosVendedores()
    {
        $sql = 'SELECT id, nome, email FROM vendedores ORDER BY id DESC';
        $query = $this->pdo->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...

        return $query->fetchAll();
    }

    /**
     * Add a customer to database
     * @param string $name Name
     * @param string $email E-amil
     * @param string $birthday Birthday
     */
    public function add($nome, $email)
    {
        $sql = 'INSERT INTO vendedores (nome, email) VALUES (:nome, :email)';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':nome' => $nome, ':email' => $email);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Delete a customer in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $customer_id Id of  customer
     */
    public function delete($vendedor_id)
    {
        $sql = 'DELETE FROM vendedores WHERE id = :vendedor_id';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':vendedor_id' => $vendedor_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get a customer from database
     * @param integer $customer_id
     */
    public function umVendedor($vendedor_id)
    {
        $sql = 'SELECT id, nome, email FROM vendedores WHERE id = :vendedor_id LIMIT 1';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':vendedor_id' => $vendedor_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return ($query->rowcount() ? $query->fetch() : false);
    }

    /**
     * Update a customer in database
     * @param string $name Name
     * @param string $temail E-mail
     * @param string $birthday Birthday
     * @param int $customer_id Id
     */
    public function update($nome, $email, $vendedor_id)
    {
        $sql = 'UPDATE vendedores SET nome = :nome, email = :email WHERE id = :vendedor_id';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':nome' => $nome, ':email' => $email, ':vendedor_id' => $vendedor_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/customres.php for more)
     */
    public function somaVendedores()
    {
        $sql = 'SELECT COUNT(id) AS soma FROM vendedores';
        $query = $this->pdo->prepare($sql);
        $query->execute();

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->soma;
    }
}

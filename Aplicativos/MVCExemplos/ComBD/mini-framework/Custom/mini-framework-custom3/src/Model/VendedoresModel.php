<?php

/**
 * Class Vendedores
 *
 */

declare(strict_types = 1);

namespace Mini\Model;

use Mini\Core\Model;
use Mini\Libs\Helper;

class VendedoresModel extends Model
{

    /**
     * Get all Vendedores from database
     */
    public function getAllVendedores()
    {
        $sql = 'SELECT id, nome, email FROM vendedores ORDER BY id DESC';
        $query = $this->db->prepare($sql);
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
        $query = $this->db->prepare($sql);
        $parameters = array(':nome' => $nome, ':email' => $email);

        // UNCOMMENT THE LINE BELOW, useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Delete a Vendedor in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $vendedor_id Id of Vendedor
     */
    public function delete($vendedor_id)
    {
        $sql = 'DELETE FROM vendedores WHERE id = :vendedor_id';
        $query = $this->db->prepare($sql);
        $parameters = array(':vendedor_id' => $vendedor_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get a Vendedor from database
     * @param integer $vendedor_id
     */
    public function getVendedor($vendedor_id)
    {
        $sql = 'SELECT id, nome, email FROM vendedores WHERE id = :vendedor_id LIMIT 1';
        $query = $this->db->prepare($sql);
        $parameters = array(':vendedor_id' => $vendedor_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return ($query->rowcount() ? $query->fetch() : false);
    }

    /**
     * Update a Vendedor in database
     * @param string $nome Nome
     * @param string $email E-mail
     * @param int $vendedor_id Id
     */
    public function update($nome, $email, $vendedor_id)
    {
        $sql = 'UPDATE vendedores SET nome = :nome, email = :email WHERE id = :vendedor_id';
        $query = $this->db->prepare($sql);
        $parameters = array(':nome' => $nome, ':email' => $email, ':vendedor_id' => $vendedor_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/vendedores.php for more)
     */
    public function getAmountOfVendedores()
    {
        $sql = 'SELECT COUNT(id) AS amount_of_vendedores FROM vendedores';
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result

        return $query->fetch()->amount_of_vendedores;
    }
}

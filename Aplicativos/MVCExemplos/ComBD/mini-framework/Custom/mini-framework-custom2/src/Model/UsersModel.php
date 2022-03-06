<?php

/**
 * Class Users
 *
 */

declare(strict_types = 1);

namespace Mini\Model;

use Mini\Core\Model;
use Mini\Libs\Helper;

class UsersModel extends Model
{

    /**
     * Get all Users from database
     */
    public function getAllUsers()
    {
        $sql = 'SELECT id, login, senha FROM users ORDER BY id DESC';
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
     * @param string $login Login
     * @param string $senha Senha
     */
    public function add($login, $senha)
    {
        $sql = 'INSERT INTO users (login, senha) VALUES (:login, :senha)';
        $query = $this->db->prepare($sql);
        $parameters = array(':login' => $login, ':senha' => $senha);

        // UNCOMMENT THE LINE BELOW, useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Delete a User in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $user_id Id of User
     */
    public function delete($user_id)
    {
        $sql = 'DELETE FROM users WHERE id = :user_id';
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get a User from database
     * @param integer $user_id
     */
    public function getUser($user_id)
    {
        $sql = 'SELECT id, login, senha FROM users WHERE id = :user_id LIMIT 1';
        $query = $this->db->prepare($sql);
        $parameters = array(':user_id' => $user_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return ($query->rowcount() ? $query->fetch() : false);
    }

    /**
     * Update a User in database
     * @param string $login Login
     * @param string $senha Senha
     * @param int $user_id Id
     */
    public function update($login, $senha, $user_id)
    {
        $sql = 'UPDATE users SET login = :login, senha = :senha WHERE id = :user_id';
        $query = $this->db->prepare($sql);
        $parameters = array(':login' => $login, ':senha' => $senha, ':user_id' => $user_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/users.php for more)
     */
    public function getAmountOfUsers()
    {
        $sql = 'SELECT COUNT(id) AS amount_of_users FROM users';
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result

        return $query->fetch()->amount_of_users;
    }
}

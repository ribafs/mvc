<?php
declare(strict_types = 1);

namespace RibaFS\Model;
use RibaFS\Core\Model;

class CustomersModel extends Model
{

    public function todosCustomers()
    {
        $sql = 'SELECT id, name, email, birthday FROM customers ORDER BY id DESC';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function add($name, $email, $birthday)
    {
        $sql = 'INSERT INTO customers (name, email, birthday) VALUES (:name, :email, :birthday)';
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':email' => $email, ':birthday' => $birthday);
        $query->execute($parameters);
    }

    public function delete($customer_id)
    {
        $sql = 'DELETE FROM customers WHERE id = :customer_id';
        $query = $this->db->prepare($sql);
        $parameters = array(':customer_id' => $customer_id);

        $query->execute($parameters);
    }

    public function getCustomer($customer_id)
    {
        $sql = 'SELECT id, name, email, birthday FROM customers WHERE id = :customer_id LIMIT 1';
        $query = $this->db->prepare($sql);
        $parameters = array(':customer_id' => $customer_id);
        $query->execute($parameters);

        return ($query->rowcount() ? $query->fetch() : false);
    }

    public function update($name, $email, $birthday, $customer_id)
    {
        $sql = 'UPDATE customers SET name = :name, email = :email, birthday = :birthday WHERE id = :customer_id';
        $query = $this->db->prepare($sql);
        $parameters = array(':name' => $name, ':email' => $email, ':birthday' => $birthday, ':customer_id' => $customer_id);
        $query->execute($parameters);
    }

    public function somaCustomers()
    {
        $sql = 'SELECT COUNT(id) AS total_customers FROM customers';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->total_customers;
    }
}

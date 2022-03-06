<?php

/**
 * Description of Model
 *
 * @author Samuelson
 */
class Model {

    protected $db;
    protected $table = '';
    protected $stmt;
    protected $result;

    public function __construct() {
        global $db;
        $this->db = $db;
        $this->table = (string) $this->table;
        
    }

    public function insert(array $data) {
        $fields = implode(', ', array_keys($data));
        $places = ':' . implode(', :', array_keys($data));
        $sql = "INSERT INTO {$this->table} ({$fields})VALUES({$places})";
        try {
            $this->stmt = $this->db->prepare($sql);
            $this->stmt->execute($data);
            $this->result = $this->db->lastInsertId();
            return $this->result;
        } catch (PDOException $ex) {
            echo "Erro ao inserir: {$ex->getMessage()}";
            exit;
        }
    }

    public function update(array $data, $terms, $parseString) {
        parse_str($parseString, $parseString);
        foreach ($data as $key => $value){
            $fields[] = $key . ' = :' . $key;
        }

        $fields = implode(', ', $fields);

        $sql = "UPDATE {$this->table} SET {$fields} {$terms}";
        
        try {
            $this->stmt = $this->db->prepare($sql);
            $this->stmt->execute(array_merge($data, $parseString));
            $this->result = true;
            return $this->result;
        } catch (PDOException $ex) {
            echo "Erro ao atualizar: {$ex->getMessage()}";
            exit;
        }
    }

    public function delete($terms, $parseString) {
        $sql = "DELETE FROM {$this->table} {$terms}";
        parse_str($parseString, $parseString);
        try {
            $this->stmt = $this->db->prepare($sql);
            $this->stmt->execute($parseString);
            return true;
        } catch (PDOException $ex) {
            echo "Erro ao inserir: {$ex->getMessage()}";
            exit;
        }
    }

    public function select($query = null, $parseString = null) {
        if ($query) {
            $sql = (string) $query;
        } else {
            $sql = "SELECT * FROM {$this->table}";
        }

        try {
            $this->stmt = $this->db->prepare($sql);
            $this->parseSelect($parseString);
            $this->stmt->setFetchMode(PDO::FETCH_ASSOC);
            $this->stmt->execute();
            $result = $this->stmt->fetchAll();
            return $result;
        } catch (PDOException $ex) {
            echo "Erro ao fazer select: {$ex->getMessage()}";
            exit;
        }
    }

    private function parseSelect($parseString) {
        if ($parseString) {
            parse_str($parseString, $parseString);
            foreach ($parseString as $alience => $value) {
                if ($alience == 'limit' || $alience == 'offset') {
                    $value = (int) $value;
                }
                $this->stmt->bindValue(":{$alience}", $value, (is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR));
            }
        }
    }

}

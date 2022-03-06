<?php

namespace Mvc\Model;

class Model 
{

	private $host = 'localhost';
	private $db   = 'testes';
	private $user = 'root';
	private $pass = 'root';
	public  $pdo;

    public function __construct(){
		try {
			$dsn = 'mysql:host='.$this->host.';dbname='.$this->db;
			$this->pdo = new \PDO($dsn, $this->user, $this->pass);
			$this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES,false);

			$this->pdo->query('SET NAMES utf8');
			return $this->pdo;
		}catch(\PDOException $e){
			echo '<b>Mensagem</b>: '. $e->getMessage().'<br>';
		}
    }

    public function listar(){
            $stmte = $this->pdo->query("SELECT * FROM usuarios order by id");
            $executa = $stmte->execute();
            $result = $stmte->fetchAll(\PDO::FETCH_OBJ);
            return $result;
    }
}


<?php

namespace App;

class Connection
{
	private $host  = 'localhost';
	private $db    = 'testes';
	private $user  = 'root';
	private $pass  = 'root';

	public  $pdo;

    public function __construct(){

		try {
			$dsn = 'mysql:host='.$this->host.';dbname='.$this->db;
			$this->pdo = new \PDO($dsn, $this->user, $this->pass);  // PDO tem \ pois não está neste namespace

			$this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES,false);
			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);

			$this->pdo->query('SET NAMES utf8');
			return $this->pdo;

		}catch(PDOException $e){
            // Usar estas linhas no catch apenas em ambiente de testes/desenvolvimento. Em produção apenas o exit()
			echo '<br><br><b>Código</b>: '.$e->getCode().'<hr><br>';
			echo '<b>Mensagem</b>: '. $e->getMessage().'<br>';
			echo '<b>Arquivo</b>: '.$e->getFile().'<br>';
			echo '<b>Linha</b>: '.$e->getLine().'<br>';
			exit();
		}
    }
}


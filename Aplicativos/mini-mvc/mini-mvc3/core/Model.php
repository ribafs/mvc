<?php
declare(strict_types = 1);
namespace Core;

use Core\Connection;
use PDO;
use PDOException;

class Model
{ 

    // Como o PHP não permite ehrança múltipla então incorporei a classe Connection aui na Model
    private $table = '';
    public $pdo = null;

    /**
     * Onde o model é criado. Uma conexão com o banco de dados é aberta.
     */
    function __construct($table)
    {
        $this->table = $table;
        try {
            self::openDb();
        } catch ( PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Abrir a conexão com o banco de dados comm as credenciais de src/config.php
     */
    private function openDb()
    {
        // Configurar (opcional) as opções para a conexão PDO. Neste caso, Nós configuramos o fetch mode para
        // "objects", o que significa que todos os resultados serão objetos, como este: $result->user_name !
        // Por exemplo, fetch mode FETCH_ASSOC deve retornar resultados como este: $result["user_name] !
        // @see http://www.php.net/manual/en/pdostatement.fetch.php
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

		// TODO - Criar uma classe singleton para o Model
        // Gerar uma conexão ao banco de dados, usando o conector PDO
        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
		$dsn = DB_TYPE . ':host=' . DB_HOST . ';port ='. DB_PORT . ';dbname=' . DB_NAME;// . $databaseEncodingenc;
        $this->pdo = new PDO($dsn , DB_USER, DB_PASS, $options);
    }

    // Agora este três métodos abaixo não são criados sempre que se cria um novo crud, mas apenas herdados pelos novos models
    public function todosRegs()
    {
        $sql = 'SELECT * FROM '.$this->table.' ORDER BY id DESC';
        $query = $this->pdo->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function delete($field_id)
    {
        $sql = 'DELETE FROM '.$this->table.' WHERE id = :field_id';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':field_id' => $field_id);

        $query->execute($parameters);
    }

    public function somaRegs()
    {
        $sql = 'SELECT COUNT(id) AS soma FROM '.$this->table;
        $query = $this->pdo->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->soma;
    }
}

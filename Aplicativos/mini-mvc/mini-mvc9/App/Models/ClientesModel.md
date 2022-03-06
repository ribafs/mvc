# Classe App\Models\ClientesModel

```php
<?php
declare(strict_types = 1);
namespace App\Models;

use Core\Model; // Incluirá a classe Core\Model, pois iremos usá-la

class ClientesModel extends Model // Extende Core\Model
{ 

    private $table = '';

    /**
     * Onde o model é criado. Uma conexão com o banco de dados é aberta.
     */
    function __construct($table) // Indica que esta classe quando for instanciada precisará receber a tabela como parâmetro
    {
        $this->table = $table;
        parent::__construct($this->table);// Chamar o construtor da classe pai, assim inicializa propriedades e métodos da classe pai
    }

    public function add($nome, $email) // Recebe os campos do form para inserir na tabela
    {
        $sql = "INSERT INTO clientes (nome, email) VALUES (:nome, :email)";// String SQL
        $query = $this->pdo->prepare($sql); // Preparação da string SQL
        $parameters = array(":nome" => $nome, ":email" => $email); // Armazena os dados como parâmetro

        $query->execute($parameters); // Executa a consulta
    }

    public function umReg($field_id) // Devolver um único registro, passando o $field_id
    {
        $sql = 'SELECT id, nome, email FROM clientes WHERE id = :field_id LIMIT 1';// String SQL
        $query = $this->pdo->prepare($sql); // Preparando
        $parameters = array(':field_id' => $field_id);// Parâmetro

        $query->execute($parameters); // Execução

        // fetch() é o método PDO que recebe exatamento um único resultado/registro
        return ($query->rowcount() ? $query->fetch() : false); // Retorna a soma de registros
    }

    public function update($nome, $email, $field_id) // Para atualizar recebe os campos do form mais $field_id
    {
        $sql = 'UPDATE clientes SET nome = :nome, email = :email WHERE id = :field_id'; // String SQL
        $query = $this->pdo->prepare($sql); // Preparação
        $parameters = array(':nome' => $nome, ':email' => $email, ':field_id' => $field_id); // Parâmetro

        $query->execute($parameters); // Executando
    }
}
```

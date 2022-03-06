<?php
declare(strict_types = 1);
namespace Mini\Model;

use Mini\Core\Model;

class ProdutosModel extends Model
{
    /**
     * Get all products from database
     */
    public function todosProdutos()
    {
        $sql = 'SELECT id, nome, descricao, unidade FROM produtos ORDER BY id DESC';
        $query = $this->pdo->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...

        return $query->fetchAll();
    }

    /**
     * Add a product to database
     * TODO put this explanation into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $name Name
     * @param string $email E-amil
     * @param string $birthday Birthday
     */
    public function add($nome,$descricao, $unidade)
    {
        $sql = 'INSERT INTO produtos (nome, descricao, unidade) VALUES (:nome, :descricao, :unidade)';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':nome' => $nome, ':descricao' => $descricao, ':unidade' => $unidade);

        $query->execute($parameters);
    }

    /**
     * Delete a product in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $product_id Id of  product
     */
    public function delete($produto_id)
    {
        $sql = 'DELETE FROM produtos WHERE id = :produto_id';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':produto_id' => $produto_id);

        $query->execute($parameters);
    }

    /**
     * Get a product from database
     * @param integer $product_id
     */
    public function umProduto($produto_id)
    {
        $sql = 'SELECT id, nome, descricao, unidade FROM produtos WHERE id = :produto_id LIMIT 1';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':produto_id' => $produto_id);

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return ($query->rowcount() ? $query->fetch() : false);
    }

    /**
     * Update a product in database
     * // TODO put this explaination into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $name Name
     * @param string $temail E-mail
     * @param string $birthday Birthday
     * @param int $product_id Id
     */
    public function update($nome, $descricao, $unidade, $produto_id)
    {
        $sql = 'UPDATE produtos SET nome = :nome, descricao = :descricao, unidade = :unidade WHERE id = :produto_id';
        $query = $this->pdo->prepare($sql);
        $parameters = array(':nome' => $nome,':descricao' => $descricao, ':unidade' => $unidade, ':produto_id' => $produto_id);

        $query->execute($parameters);
    }

    /**
     * Get simple "stats".
     */
    public function somaProdutos()
    {
        $sql = 'SELECT COUNT(id) AS soma FROM produtos';
        $query = $this->pdo->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result

        return $query->fetch()->soma;
    }
}

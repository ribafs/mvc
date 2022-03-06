<?php
declare(strict_types = 1);

namespace Core;

use App\Model\ClientesModel;
use Core\Model;

class Controller
{
    public $table = null;

    public function __construct($table='clientes'){
      $this->table = $table;
    }

    /**
     * ACTION: index
     * Este método/action manipula o que acontece quando você move para http://localhost/Mini-fw2/clientes/index
     */
    public function index()
    {
		// View clientes/index envia request para o Router, este envia um request para ClientesContoller/index, este envia request para
        // o model ClientesModel/todosClientes, este responde para ClientesContoller/index, este responde para a View clientes/index finalmente
        // Instance new Model (ClientesModel)
        $Obj = new Model($this->table);
        // Receber todos os clientes do model na variável $todos
        // Recebe a soma de clientes do model na variável $soma para enviar para a view clientes/index, $otos e $soma
        $todos = $Obj->todosRegs(); // Todos os clientes e seus dados
        $soma = $Obj->somaRegs();// Total de clientes, a soma

        // Carregar a view. Com as views nós podemoms mostrar $todos e a soma facilmente
        require_once APP . 'View/_includes/header.phtml';
        require_once APP . 'View/'.$this->table.'/index.phtml';
        require_once APP . 'View/_includes/footer.phtml';
    }

    /**
     * ACTION: delete
     * Este método manipula tudo que acontece quando você move para http://localhost/Mini-framework2/clientes/delete
     * IMPORTANTE: Esta não é uma página normal, é um ACTION. Isto é para onde o botão "delete a cliente" no clientes/index
     * direciona o usuário após o clique. Este método manipula todos os dados da requisição GET (na URL!) e então
     * redireciona o usuário de volta para clientes/index através da última linha: header(...)
     * Este é um exemplo de como manipular uma requisição do tipo GET.
     * @param int $cliente_id Id of the to-delete cliente
     */
    public function delete($field_id)
    {
		// View clientes/index envia request para o Router, este envia um request para ClientesContoller/delete, este envia um request 
        // para o model ClientesModel/delete, este envia uma resposta para ClientesContoller/delete, este envia uma resposta/redirect para
        // a View clientes/index finalmente

        // Se temos um id de um cliente que deve ser excluído
        if (isset($field_id)) {
            // Instance new Model (ClientesModel)
            $Obj = new Model($this->table);
            // e executa delete() in Model/ClientesModel.php passando $cliente_id
            $Obj->delete($field_id);
        }

        // Para onde ir após a exclusão do cliente
        header('location: ' . URL . $this->table.'/index');
    }

}

<?php
declare(strict_types = 1);

namespace App\Controller;

use App\Model\VendedoresModel;
use Core\Model;

class VendedoresController
{
    /**
     * ACTION: index
     * Este método/action manipula o que acontece quando você move para http://localhost/Mini-fw2/clientes/index
     */
    public function index()
    {
		// View clientes/index envia request para o Router, este envia um request para ClientesContoller/index, este envia request para
        // o model ClientesModel/todosClientes, este responde para ClientesContoller/index, este responde para a View clientes/index finalmente
        // Instance new Model (ClientesModel)
        $Obj = new Model('vendedores');
        // Receber todos os clientes do model na variável $todos
        // Recebe a soma de clientes do model na variável $soma para enviar para a view clientes/index, $otos e $soma
        $todos = $Obj->todosRegs(); // Todos os clientes e seus dados
        $soma = $Obj->somaRegs();// Total de clientes, a soma

        // Carregar a view. Com as views nós podemoms mostrar $todos e a soma facilmente
        require_once APP . 'View/_includes/header.phtml';
        require_once APP . 'View/vendedores/index.phtml';
        require_once APP . 'View/_includes/footer.phtml';
    }

    /**
     * ACTION: add
     * Este método controla o que acontece quando você move para http://localhost/Mini-framework2/clientes/add
     * IMPORTANTE: Esta não é uma página normal, ela é um ACTION. Ela é onde o form "add a cliente" no clientes/index
     * direciona o usuário após o submit do form. Este método manipula todos os dados do tipo POST do form e então redireciona
     * o usuário de volta para clientes/index via última linha: header(...)
     * Este é um exemplo de como manipular uma requisição POST.
     */
    public function add()
    {
        // Se temos dados POST para criar uma nova entrada de cliente, se o button 'submit_add_cliente' na view clientes/add tiver sido clicado
        // Instancia o model e passa as variáveis recebidas do form em add.php para o add() do model
        if (isset($_POST['submit_add_vendedor'])) {
            // Instance new Model (ClientesModel)
            $Obj = new VendedoresModel('vendedores');
            // Execute add() in Model/ClientesModel.php
            $Obj->add($_POST['nome'], $_POST['email']);
	        // Onde ir após Cliente ser adicionado
	        header('location: ' . URL . 'vendedores/index');	
        }

        // Carregar views.
        require_once APP . 'View/_includes/header.phtml';
        require_once APP . 'View/vendedores/add.phtml';
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
            $Obj = new Model('vendedores');
            // e executa delete() in Model/ClientesModel.php passando $cliente_id
            $Obj->delete($field_id);
        }

        // Para onde ir após a exclusão do cliente
        header('location: ' . URL . 'vendedores/index');
    }

     /**
     * ACTION: edit
     * Este método controla o que acontece quando você move para http://localhost/Mini-framework2/clientes/edit
     * @param int $cliente_id Id of the to-edit cliente
     */
    public function edit($field_id)
    {
        // Se temos um id de um cliente que deve ser editado
        if (isset($field_id)) {
            // Instance new Model (ClientesModel) e recebe os métodos todosClientes() e umCliente()
            $Obj = new Model('vendedores');
            $Obj2 = new VendedoresModel('vendedores');
            $todos = $Obj->todosRegs();

            // do umCliente() in Model/ClientesModel.php
            $um = $Obj2->umReg($field_id);

            // Se clientes não foi encontrado, então isto deve retornar false, e precisamos mostrar a página de erro
            if ($um === false) {
                $page = new \Core\ErrorController();
                $page->index();
            } else {
                // Carregar view clientes, passando as variáveis $todos e $um
                require_once APP . 'View/_includes/header.phtml';
                require_once APP . 'View/vendedores/edit.phtml';
                require_once APP . 'View/_includes/footer.phtml';
            }
        } else {
            // Redirecionar usuário para a página clientes/index (por que nós não temos um cliente_id)
            header('location: ' . URL . 'vendedores/index');
        }
    }

    /**
     * ACTION: update
     * Este método controla o que acontece quando você move para http://localhost/Mini-framework2/clientes/update
     * IMPORTANTE: Esta não é uma página  normal, é um ACTION. Isto é onde o botão "update a cliente" do form em clientes/edit
     * direciona o usuário após o submit do form. Este método manipula todos os dados POST do form e então redireciona
     * o usuário de volta para clientes/index através da última linha: header(...)
     * Isto é um exemplo de como manipular uma requisição tipo POST.
     */
    public function update()
    {
        // Se temos dados tipo POST para atualizar um cliente
        if (isset($_POST['submit_update_vendedor'])) {
            // Instance new Model (ClientesModel)
            $Obj = new VendedoresModel('vendedores');
            // E chama o método update() do Model/ClientesModel.php passando os valores recebidos do form
            $Obj->update($_POST['nome'], $_POST['email'], $_POST['field_id']);
        }

        // Após atualizar ele volta para clientes/index
        header('location: ' . URL . 'vendedores/index');
    }
}

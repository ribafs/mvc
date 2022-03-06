## Fluxo das informações no aplicativo mini-framework2br

Considerarei apenas Clientes

- Para chegar ao clientes/index.php percorremos:

- Inicialmente digitamos pela URL no navegador:
    http://backup/mini-framework3br/    neste caso será assumido o controller default ClientesController e o action default index, que podem ser
    setados no src/config.php, o que torna semelhante a ter digitado http://backup/mini-framework3br/clientes/index. Este formato, com as barras
    finais é oferecido pelo roteador e pelos .htaccess

    Bem, chamando esta URL o que acontece?
    - O .htaccess do raiz receberá sua solicitação e encaminhará para o /public
    - O .htaccess receberá e passará para o /public/index.php
    - O /public/index.php passará a responsabilidade para o /src/bootstrap.php
    - O /src/bootstrap.php carregará o /src/config.php chamará/instanciará o Router.php
    - O Router, simplificando, verificará se foi digitado um controller e um action válidos, então instancia o controller e o chama com o action,
    - O ClientesController recebendo o ahcmado, exatamente em seu action index(), instancia o model respectivo, no caso o ClientesModel e chama
    dois de seus métodos todosClientes() e somaClientes() e guarda nas variáveis $todos e $soma. Então instancia a view respectiva, no caso a
    ClientesView e chama seu método render() passando a view, no caso clientes, o arquivo, no caso index e as duas variáveis $todos e $soma
    - A ClientesView recebe o pedido e se encarrega via require_once de chamar a view clientes/index passando $todos e $soma para ela
    - Finalmente a view /src/templates/clientes/index é aberta no navegador carregada de registros que nos são trazidos pelo model

- Com o aplicativo aberto no navegador existe um link no menu de topo para Clientes, que se for clicado corresponde a chama a URL
    http://backup/mini-framework3br/clientes/index e então se repetirão todos estes caminhos

- Fluxo para a view clientes/add
    Quando clicamos no link Add Cliente em clientes/index é como se chamássemos pela URL
    http://backup/mini-framework3br/clientes/add

    Então o que acontece?
    - Quem primeiro é solicitado é o Router, que verifica a existência do controller/action. Se válidos passa para o action do controller
    solicitados
    - O Router passa para ClientesController/add
    - Veja que o name do submit de clientes/add.php é submit_add_cliente
    - Agora vejamos o action respectivo do ClientesController, que é o add(). Sua primeira ação é verificar se $_POST['submit_add_cliente'] está
    setado. Se sim ele instancia o respectivo ClientesModel e chama seu respectivo método add() passando para ele via POST os campos do form
    Terminado seu serviço ele devolve a atenção para a clientes/index e estamos novamente com esta tela na nossa frente.

- Fluxo para a view clientes/edit
    Quando clicamos no link Edit à direita de um registro em clientes/index é como se chamássemos pela URL
    http://backup/mini-framework3br/clientes/edit/4 (4 pode ser qualquer id dos clientes)

    Então o que acontece?
    - Quem primeiro é solicitado é o Router, que verifica a existência do controller/action. Se válidos passa para o action do controller
    solicitados
    - O Router passa para ClientesController/edit
    - Veja que em clientes/edit.php temos um campo oculto chamado "cliente_id" cujo value é o id do clienteNão temos um form para update, apenas
    para edit, mas temos métodos update() tanto no controller quanto no model.
    - Agora vejamos o action respectivo do ClientesController, que é o edit(). Sua primeira ação é verificar se $cliente_id está setado. Se não ele
    chama de volta clientes/index. Se sim ele instancia o respectivo ClientesModel e chama seu método todosClientes() e o armazena na variável
    $todos. Então ele chama o método umCliente() do ClientesModel e armazena na variável $um. Ele verifica se $um existe. Se não chama o controller 
    de erro. Se sim instancia a classe ClientesView e a guarda em $view e chama seu método render() assim:
    $view->render('clientes','edit',$todos, '',$um)
    Com isso finalizamos o percurso do método clientes/edit

- Complemento do edit, no caso update
    - Quando preenchemos o form em clientes/edit e clicamos no submit com nome ubmit_update_cliente, quem está esperando este comando é o 
    ClientesController em seu action update(). Primeiro verifica se $_POST['submit_update_cliente'] está setado, cria uma instância do 
    ClientesModel e guarda em Clientes, então chama o método update do ClientesModel assim:
    $Cliente->update($_POST['nome'], $_POST['email'], $_POST['cliente_id']). Veja que temos os dois campos do form, que correspondem à tabela
    no  banco e o campo oculto do form clientes/edit, que foi visto no action edit(). Finalmente ele devolve para clientes/index

- Fluxo para a view clientes/delete
    - Quem primeiro é solicitado é o Router, que verifica a existência do controller/action. Se válidos passa para o action do controller
    solicitados
    - O delete também não tem um form para ele.
    - Tanto podemos excluir clicando no link delete na view clientes/index, como também chamando pela URL, assim:
    http://backup/mini-framework3br/clientes/delete/5   (qualquer id válido)
    - O Router passa para ClientesController/delete que recebe a solicitação e verifica se a variável $cliente_id está setada. Se sim ele cria
    uma instância de ClientesModel e a guarda em $Cliente, então ele solicita ao ClientesModel que faça a exclusão com:
    $Cliente->delete($cliente_id) e devolve o fluxo para clientes/index



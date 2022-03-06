# Rastreando bugs

Ao tentar implementar o CRUD aconteceram muitos problemas que tive que corrigir. Então resolvi documentar isso.

Para rastrear um bug precisamos saber o caminho das informações. Sai de um arquivo para outro arquivo. E vamos pesquisando áreas que consideramos prováveis de estar causando o problema. Gosto de executar um

print_r($nomeVarOuObjeto);

## Caminho das informações no mvc-7

Tudo começa assim
- .htaccess
- public/index.php 
    - inclui o autoload e o config.php
    - Então instancia o Router
- Core/Router.php
    - Aqui encaminha por padrão paraa o ClientController, action index(). 
- No ClientController/index()
    - Recebe os clientes do ClientModel e os passa para a view clients/index
- A view clients/index:
    - Mostra a listagem de clients, com um form para adicionar um novo cliente e links para editar ou excluir cada cliente
- Na view clients/index, poderá clicar para ir ao products
- Adicionar um novo cliente
    - Estando em clients/index.php preencher os dados e clicar em Adicionar
    - Ele vai ao ClientController/add
    - Recebendo os dados o ClientController verifica se foi clicado no botão com name submit_add_client
    - Se sim ele instancia o ClientModel e passa para seu método add o nome e a idade recebidos
    - O ClientModel executa a consulta do seu método add
    - Então o ClientController redireciona de volta para a view clients/index
- Editar registro
    - Estando em clients/index, clicar no link Editar do registro delejado
    - Será enviado para ClientController/edit

    - O controller verifica se o id tá setado
    - Se sim ele instancia o ClientModel
    - Então chama o método edit do model passando para ele o id recebido da view

    - O model executa a consulta e devolve/return o resultado para o ClientController

    - p ClientController verifica se o queu foi retornado do model é válido.
    - Se não dispara o ErrorController

    - Se for válido o retorno do model, então chama a view clients/edit passando para ela o que recebeu do model
    - A clients/edit é aberta com o registro num form para edição.
    - Após efetuar alterações e clicar em Atualizar será enviado para o ClientController/update

    - Então o update verifica se as informações estão vindo do form com submit com name "submit_update_client" e via POST
    - Se sim ele instancia o ClientModel e passa os valores recebidos para o método update do model
    - 


- clients/index.php - por default este é o arquivo mostrado quando chamamos: http://localhost/mvc-7

## Corrigir a exclusão

Não está funcionando. Nem mostra nada na tela, apenas volta novamente para clients/index.php

Como a chamada para delete() começa no clients/index.php, vou lá dar uma olhada.

Precisamos pensar com racionalidade nestas horas. Exemplo:

- No clients/index.php estão chegando todos os registros da tabela clients bonitinho, então não devemos suspeitar de $id, que é passado para o delete.
- Precisamos ir em frente. Do index.php ele volta para o ClientController, para executar o método delete(). Vejamos

No método delete

    public function delete($id)
    {
        if (isset($id)) {
            $client = new ClientModel();
            $client->delete($id);
exit;
        }
        header('location: ' . URL . 'clients/index');
    }
Para seber que de fato ele volta para cá, então insito um exit; abaixo de $client->delete($id); Volto para o clients/index.php e clico em um link Excluir. Então a tela fica em branco, o que mostra que passou por aqui. Vejamos então o método delete() do ClientModel
No método delete() do model, adicionei abaixo da linha
        $parameters = array(':id' => $id);
include 'd.php';
d($parameters);

Veja o que me retornou

Array
(
    [:id] => 
)

Assim também, sem id não pode rolar. Descobrimos o problema. Agora como resolver. Por que o id não chegou aqui. Vejamos se ele chega no controller.

        if (isset($id)) {
            $client = new ClientModel();
            $client->delete($id);
        }
include 'd.php';
d($id);

Nada. O que diz a primeira linha? Que somente processará o que tem abaixo se $id estiver setado.

Outra forma que gosto de usar é inserir um 

print "Qualquer coisa";exit;

Em linhas onde suspeito que exista o problema

Exemplo. Já sei mas para mostrar. No delete() do controller:

    public function delete($id)
    {
print "Qualquer coisa";exit;
        if (isset($id)) {
E chamo o clients/index.php

A tela parada com a frase. Até aqui ok.

Agora faço

    public function delete($id)
    {
        if (isset($id)) {
print "Qualquer coisa";exit;

Também ok. Mas agora

    public function delete($id)
    {
        if (isset($id)) {
print "ID".$id;exit;

Como já era esperado mostrou apenas:

ID

O id parece estar saindo de clients/index.php mas não está chegando ao controller.

## Master Details

Acabei criando uma aplicação do tipo master-details. Uma beleza.



# Aplicativo simples em PHP usando MVC com PDO

## Criar um aplicativo com a arquitetura MVC usando o mini3:
https://github.com/panique/mini3

Este aplicativo usa 3 tabelas, clientes, produtos e vendedores.

## Nesta versão
Agora irei ajustar o Libs/helper.php para debugar o PDO. Comecei renomeando para inicial maiúscula: Helper.php
Para checar o PDO apenas descomente a linha respectiva no método do Model.
Habilitei apenas no model ClientesModel. Para habilitar nos demais precisa inserir o use no início do model:
use Mini\Libs\Helper;

#Tradução dos comentários
Estarei traduzindo os ótimos comentários do original mini3 nesta aplicação para facilitar a quem tenha alguma dificuldade com o inglês. Farei a tradução apenas de clientes, pois os outros dois são idênticos.
Esta versão está inteiramente com os comentários traduzidos, o que já deve ajudar a compreender o aplicativo.

Estarei traduzindo prpaticamente todos os arquivos mas focando apenas no Clientes: controller, model e view. Os demais (produtos e vendedores são semelhantes).

## Recurso Extra
Usa o software https://github.com/panique/pdo-debug para melhorar as mensagens de erro do PDO.

## Roteamento - URL traduzem para controllers

http://localhost/cadastro   - abre o controller default, que é o Home
http://localhost/cadastro/clientes - abre o controller Clientes/index
http://backup/mini-mvc2/clientes/edit/2 - abre o cliente 2 para edição
http://backup/mini-mvc2/clientes/add - abre o clientes/index por que o form add está no clientes/index
http://backup/mini-mvc2/clientes/delete/2 - exclui o cliente cm id 2
http://localhost/cadastro/funcionarios - abre o controller Funcionarios
http://localhost/cadastro/produtos - abre o Produtos

## Licença

Este projeto está sob a licença MIT.
Isto significa que você pode usar e modificar ele livremente para projetos pessoais e comerciais, apenas preservando o crédito dos autores.

## Original

Detalhes no repositório original:
https://github.com/panique/mini3

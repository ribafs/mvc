# Aplicativo simples em PHP usando MVC com PDO

## Criar um aplicativo com a arquitetura MVC usando o mini3:
https://github.com/panique/mini3

Este aplicativo usa 3 tabelas, clientes, produtos e vendedores.

#Tradução dos comentários
Estarei traduzindo os ótimos comentários do original mini3 nesta aplicação para facilitar a quem tenha alguma dificuldade com o inglês. Farei a tradução apenas de clientes, pois os outros dois são idênticos.

Irei traduzir praticamente todos os comentários de todos os arquivos:

- .htaccess
- /public/.htaccess
- /public/index.php
- /src/config.php
- /src/bootstrap.php
- /src/Controller/ClientesController.php
- /src/Controller/ErrorController.php
- /src/Core/Model.php
- /src/Core/Router.php
- /src/Model/ClientesModel.php
- /src/View/ClientesView.php (alias, criada por mim)
- /src/templates/clientes: add, edit e index
- /src/templates/_includes/header.php
- /src/templates/error/index.php

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

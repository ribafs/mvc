# Aplicativo simples em PHP usando MVC com PDO

## Criar um aplicativo com a arquitetura MVC usando o mini3:
https://github.com/panique/mini3

Este aplicativo usa 3 tabelas, clientes, produtos e vendedores.

## Nesta versão
Estarei apenas alterando/otimizando a ClientesView.php para que conenha apenas um único método, visto que todos os métodos são idẽnticos.
Mas alterei apenas o de ClientesView e do respectivo ClientesController e deixarei os outros dois (produtos e vendedores) como estavam, para que você possa verificar a diferença e que sempre devemos visar estas otimizações.

Também irei renomear a constante APP para SRC que é mais adequada:

Éstá assim:
define('APP', ROOT . 'src' . DIRECTORY_SEPARATOR);

Ficará assim:
define('SRC', ROOT . 'src' . DIRECTORY_SEPARATOR);

Para isso preciso ajustar em alguns arquivos que a estão usando.

#Tradução dos comentários
Estarei traduzindo os ótimos comentários do original mini3 nesta aplicação para facilitar a quem tenha alguma dificuldade com o inglês. Farei a tradução apenas de clientes, pois os outros dois são idênticos.

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

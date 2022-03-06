## Entendendo o Router do mini3

No mini3 esta classe chamava-se application.

Ao meu ver esta é a peça de código mais compelxa do aplicativo, portanto tentarei clarear um pouco.

Veja que criei 3 versões simplificadas partindo da original Router.php.

A chasse Router no mini3 é composta de 2 métodos o splitUrl() e o __construct().

A splitUrl recebe a URL bruta via GET e quebra a URL recebida em partes:
url[0] - a primeira parte após o endereço do aplicativo, que é o controller
url[1] - é o action
url[3] - parâmetros

No __construct ele chama o splitUrl() e começa a testar se os valores recebidos pela URL batem com os controllers e actions existentes.

Primeiro if ele testa se o constroller da URL não existe. Neste caso ele chama o controller default.

    Então caso o controller passado pela URL exista, ele o instancia e o chama com com seu action e parâmetros

    Caso exista o controller mas não exista nenhum action então ele chama o action default com o controller selecionado.

    Caso o action não exista chame o ErrorController com seu index()

Ao final, caso o controller não exista chama o ErrorController com seu index() mostrando as informações sobre o erro.

## Tutorial sobre a criação de um aplicativo em PHP com MVC do Zero

- Um mini fframework do zero
- De forma prática (não aborda assuntos teóricos)
- Com duas tabelas, customers e products e 3 pacotes de terceiros instalados
- No diretório /var/www/html
- mkdir mvc_zero

O código do aplicativo é bem documentado, ajudando o enendimento.

### Recursos principais deste aplicativo:

- PHP
- Convenção para nomes de arquivos, classes, métodos e propriedades, tabelas, campos, etc
- PDO
- MVC
- Roteamento
- Isolamento do código do applicativo do servidor web
- Namespace
- Composer
- PSR-4
- .htaccess
- migrations com phinx
- Geração de dados faker
- Tratamento de erros com o pacote whoops
- Bons padões de codificação
- BootStrap 4 com Busca nas views (a serem implementados)
- Outros recursos/pacotes podem ser adicionados com facilidade

## Histórico

A intenção é de ser o ponto de partida para se compreender a criação de um aplicativo em PHP usando MVC.

Tutorial sobre a criação de um aplicativo em PHP usando MVC e bons recursos, que na prática é a criação de um framework MVC do "zero".

Inicialmente fiz uma longa pesquisa via google e também perguntei em alguns grandes grupos de PHP internacionais por indicação de tutorial para a criação do meu próprio tutorial. As respostas são divididas, parte defende com paixão que se crie seu próprio framework e parte condena, dizendo que devemos usar os existentes que são muito bons. Alguns até citam estatísticas de que os frameworks atuais atendem a 95% das necessidades (não sei como conseguiram este número). Muitos dos tutoriais e vídeo aulas que encontrei estão desatualizados, uns ainda usando as funções mysql_connect, outros usando o mysqli, outros que não usam o PSR-4 e na maioria que não executa corretamente. Acusa erro. Assim também com os exemplos de pequenos frameworks que encontrei. Resumindo, somente o mini3 realmente executou bem, tem uma estrutura simples que me permitiu entender, usa o PSR-4, o PDO, tem também rotas e em apenas uma classe e .htaccess e não tem nenhuma dependência de pacote de terceiros. Aí a vantagem do software livre e open source, mesmo que não tenha um tutorial detalhado explicando como foi criado o aplicativo, como ele é aberto, se estivermos preparados podemos elaborar este tutorial e é o que irei fazer. Lembrando disso, voltei novamente ao repositório do mini3 e agradeci o autor, clicando na estrela e também fiz um fork novamente, pois havia excluído, para garantir que terei seu código por perto. Também mantive o rodapé do original, onde o autor faz a propaganda de uma hospedagem, pois acho que ele merece que eu faça isso. O grupo que defende a criação do seu próprio framework é muito enfático e me parece lógico, pois se ninguém mais quisesse criar o seu não haveria mais progresso.

Outra sugestão muito apontada é a criação de um aplicativo/framework usando componentes de outros grandes frameworks. Veja que muitos grandes frameworks como Laravel, CakePHP, etc usam componentes do Symfony. Inclusive encontrei um tutorial muito bom, onde o autor ensina a criar seu próprio framework apenas com componentes do Symfony2. Inclusive foi traduzido para o português e está abaixo nas referências. Não senti muita atração por esta alternativa, preferi partir do mini3 e, como o compreendi, vou adicionar minhas classes e outros recursos.

Tutorial de criação de um pequeno aplicativo em PHP com MVC e outros bons recursos. É um aplicativo muito simples e bem documentado, contendo 3 dependências mas todas opcionais. Portando pode ser modificado para atender outras necessidades, tanto removendo as dependências existentes quanto adicionando outras.

### DocumentRoot

Como estou usando linux, o documentRoot citado no tutorial é o

/var/www/html

Mas funciona sem problema em qualquer sistema operacional que suporte PHP. 

Exemplo: no Windows usando o Xampp é c:\xampp\htdocs

Criarei para este aplicativo a pasta /var/www/html/app-mvc

Então se você usa outro diretório web faça as devidas alterações


O crédito principal deste aplicativo é do "panique", com seu aplicativo
https://github.com/panique/mini3

Este tutorial será criado com Markdown na pasta tutorial do repositório
https://github.com/ribafs/mini-framework

## Assuntos abordados

Este tutorial é bem resumido. Aqui não se aborda praticamente nada de PHP, de PDO, de Orientação a Objetos nem de padrões de projeto.
A intenção princial é a de mostrar a criação simples de um aplicativo em PHP usando MVC com router.

### Mais detalhes

Muiitos detalhes podem ser encontrados no readme do mini3:
https://github.com/panique/mini3/blob/master/README.md


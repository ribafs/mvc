## Alterações feitas desde o original mini3

Efetuei várias altetrações. Umas para melhorar au meu ver e tornar mais coerentes e outras somente para alterar e ver o que acontecia, ou seja, para compreender este aplicativo que usa MVC e principalmente por conta do Router.

- A primeira alteração foi criar um arquivo src/bootstrap e mover praticamente todo o conteúdo do public/index.php para ele, deixando apenas o require para o src/bootstrap.php
- Alterei o composer.json, mudando a pasta application para src
- Mudei o nome do arquivo e classe Core/Application para Core/Router
- Movi o src/config/config.php para src/config.php
- Mudei a convenção e os models passei a nomear com CamelCase também e não somente os controllers
- Criei a pasta src/View e dentro dela uma classe View para cada controller
- Mudei o nome da pasta src/view para src/templates
- Mudei o nome da pasta src/view/_templates para src/templates/_includes
- Removi o HomeController e suas views e links e em seu lugar adicionei uma constante CONTROLLER_DEFAULT para o src/config.php e a usei devidamente
  no Router para que o usuário possa escolher qual será o default e também seu action
- Adicionei mais uma constante ao src/config.php, que foi SRC_TITLE, que guarda o título do aplicativo
- Também fiz uns ajustes para que funcionasse no PostgreSQL
- Ajustes para que o debug do PDO funcione. O arquivo tinnha nome helper.php e mudei para Helper.php. Todas as classes com inicial maiúscula
- No original mini3 não existia um form add.php, a inclusão era feita na página inicial, em um form no início. Eu movi para add.php
- Alteração feita na alteração: as views tinham código repetido então sintetizei/refatorei para que tenham somente um único método, o render()
- Mudei em CoreModel.php o nome da variável que recebe a conexão PDO de $db para $pdo
- Mudei o método index() do ErrorController para que receba o controller e o action atual para ser mostrado nas mensagens no error/index.
- Traduzi todos os comentários do original do inglês para o português do Brasil
- Simplifiquei um pouco a Router



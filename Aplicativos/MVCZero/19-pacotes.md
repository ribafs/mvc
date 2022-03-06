## Temos 3 pacotes instalados

Após a criação do composer.json e especialmente da seção require com as dependências. Executar:

composer update


## Tratamento de erros - whoops

## Migration/phinx e Faker

## Finalizando e Executando o Aplicativo

### Crie o banco de dados

### Configure o banco no arquivo: src/config/config.php

### Criar no raiz do aplicativo os diretórios abaixo para as migrations:

- mkdir db
- mkdir db/migrations
- mkdir db/seeds

### Criar o arquivo de configuração executando o comando no raiz do aplicativo:

php vendor/bin/phinx init

### Editar e ajustar o banco de dados em (configure o ambiente development, em nosso caso):

phinx.yml

### Para criar migration execute:

vendor/robmorgan/phinx/bin/phinx create Customers

### Então edite o arquivo criado:

db/migrations/20190821114033_customers.php

O formato: YYYYMMDDHHMMSS_customers.php

Alterar o método change() para que fique assim (exemplo):
```php
public function change()
{
		$this->table('customers')
		    ->addColumn('name', 'string', ['limit' => 50])
		    ->addColumn('email', 'string', ['limit' => 50])
		    ->addColumn('birthday', 'date', ['null' => true]);
}
```
### Salve e executar o comando abaixo para criar a tabela:

php vendor/robmorgan/phinx/bin/phinx migrate -e development

### Criar arquivo de Seed (popular tabela com registros):

php vendor/bin/phinx seed:create Customers

Gerará então o arquivo:

db/seeds/Customers.php

### Editar o arquivo gerado e mudar que fique assim:
```php
class Customers extends AbstractSeed
{
    public function run()
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 50; $i++) {
            $data[] = [
                'name'      => $faker->userName,
                'email'         => $faker->email,
                'birthday'    => $faker->date('Y-m-d'),
            ];
        }

        $this->insert('customers', $data);
    }
}
```
### Para inserir os registros na tabela com seed execute:

php vendor/bin/phinx seed:run -e development

## Atualizando o navegador

http://localhost/app-mvc


## Faker

Resumo de exemplos de uso da biblioteca faker

```html
Para localização pt_BR, para gerar nomes em portuês, por exemplo:
$faker = Faker\Factory::create('pt_BR');

$cpf = $faker->numberBetween($min = 10000000000, $max = 99999999999);
$nome = addslashes($faker->name);
$credito_liberado = $faker->regexify('[sn]');
$nascimento = $faker->date;
$email = $faker->email;
$user_id = $faker->numberBetween($min = 1, $max = 4);
$quantidade = $faker->randomNumber($nbDigits = NULL, $strict = false);
$preco_venda = $faker->numberBetween($min = 20, $max = 1200);

$faker->randomNumber($nbDigits = NULL, $strict = false) // 79907610
$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL) // 48.8932
$faker->numberBetween($min = 1000, $max = 9000) // 8567
$faker->regexify('[sn]'); // s ou n
$faker->randomElement($array = array ('s','n'));
$faker->randomLetter;
$faker->regexify('[A-Z]+[a-z]{2,5}'); // 2 a 5 letras
$faker->regexify('[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}'); // sm0@y8k96a.ej
$faker->randomElement($array = array ('a','b','c')); // 'b'
print $faker->sentence($nbWords = 3, $variableNbWords = true);
$faker->sentence($nbWords = 6, $variableNbWords = true);
$faker->address; // rua, número e cep
$faker->text; // Para grandes quantidades de texto
$faker->sentence($nbWords = 6, $variableNbWords = true);
$faker->text($maxNbChars = 200);
$faker->title($gender = null|'male'|'female');     // 'Ms.'
$faker->name($gender = null|'male'|'female');      // 'Dr. Zane Stroman'
$faker->cityPrefix;
$faker->state;
$faker->stateAbbr;
$faker->buildingNumber;
$faker->city;
$faker->streetName;
$faker->streetAddress;
$faker->postcode;
$faker->country;
$faker->PhoneNumber;
$faker->company;
$faker->date($format = 'Y-m-d', $max = 'now');
$faker->time($format = 'H:i:s', $max = 'now');
$faker->freeEmail;
$faker->password;
$faker->domainName;
$faker->url;
$faker->ipv4;
$faker->macAddress;
$faker->creditCardType;
$faker->creditCardNumber;
$faker->creditCardExpirationDateString;
$faker->hexcolor;
$faker->colorName;
$faker->fileExtension;
$faker->mimeType;
$faker->locale;
$faker->countryCode;
$faker->randomHtml(2,3);
```

https://github.com/fzaninotto/Faker


## Pacote para tratamento de erros - Whoops

Whoops é uma pequena biblioteca, disponível como um pacote para Composer (https://packagist.org/packages/filp/whoops e https://github.com/filp/whoops), que ajuda a lidar com erros e exceções em seus projetos PHP.

Lidando com erros de uma maneira que faz sentido para o que você está fazendo.

### Os principais recursos desta biblioteca são:
     • Página detalhada e intuitiva para erros e exceções
     • Visualização de código para todos os frames
     • Foco na análise de erro/exceção através do uso de middleware/manipuladores simples e personalizados
     • Suporte para solicitações JSON e AJAX
     • Fornecedores incluídos para projetos Silex e Zend por meio dos fornecedores incluídos no pacote e incluídos como parte do core do Laravel 4
     • Base de código limpa, compacta e testada, sem dependências extras

Você diz ao Whoops quais manipuladores deseja usar (você pode escolher entre os manipuladores incluídos ou fazer o seu próprio), e se algo acontecer, todos os manipuladores recebem, na ordem, uma chance de fazer alguma coisa - isso pode ser qualquer coisa erro (Whoops torna mais fácil extrair informações significativas de um erro ou exceção), para exibir telas de erros úteis (com o PrettyPageHandler integrado, que oferece a aparência legal da página padrão).

### Algumas configurações 
No application/bootstrap.php

/**
* Register the error handler
*/
$whoops = new \Whoops\Run;

if (ENVIRONMENT !== 'production') {
// Configure the PrettyPageHandler:
$errorPage = new Whoops\Handler\PrettyPageHandler();
 
$errorPage->setPageTitle("Algo errado aqui!"); // Set the page's title
$errorPage->setEditor("sublime");         // Set the editor used for the "Open" link
// Algumas informações extras
$errorPage->addDataTable("Informações Extras", array(
      "stuff"     => 123,
      "foo"       => "bar",
      "useful_id" => "baloney"
));
} else {
    $whoops->pushHandler(function($e){
        echo 'Todo: Friendly error page and send an email to the developer';
    });
}
 
$whoops->pushHandler($errorPage);
$whoops->register();
 
throw new RuntimeException("Verifique detalhes!");

Comente a linha acima e quando acontecer algum erro no aplicativo o whoops mostrará sua página de erros bem rica em informações, com o erro e muito mais.

### Referências
https://github.com/filp/whoops 
https://code.tutsplus.com/tutorials/whoops-php-errors-for-cool-kids--net-32344 
https://github.com/PatrickLouys/no-framework-tutorial

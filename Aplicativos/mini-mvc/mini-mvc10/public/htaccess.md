Options -MultiViews - Em algumas hospedagens compartilhadas, o módulo de negociação pode não estar ativado. Isso daria a você um erro 500. Para evitar esse erro, você pode, por padrão, encapsular a diretiva -MultiViews.

RewriteEngine On - Ativar o mod_rewrite/mode de reescrita de url
Options -Indexes
RewriteCond %{REQUEST_FILENAME} !-d - Informa que será criado uma condição a ser aplicado ao nome do arquivo requisitado. Novamente, a exclamação indica negação e -d pede para checar existência de um diretório fisicamente. Portanto a tradução é:
CONDIÇÃO = SE ARQUIVO_REQUISITADO NÃO EXISTE COMO DIRETÓRIO FISICAMENTE

RewriteCond %{REQUEST_FILENAME} !-f - Informa que será criado uma condição a ser aplicado ao nome do arquivo requisitado. A exclamação é o sinal de negação e -f pede para verificar a existência de um arquivo físico. Portanto a tradução é 
CONDIÇÃO = SE ARQUIVO_REQUISITADO NÃO EXISTE FISICAMENTE

RewriteCond %{REQUEST_FILENAME} !-l - Informa que será criado uma condição a ser aplicado ao nome do link simbólico requisitado. A exclamação é o sinal de negação e -l pede para verificar a existência de um link simbólido. Portanto a tradução é 
CONDIÇÃO = SE LINK_SIMBÓLICO_REQUISITADO NÃO EXISTE FISICAMENTE

RewriteRule ^(.+)$ index.php?url=$1 [QSA,L] - Informa que será aplicado uma regra de reescrita. ^(.*)$ Indica para armazenar em uma variável toda a requisição da URL (Circunflexo indica inicio e Cifrão indica fim). index.php?url=$1 Indica para substituir a requisição, redirecionando o fluxo para index.php e colocando-a inteiramente como um parametro de params. * [NC]* São flags. No caso indica para não ser sensivel a maiusculas ou minusculas (NON-CASE).

https://pt.stackoverflow.com/questions/102722/o-que-significam-rewritecond-e-rewriterule-em-um-arquivo-htaccess
https://stackoverflow.com/questions/25423141/what-exactly-does-the-multiviews-options-in-htaccess


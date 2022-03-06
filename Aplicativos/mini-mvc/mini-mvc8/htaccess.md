# .htaccess do raiz

RewriteEngine on

RewriteRule ^(.*) public/$1 [L]

A primeira linha ativa o mod_rewrite

A segunda linha redireciona todas as requisições que chegam ao diretório do aplicativo para a pasta public

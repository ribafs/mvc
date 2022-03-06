<?php

require_once 'View.php';

print '<h1>Simplest PHP MVC</h1>';

print '<h3>Primeira fase - listar os usuários da tabela.</h3>';

$view = new View();

print '<table>';
print '<tr><td><b>ID</td><td><b>Login</td><td><b>Senha</td></tr>';
foreach($view->list() as $user){
    print '<tr><td>'.$user->id.'</td><td>'.$user->login.'</td><td>'.$user->senha.'</td></tr>';
}
print '</table>';

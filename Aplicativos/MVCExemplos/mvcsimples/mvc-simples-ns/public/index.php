<?php

require_once '../vendor/autoload.php';

print '<h1>Simplest PHP MVC</h1>';
print '<h3>MVC simples sem banco de dados</h3>';
print '<h4>Soma e subtração. As operações são executadas no Model</h4>';

?>

<form method="post" action="">
No 1<input type="text" name="nr1"><br>
No 2<input type="text" name="nr2"><br><br>
<input type="submit" name="enviar" value="Enviar">
<br>

<?php
print '<br><br>';

if(isset($_POST['enviar'])){
$nr1 = $_POST['nr1'];
$nr2 = $_POST['nr2'];

$view = new \Mvc\View\View();

print $nr1 .'+'.$nr2.' = ';
print $view->sum($nr1,$nr2);
print '<br>';

print $nr1 .'-'.$nr2.' = ';
print $view->dif($nr1,$nr2);
}
?>

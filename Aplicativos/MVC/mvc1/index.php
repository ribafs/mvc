<?php

require_once 'View.php';

print '<h1>Simplest PHP MVC</h1>';

$view = new View();

print '3 + 4 = ';
print $view->sum();
print '<br>';

print '4 - 3 = ';
print $view->dif();
print '<br>';

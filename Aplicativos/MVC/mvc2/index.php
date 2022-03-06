<?php

namespace App;

require_once 'vendor/autoload.php';

$view = new View();

print '<h1>Simplest PHP MVC using PSR-4</h1>';

print '3 + 4 =';
print $view->sum();
print '<br>';

print '4 - 3 =';
print $view->dif();
print '<br>';


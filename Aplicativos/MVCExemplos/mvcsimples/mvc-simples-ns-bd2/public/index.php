<?php

require_once '../vendor/autoload.php';

print '<h1>Simplest PHP MVC</h1>';

$view = new \Mvc\View\View();
$usuarios = $view->lista();
?>

<div class="container">
    <h2 class="text-center">Usuários</h2>
    <!--<b>You are in the View: src/template/products/index.php (everything in this box comes from that file)</b><br>-->
    <!-- main content output -->

    <div>
        <br>        
        <table class="table table-hover table-stripped">
            <thead>
            <tr class="bg-gray">
                <td><b>ID</b></td>
                <td><b>Nome</b></td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($usuarios as $usuario) { ?>
                <tr>
                    <td><?php if (isset($usuario->id)) echo htmlspecialchars($usuario->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($usuario->nome)) echo htmlspecialchars($usuario->nome, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

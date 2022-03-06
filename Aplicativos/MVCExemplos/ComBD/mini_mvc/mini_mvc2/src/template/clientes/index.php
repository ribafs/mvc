<div class="container">
    <h2 class="text-center">Clientes</h2>
    <div>
        <br>        
        <b>Lista de Clientes (dados do model)</b>
        <table class="table table-hover table-stripped">
            <thead>
            <tr class="bg-gray">
                <td><b>ID</b></td>
                <td><b>Nome</b></td>
                <td><b>E-mail</b></td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($clientes as $cliente) { ?>
                <tr>
                    <td><?php if (isset($cliente->id)) echo htmlspecialchars($cliente->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($cliente->nome)) echo htmlspecialchars($cliente->nome, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($cliente->email)) echo htmlspecialchars($cliente->email, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

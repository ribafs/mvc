<div class="container">
    <h2 class="text-center">Clientes</h2>
	<a class="btn btn-primary btn-sm" href="<?=URL . 'clientes/add'; ?>">Add Cliente</a>

    <div>
        <br>        
        <b>Lista de Clientes (dados do model)</b><div class="text-right"><b>Soma de Clientes: <?php echo $total_clientes; ?></b></div>
        <table class="table table-hover table-stripped">
            <thead>
            <tr class="bg-gray">
                <td><b>ID</b></td>
                <td><b>Nome</b></td>
                <td><b>E-mail</b></td>
                <td colspan="2" align="center">AÇÕES</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($clientes as $cliente) { ?>
                <tr>
                    <td><?php if (isset($cliente->id)) echo htmlspecialchars($cliente->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($cliente->name)) echo htmlspecialchars($cliente->name, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($cliente->email)) echo htmlspecialchars($cliente->email, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($cliente->birthday)) echo htmlspecialchars($cliente->birthday, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

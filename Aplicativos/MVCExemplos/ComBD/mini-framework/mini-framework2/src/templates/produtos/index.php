<div class="container">
    <h2 class="text-center">Produtos</h2>
	<a class="btn btn-primary btn-sm" href="<?=URL . 'produtos/add'; ?>">Add Produto</a>
    <div>
        <br>        
        <b>Lista de produtos (dados vindos do model)</b><div class="text-right"><b>Soma de produtos: <?php echo $soma; ?></b></div>
        <table class="table table-hover table-stripped">
            <thead>
            <tr class="bg-gray">
                <td><b>ID</b></td>
                <td><b>Nome</b></td>
                <td><b>Descrição</b></td>
                <td><b>Unidade</b></td>
                <td colspan="2" align="center">AÇÕESS</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($todos as $produto) { ?>
                <tr>
                    <td><?php if (isset($produto->id)) echo htmlspecialchars($produto->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($produto->nome)) echo htmlspecialchars($produto->nome, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($produto->descricao)) echo htmlspecialchars($produto->descricao, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($produto->unidade)) echo htmlspecialchars($produto->unidade, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'produtos/delete/' . htmlspecialchars($produto->id, ENT_QUOTES, 'UTF-8'); ?>">Delete</a></td>
                    <td><a href="<?php echo URL . 'produtos/edit/' . htmlspecialchars($produto->id, ENT_QUOTES, 'UTF-8'); ?>">Edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
